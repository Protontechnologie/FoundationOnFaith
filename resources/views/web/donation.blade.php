@extends('web.layouts.main') @section('content')
<!-- form -->
<div class="container-fluid form p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-light p-5">
                <h3 class="text-light">Enter Donation amount with your details</h3>
                <div class="row g-3 p-3">
                  <form method="POST" action="{{route('web.donation_submit')}}">
                    @csrf

                    <div class="col mt-3">
                        <label for="inputEmail4" class="form-label">Name </label>
                        <input type="text" name="name" required class="form-control rounded-0 p-3" placeholder="Full name" aria-label="First name" />
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="email" required class="form-control rounded-0 p-3" id="inputEmail4" placeholder="Billing Email Address"/>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="inputEmail4" class="form-label">Amount to Donate</label>
                        <input type="number" name="amount" placeholder="Enter your amount (minimum amount is $5)" min="5" required class="form-control rounded-0 p-3" id="inputEmail4" />
                    </div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-warning rounded-0 mt-3">Continue</button>
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
<script type="text/javascript"></script>
@endsection
