@extends('web.layouts.main') @section('content')
<!-- hero-area -->
<div class="container-fluid p-5 border-top border-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-start">
                <h1 class="fw-bold ps-5 pe-5 pb-3 pt-5">Contact Founding on Faith</h1>
                <p class="ps-5 pe-5">
                    Use the form below to reach out to Founding on Faith if you need assistance and want to schedule an interview or if you have questions about sponsorship or donation. We’re always standing by to take your message, and
                    we’ll get back to you as quickly as possible..
                </p>
            </div>
        </div>
    </div>
</div>
<!-- form -->
<div class="container-fluid form pe-5 ps-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-light p-5">
                <div class="row ps-3 pe-5 g-3">
                    <form action="{{route('web.contact_submit')}}" method="post">
                        @csrf
                        <label for="inputEmail4" class="form-label text-dark">Name (required) </label>
                        <div class="col">
                            <label for="inputEmail4" class="form-label text-dark">First Name </label>
                            <input type="text" name="first_name" required class="form-control rounded-0 p-3" placeholder="First name" aria-label="First name" />
                        </div>
                        <div class="col">
                            <label for="inputEmail4" class="form-label text-dark">Last Name </label>
                            <input type="text" name="last_name" required class="form-control rounded-0 p-3" placeholder="Last name" aria-label="Last name" />
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label text-dark">Email (required)</label>
                            <input type="email" name="email" required class="form-control rounded-0 p-3" id="inputEmail4" />
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label text-dark">Subject (required)</label>
                            <input type="text" name="subject" required class="form-control rounded-0 p-3" id="inputEmail4" />
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label text-dark">Message (required)</label>
                            <input type="textarea52-DJDSCLPSAC" name="message" required class="form-control rounded-0 p-3" id="inputEmail4" />
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-dark rounded-0">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- involved -->
<div class="container-fluid involved bg-dark p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-start p-5">
                <h1 class="text-warning p-4">You can also reach out to us via:</h1>
                <p class="ps-5 pe-5 text-light">
                    programs@foundingonfaith.com<br />
                    <br />
                    (+1) 778-358-6513
                </p>
            </div>
        </div>
    </div>
</div>

@endsection @section('css')
<style type="text/css"></style>
@endsection @section('js')
<script type="text/javascript"></script>
@endsection
