@extends('layouts.main') 
@section('content')
<div class="container">
            <div class="row vh-100 justify-content-between align-items-center">
                <div class="col-12">
                    <div  class="lockscreen  mt-5 mb-5">
                        <div class="jumbotron mb-0 text-center theme-background rounded">
                            <h1 class="display-3 font-weight-bold"> 403 forbidden</h1>
                            <h5><i class="ion ion-alert pr-2"></i>Oops! Something went wrong</h5>
                            <p>You are not authroize to access this page</p>
                            <a href="route('dashboard')" class="btn btn-primary">Go To Dashboard</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endsection 

@section('css') 
<style type="text/css"></style>
@endsection 
@section('js') 
<script type="text/javascript">

</script>
@endsection