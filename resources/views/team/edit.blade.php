@extends('layouts.main')
@section('content')
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Team Management</h4></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item"><a href="{{route('team.index')}}">Team</a></li>
                        <li class="breadcrumb-item active"><a href="#">Edit</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Team Management</h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{route('team.update' , [$team->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <div class="form-group col-md-6">
                                                <label for="inputName4">Name</label>
                                                <input type="text" required name="name" value="{{$team->name}}" class="form-control rounded" id="inputName4" placeholder="Name" />
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputDescription">Designation</label>
                                                <input type="text" class="form-control" value="{{$team->designation}}" required name="designation" id="inputDescription" placeholder="Enter designation" />
                                            </div>

                                        </div>

                                        @if($team->upload != '')
                                        <div class="form-group">
                                            <div class="item col-12 col-md-6 col-lg-4 mb-4 text-center Branding">                                       
                                                <img src="{{asset($team->upload)}}" alt="" class="portfolioImage img-fluid">
                                                <div class="d-flex">
                                                    <a data-fancybox-group="gallery" href="{{asset($team->upload)}}" class="fancybox btn rounded-0 btn-dark w-100">View Large</a>                            
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="upload" id="validatedCustomFile" accept=".png,.jpg"  @if($team->upload == '') required @endif>
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Card DATA-->
    </div>
</main>
@endsection
@section('css')
<style type="text/css"></style>
@endsection
@section('js')
<script></script>
@endsection
