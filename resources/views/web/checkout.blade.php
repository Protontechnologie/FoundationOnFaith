@extends('web.layouts.main') @section('content')
<!-- form -->
<div class="container-fluid form p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-light p-5">
                <h3 class="text-light text-center">Enter your card detail to checkout</h3>
                <div class="row g-3 p-3">
                <form class="form require-validation chechout-page-1" autocomplete="off" novalidate="" action="{{route('submit_checkout_process')}}" method="POST"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{$order->id}}">
                    <div class="col">
                        <label for="inputEmail4" class="form-label">Card Number </label>
                        <input type="num" id="card-number" name="card1" class="input-cart-number card-number" maxlength="4" placeholder="1234">
                        <input type="num" id="card-number-1" name="card2" class="input-cart-number card-number" maxlength="4" placeholder="1234">
                        <input type="num" id="card-number-2" name="card3" class="input-cart-number card-number" maxlength="4" placeholder="1234">
                        <input type="num" id="card-number-3" name="card4" class="input-cart-number card-number" maxlength="4" placeholder="1234"> 
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="inputEmail4" class="form-label">Card Name</label>
                        <input type="text" id="card-holder" name="card_name" placeholder="e.g Jason West">
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="inputEmail4" class="form-label">Expiration Month</label>
                        <select id="card-expiration-month" name="expiry_month" class="card-expiry-month">
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                            <option>08</option>
                            <option>09</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>
                    </div>
                    
                    <div class="col-md-12 mt-3">
                        <label for="inputEmail4" class="form-label">Expiration Year</label>
                        <select id="card-expiration-year" class="card-expiry-year" name="expiry_year">
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                            <option>2026</option>
                            <option>2027</option>
                            <option>2028</option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="inputEmail4" class="form-label">CCV</label>
                        <input type="text" id="card-ccv" class="card-cvc" name="cvv" maxlength="3" placeholder="123">
                    </div>


                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-warning rounded-0">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('css')
<style type="text/css"></style>
@endsection @section('js')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
    <script type="text/javascript">
      
    $(function() {
      
        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/
        
        var $form = $(".require-validation");
         
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                             'input[type=text]', 'input[type=file]',
                             'textarea'].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
            var  is_error = 0;
            $errorMessage.addClass('hide');
          
            $('.has-error').removeClass('has-error');
            console.log($inputs);
            // $inputs.each(function(i, el) {
            //   var $input = $(el);
              
            //   if($input != ""){
            //     if ($input.val() === '') {
            //       $input.parent().addClass('has-error');
            //       $errorMessage.removeClass('hide');
            //       e.preventDefault();
            //     }
            //   } 
              
            // });

            $('form.require-validation input').each(function(i,e){
                if($(e).val() == ""){
                  $(e).addClass("has-error")
                  is_error++;
                }else{
                  $(e).removeClass("has-error")
                }
            })

            if(is_error > 0){
              //$('.error').removeClass('hide').text("There are " + is_error + " errors");
              return false;
            }else{
              $('.error').addClass('hide').text("");
            }
            if (!$form.data('cc-on-file')) {
              var card_number = $("#card-number").val() + $("#card-number-1").val() + $("#card-number-2").val() + $("#card-number-3").val()

              e.preventDefault();
              Stripe.setPublishableKey($form.data('stripe-publishable-key'));
              Stripe.createToken({
                number: card_number,
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
              }, stripeResponseHandler);
            }else{
              
            }
        
        });
          
        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    // .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                     
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
         
    });
    </script>
@endsection
