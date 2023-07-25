@extends('web.layouts.main') @section('content')
<!-- form -->
<div class="container-fluid form p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-light p-5">
                <h1 class="text-center">Sponsors</h1>
                <p class="p-5 text-light text-center">If you would like to be the guiding light in the lives of a single mother and her children <br>or an unsheltered child, please fill out the form below.</p>
                <div class="row g-3 p-3">
                  <form method="POST" action="{{route('web.sponsor_submit')}}">
                    @csrf
                    <label for="inputEmail4" class="form-label">Name </label>
                    <div class="col">
                        <label for="inputEmail4" class="form-label">First Name </label>
                        <input type="text" name="first_name" required class="form-control rounded-0 p-3" placeholder="First name" aria-label="First name" />
                    </div>
                    <div class="col">
                        <label for="inputEmail4" class="form-label">Last Name </label>
                        <input type="text" name="last_name" required class="form-control rounded-0 p-3" placeholder="Last name" aria-label="Last name" />
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="email" required class="form-control rounded-0 p-3" id="inputEmail4" />
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Subject</label>
                        <input type="text" name="subject" required class="form-control rounded-0 p-3" id="inputEmail4" />
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Message</label>
                        <input type="textarea52-DJDSCLPSAC" name="message" required class="form-control rounded-0 p-3" id="inputEmail4" />
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
<script type="text/javascript"></script>
@endsection
