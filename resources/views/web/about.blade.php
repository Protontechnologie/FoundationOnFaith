@extends('web.layouts.main') 
@section('content')
<!-- hero-area -->
<div class="container-fluid about-hero-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>About Us</h1>
                <p>
                    Founding on Faith is a passion project created by a Jamaican immigrant to Canada. On the other side of professional, social, emotional, and medical challenges that used to feel insurmountable, she uses her experiences to
                    connect with others who are climbing the same mountain.
                </p>
                <button type="button" class="btn-2 hover-slide-up"><span>Join Us</span></button>
            </div>
        </div>
    </div>
</div>
<!-- image -->
<div class="container-fluid p-0 m-0">
    <img src="{{asset('web/assets/images/mother-and-child-sunset-2.webp')}}" class="w-100 p-0 m-0" alt="..." />
</div>
<!-- Founding on Faith -->
<div class="container-fluid faith">
    <div class="container">
        <div class="row">
            <div class="col-md-6 fth d-flex justify-content-center flex-column">
                <h1 class="text-warning p-5">Why “Founding on Faith”?</h1>
                <p class="text-light ps-5">
                    Our name comes from our founder’s firm belief that God, faith, and purpose are the foundation of every true success in this life. Only through God and faith may we find the paths that are meant for each of us – the paths
                    that lead us out of the dark and into a place where we feel fulfilled, valued, and strong.
                </p>
            </div>

            <div class="col-md-6">
                <img src="{{asset('web/assets/images/unsplash-image-djLvhqqzesU.jpg')}}" alt="" />
            </div>
        </div>
    </div>
</div>
<!-- Team -->
<div class="container-fluid p-5">
    <div class="container">
        <div class="col-md-6 p-3 d-flex justify-content-center flex-column">
            <h1 class="text-primary p-4">Meet the Team</h1>
            <p class="ps-4">
                As with any worthwhile project, nothing could have been done without the support and skills of a remarkable and impassioned team. These six individuals are the irreplaceable pillars of Founding on Faith, devoting their
                expertise and wisdom to the people we serve daily and – most importantly – keeping the faith alive.
            </p>
        </div>
        <div class="col-md-6"></div>
    </div>
</div>
<!-- member -->
<div class="container-fluid about-member pt-2">
    <div class="container">
        <div class="row ps-5 pe-4">
            @if($teams)
            @foreach($teams as $team)

            <div class="col-md-2">
                <img class="w-100 h-50" src="{{asset($team->upload)}}" alt="{{$team->name}}" />
                <p class="fw-bold fs-5">{{$team->name}}</p>
                <p>{{$team->designation}}</p>
            </div>
            @endforeach
            @endif
           
        </div>
    </div>
</div>
<!-- involved -->
<div class="container-fluid involved p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center p-5">
                <h1 class="text-warning p-4">How to get involved</h1>
                <p class="ps-5 pe-5 text-light">
                    There are two ways to get involved with Founding on Faith. You can become a sponsor and contribute a regular donation every month that supports a family or individual participant as they work to change their lives.
                    Another option is to give a one-time donation or set up a recurring donation at an amount that’s comfortable for you.
                </p>
                <button type="button" class="btn-3 hover-slide-up"><span>Contact Us</span></button>
                <button type="button" class="btn-3 hover-slide-up"><span>Sponsor</span></button>
                <button type="button" class="btn-3 hover-slide-up"><span>Donate</span></button>
            </div>
        </div>
    </div>
</div>

@endsection @section('css')
<style type="text/css"></style>
@endsection @section('js')
<script type="text/javascript"></script>
@endsection
