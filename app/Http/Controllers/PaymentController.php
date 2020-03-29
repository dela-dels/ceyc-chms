<?php

namespace App\Http\Controllers;

use App\Giving;
use App\Jobs\MobileMoneyPayment;
use App\Payment;
use Exception;
use GuzzleHttp\Client as Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Psr\Http\Message\ResponseInterface;

class PaymentController extends Controller
{

    public function dashboard()
    {
        $payments = Giving::get();

        $currentDayPayments =Giving::whereDate('created_at', Carbon::today())
                                ->get();

        $approvedPayments = Giving::whereDate('created_at', Carbon::today())
                                ->wherePaymentStatus('Approved')
                                ->get();

        $declinedPayments = Giving::whereDate('created_at', Carbon::today())
                                ->wherePaymentStatus('Declined')
                                ->get();

        $otherPayments = Giving::whereDate('created_at', Carbon::today())
                                ->wherePaymentStatus('error')
                                ->orWhere('payment_status', NULL)
                                ->whereDate('created_at', Carbon::today())
                                ->get();

        return view('pages.givings.dashboard',
            compact('payments', 'approvedPayments',
                'declinedPayments', 'otherPayments', 'currentDayPayments'));
    }
    /**
     * shows payment form
     */
    public function showForm()
    {
        return view('pages.givings.direct-payment');
    }

    /**
     * Method to store a newly created giving resource to database
     *
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function store(Request $request)
    {
        try {
            $attributes = $this->validate($request, [
                'full_name' => 'required',
                'email' => 'required',
                'mobile_network' => 'required',
                'contact' => 'required',
                'amount' => 'required',
                'giving_option' => 'required'
            ]);

            $transactionId = $this->transactionId();

            $slug = Carbon::today()->format('dmyg') . bin2hex(random_bytes(5)) . Str::slug($request->full_name);

            $payment = Payment::create($attributes +
                [
                    'transaction_id' => $transactionId,
                    'slug' => $slug
                ]);

            return redirect()->route('payment.confirm',
                compact('payment'));

        } catch (ValidationException $e) {
            $e->validator->errors()->getMessages();
        }
    }

    public function confirm(Payment $payment)
    {
        return view('pages.givings.direct-confirm',
            compact('payment'));
    }

    public function mobileMoneyPayment(Request $request)
    {
//        MobileMoneyPayment::dispatch($request->all());
//
//        redirect()->route('giving.successful');

        $uri = 'https://prod.theteller.net/v1.1/transaction/process';

        $amount = sprintf("%'.012d", $request->amount * 100);

        $body = [
            'amount' => $amount,
            'processing_code' => '000200',
            'transaction_id' => $request->transaction_id,
            'desc' => 'CEYC AC Giving',
            'merchant_id' => "TTM-00000086",
            'subscriber_number' => $request->contact,
            'r-switch' => $request->mobile_network,
        ];

        if($request->mobile_network === 'VDF') {
            $body = Arr::add($body, 'voucher_code', $request->voucher_code);
        }

        $client = new Client();

        $response = $client->request('POST', $uri, [
            'headers' => $this->headers(),
            'body' => json_encode($body),
        ]);

        $statusCode = $response->getStatusCode();

        $responseBody = json_decode($response->getBody()->getContents());

        if ($responseBody->code !== '000') {
            dd('Payment ' . $responseBody->status . ' ' . $responseBody->reason . ' Please try again');
        } else {
            dd('Payment ' . $responseBody->status);
        }

        dd($responseBody);
    }

    /**
     * Method to send request to Payswitch Api Service
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function cardPayment(Request $request)
    {
        $uri = 'https://prod.theteller.net/v1.1/transaction/process';

        $amount = sprintf("%'.012d", $request->amount * 100);

        $body = [
            'amount' => $amount,
            'processing_code' => '000000',
            'transaction_id' => $request->transaction_id,
            'desc' => 'CEYC AC Giving - Card Payment',
            'merchant_id' => "TTM-00000086",
            'r-switch' => $request->r_switch,
            'pan' => $request->pan,
            'cvv' => $request->cvv,
            'exp_month' => $request->exp_month,
            'exp_year' => $request->exp_year,
            'card_holder' => $request->card_holder,
            'currency' => 'GHS',
            'customer_email' => $request->customer_email,
            "3d_url_response" => "https://app.ceycairportcity.org/",
        ];

        $client = new Client();

        $response = $client->request('POST', $uri, [
            'headers' => $this->headers(),
            'body' => json_encode($body),
//            'timeout' => 400
        ]);

        $responseBody = json_decode($response->getBody()->getContents());

        if ($responseBody->code == '200' && $responseBody->status == 'vbv required') {
            Giving::whereTransactionId($request->transaction_id)
                ->update(['payment_status' => 'Pending']);
            return redirect()->away($responseBody->reason);

        } elseif ($responseBody->code === '000') {
            Giving::whereTransactionId($request->transaction_id)
                ->update(['payment_status' => 'Pending']);
            return redirect()->route('giving.successful');
        } else {
            Giving::whereTransactionId($request->transaction_id)
                ->update(['payment_status' => 'Pending']);
            return redirect()->route('giving.error');
        }
    }


    /**
     * Builds the response headers to be used
     * for making API calls (GET/POST)
     *
     * @return array
     */
    public function headers(): array
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => [
                'Basic ' . base64_encode('jumeni5b92c307c2861:ZGFkZGRiYWNkMzUzY2JhZTdjYTRhY2NkOTM2MTNiNjM=')
            ],
            'Cache-Control' => 'no-cache',
            'Accept' => 'Accept: */*',
            'User-Agent' => 'guzzle/6.0',
            'Accept-Charset' => '*',
            'Accept-Encoding' => '*',
            'Accept-Ranges' => 'none',
            'Accept-Language' => '*',
        ];

        return $headers;
    }

    /**
     * Method to generate  random transactionId
     * of 12 digits
     *
     * @return string
     */
    public function transactionId(): string
    {
        $milliseconds = (String)round(microtime(true) * 568);
        $shuffled = str_shuffle($milliseconds);
        $transactionId = substr($shuffled, 0, 12);
        return $transactionId;
    }

}
