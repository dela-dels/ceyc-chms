<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0 ">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/card.css') }}" type="text/css">
</head>

<body>
    <main>
        <div class="wrapper">
            <div class="container wrapper-container">
                <div class="headings">
                    <h5>CEYC GIVING </h5>
                    <p>Some humble bible text i cant think about now just to spce things up</p>
                </div>

                <div class="row sub-content">
                    <div class="left-half">

                        <div class="col payment__options">
                            <div class="accordion" id="accordionExample">
                                <div class="d-flex p-2   justify-content-between">
                                    <button class="btn bg-dark mb-0 text-light btn-link" type="button"
                                        data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">Visa</button>
                                    <div class="d-flex align-items-center images__container">
                                        <img src="{{ asset('images/mastercard.png') }}" class="img-fluid card__images" />
                                        <img src="{{ asset('images/visa-symbol.png') }}" class="img-fluid card__images" />
                                    </div>
                                </div>


                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body py-1">
                                        <form>

                                            <div class="form-group">
                                                <label for="inputEmail4">Card Number</label>
                                                <input type="email" class="form-control" id="inputEmail4"
                                                    placeholder="1234-5242-4524-5242">
                                            </div>


                                            <div class="form-group">
                                                <label for="inputAddress">Holder Name</label>
                                                <input type="text" class="form-control" id="inputAddress"
                                                    placeholder="John New Man">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Expiry Date</label>
                                                    <input type="text" class="form-control" placeholder="MM/YY"
                                                        id="inputCity">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">CVC/CVV</label>
                                                    <input type="text" class="form-control" id="inputCity">
                                                </div>
                                            </div>

                                            <!-- <button type="submit" class="btn btn-primary">Next</button> -->
                                        </form>



                                    </div>
                                </div>



                                <div class="dflex p-2  justify-content-between">
                                    <button class="btn bg-dark  text-light btn-link collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Mobile Money
                                    </button>
                                </div>

                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body py-1">

                                        <form>


                                            <div class="form-group">
                                                <label for="inputEmail4">Full Name</label>
                                                <input type="email" class="form-control" id="inputEmail4"
                                                    placeholder="Full Name">
                                            </div>

                                            <div class="form-group">
                                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Mobile Money
                                                    Network</label>
                                                <select class="custom-select my-1 mr-sm-2"
                                                    id="inlineFormCustomSelectPref">
                                                    <option selected>Select One...</option>
                                                    <option value="1">MTN Mobile Money</option>
                                                    <option value="2">Vodafone Cash</option>
                                                    <option value="3">Airtel/Tigo Cash</option>
                                                </select>

                                            </div>



                                            <div class="form-group">
                                                <label for="inputCity">Reference</label>
                                                <input type="text" class="form-control" id="inputCity">
                                            </div>


                                            <!-- <button type="submit" class="btn btn-primary">Next </button> -->
                                        </form>

                                    </div>
                                </div>

                            </div>






                        </div>
                    </div>


                    <div class="col right-half">
                        <div class="info__details">
                            <form class="info__form">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Full Name</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Full Name">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phone Number</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Amount</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Amount">
                                </div>


                            </form>

                        </div>

                    </div>

                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <small>&#128274;Your transactions are secured with SSS;encryption</small>
                    <button type="submit" class="btn  btn-primary">Pay <i class="fa fa-credit-card"></i></button>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script> --}}
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
