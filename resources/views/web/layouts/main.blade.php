<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!-- START: Head-->
    <head>
        <meta charset="UTF-8">
        <title>{{isset($title)?$title:env('APP_NAME')}}</title>
        <meta  name="description"  content="{{isset($description)?$description:env('APP_NAME')}}" />
        <meta  property="og:url"  content="{{Request::url()}}" />
        <meta  property="og:type"  content="website" />
        <meta  property="og:title"  content="{{isset($title)?$title:env('APP_NAME')}}" />
        <meta  property="og:description"  content="{{isset($title)?$title:env('APP_NAME')}}" />    
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
        <!-- START: Template CSS-->
        @include('web.layouts.links')
        @yield('css')
        <!-- END: Custom CSS-->
    </head>
    <!-- END Head-->

    <!-- START: Body-->
    <body style="overflow-x: hidden;">
        <input type="hidden" id="web_url" value="{{url('/')}}"/>
        
        <!-- START: Header-->
        @include('web.layouts.header')
        <!-- END: Header-->
        
        <!-- START: Main Content-->
        @yield('content')
        <!-- END: Content-->
        @include('web.layouts.footer')
        <!-- START: Template JS-->
        @include('web.layouts.scripts')
        
        @yield('js')
        
        <div class="container-fluid">
        <div class="container">
            <div class="row">
            <div class="col-md-12 footer-2 p-3">
                <p class="text-center fs-6">© {{date('Y')}} {{env('APP_NAME')}} | Privacy Policy<br>Web Design by Winn Brown & Co</p>
            </div>
            </div>
        </div>
        </div>
    </body>
    <!-- END: Body-->
</html>
