<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width ; initial-scale=1.0 ">
<<<<<<< HEAD:Payment UI/index.html
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="./style.css" type="text/css">
        <link rel="stylesheet" href="./card.css" type="text/css">
=======
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
>>>>>>> 1418b351d5efc6be6d56739fa457f3b2a68a5975:resources/views/pages/payment-ui/index.blade.php
    </head>

    <body>
        <main>
          <div class="wrapper">

            <div class="wrapper-container">

              <div class="left-half">

<<<<<<< HEAD:Payment UI/index.html
              </div>
              
              <div class="other-half">
=======
                    <div class="card__container">
                        <h2>Payment Method</h2>
                        <div class="options__payment">
                            <label for="1">Visa</label>
                            <input type="radio" name="visa-card" id="1" value="1" required>
                            <label for="2">Mobile Money</label>
                            <input type="radio" name="visa-card" id="2" value="1" required>
                        </div>

                        <div class="card__component">
                            <div class="card__component__visa card__component__visa--front">
                                &nbsp;
                            </div>
                            <div class="card__component__visa card__component__visa--back">
                                i am at the back
                            </div>
                        </div>
                        
>>>>>>> 1418b351d5efc6be6d56739fa457f3b2a68a5975:resources/views/pages/payment-ui/index.blade.php

              </div>
              <!-- <div class="form__container">
              <div class="card">
                <div class="card__container">
  
                  <div class="card__front">
                    <div class="card__top">
                      <img class="card__chip" src="./cardchip.webp" alt="card chip">
                      <img class="card__visa" src="./visa-symbol.png" alt="visa logo">
                    </div>
        
                    <div class="card__number">
                      <span>####  ####  ####  ####</span>
                    </div>
        
                    <div class="card__bottom">
  
                      <div class="card__holder">
                        <span>###### # #######</span>
                      </div>
  
                      <div class="card__expires">
                        <span>
                          <span class="expires__month">MM</span>/<span class="expires__year">YY</span>
                        </span>
                      </div>
                    </div>
  
                  </div>
        
                  <div class="card__back">
                    <div class="card__blackLabel"></div>
        
                    <div class="card__cvv">
                      <span>???</span>
                    </div>
        
                    <img class="visa__back" src="./visa-symbol.png" alt="Visa Back">
                  </div>
                </div>
              </div>
        
              <form class="form__card">
                <div class="card__number">
                  <label for="cardNumber" class="form__label">Card Number</label>
                  <input type="text" class="form__input number__input" maxlength="16" required>
                </div>
        
                <div class="card__holder">
                  <label for="cardHolder" class="form__label">Card Holder</label>
                  <input type="text" class="form__input holder__input" required>
                </div>
        
                <div class="form__bottom">
                  <div class="card__expirationDate">
                    <label for="expirationDate" class="form__label">Expiration Date</label>
                    <div>
                      <select name="month" class="form__select form__monthSelect" required>
                        <option value="">Month</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                      </select>
                      <select name="year" class="form__select form__yearSelect" required>
                        <option value="">Year</option>
                      </select>
                    </div>
                  </div>
        
                  <div class="cvv">
                    <label for="CVV" class="form__label">CVV</label>
                    <input type="text" class="form__input cvv__input" maxlength="3" required>
                  </div>
                </div>
        
                <button type="submit" class="form__button">Submit</button>
              </form>
            </div> -->

            </div>


            
            
          </div>
          
        </main>
      
        <script src="script.js"></script>
      
      </body>
</html>