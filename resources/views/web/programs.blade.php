@extends('web.layouts.main') @section('content')
<!-- hero-area -->
<div class="container-fluid p-5 border-top border-dark programs-section-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center p-5">
                <h1 class="fw-bold">Who are these programs for?</h1>
                <p class="ps-5 pe-5">There are two programs. One is a two-year plan for unsheltered (homeless) minors. The other is a four-year plan for single mothers or single fathers and their children.</p>
                <button type="button" class="btn-3 hover-slide-up"><span>FIND OUT MORE</span></button>
            </div>
        </div>
    </div>
</div>
@if($programs)
@php 
$colors = ['programs-section-2', 'programs-section-3', 'programs-section-4'];
@endphp

@foreach($programs as $key => $program)
@php 
$color = $colors[$key % count($colors)];
@endphp
@if($key % 2 == 0)
<div class="container-fluid p-5">
    <div class="container {{$color}}">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center flex-column">
                <h1>{{$program->title}}</h1>
                {!! $program->desc !!}
            </div>

            <div class="col-md-6">
                <img class="w-100" src="{{asset($program->upload)}}" alt="{{$program->title}} | {{env('APP_NAME')}}" />
            </div>
        </div>
    </div>
</div>
@else
<div class="container-fluid p-5">
    <div class="container {{$color}}">
        <div class="row">
            <div class="col-md-5">
                <img class="w-100" src="{{asset($program->upload)}}" alt="{{$program->title}} | {{env('APP_NAME')}}" />
            </div>

            <div class="col-md-7 p-5 d-flex justify-content-center flex-column">
                <h1 class="text-warning pt-4 pb-4">{{$program->title}}</h1>
                {!! $program->desc !!}
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
@endif

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
