<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CEYC AIRPORT CITY | Online Giving</title>

        @include('panels/styles')
    <style>
        html body {
            height: 0% !important;
        }

        button {
            display: block !important;
            width: 100% !important;
            border: 1px solid transparent !important;
            text-align: center !important;
            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
            line-height: 1.6;
            border-radius: 0.25rem;
            user-select: none;
            font-weight: 400;
            background-color: #0a2740 !important;
            color: white;
        }

        .image {
            background-image: url("https://ceycairportcity.org/wp-content/uploads/2020/03/Untitled-1.png");
            height: 200px;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container" id="app">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="row justify-content-center mt-2">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="image mt-0 pt-0">
                        </div>
                        <p class="card-text mt-2">
                            Kindly Fill Out The Form To Complete Your Giving
                        </p>
                        <form action=" {{ route('giving.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="fullname">
                                    Full Name*
                                </label>
                                <input type="text" name="full_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="email" value="tech@ceycairportcity.org">
                            </div>
                            <div class="form-group">
                                <label for="contact">Phone Number*</label>
                                <input type="tel" name="contact" class="form-control" minlength="10" maxlength="10" required>
                            </div>
                            <div class="form-group">
                                <label for="amount">
                                    Amount (In GHS)*
                                </label>
                                <input type="number" name="amount" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Reference*
                                </label>
                                <select name="giving_option" id="showPartnershipArms" class="custom-select" required>
                                    <option value="" selected disabled>
                                        Select Option
                                    </option>
                                    <option value="Tithe">Tithe</option>
                                    <option value="Offering">Offering</option>
                                    <option value="Seed Offering">Seed</option>
                                    <option value="Special Seed Offering">Special Seed</option>
                                    <option value="Vow">Vow</option>
                                    <option value="Partnership">Partnership</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group" id="partnershipArmsDiv">
                                <label for="">Partnership Arms</label>
                                <select name="partnership_arms" id="partnershipArms" class="custom-select">
                                    <option value="" selected>Select Partnership Arm</option>
                                    <option value="Rhapsody">Rhapsody</option>
                                    <option value="Healing School">Healing School</option>
                                    <option value="Inner City Missions">Inner City Missions</option>
                                    <option value="IMM">IMM</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <button type="submit">CONTINUE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('/js/app.js') }}"></script>
<script>
    $("#showPartnershipArms").change(function () {
        if ($(this).val() == "Partnership") {
            $('#partnershipArmsDiv').show();
            $('#partnershipArms').attr('required', '');
            $('#partnershipArms').attr('data-error', 'This field is required.');
        } else {
            $('#partnershipArmsDiv').hide();
            $('#partnershipArms').removeAttr('required');
            $('#partnershipArms').removeAttr('data-error');
        }
    });
    $("#showPartnershipArms").trigger("change");

</script>
</html>

