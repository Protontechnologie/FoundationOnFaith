@extends('layouts.main')
@section('content')
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Program Management</h4></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item"><a href="{{route('program.index')}}">Program</a></li>
                        <li class="breadcrumb-item active"><a href="#">Create</a></li>
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
                        <h6 class="card-title">Program Management</h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{route('program.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <label for="inputTitle4">Title</label>
                                            <input type="text" required name="title" class="form-control rounded" id="inputTitle4" placeholder="Title" />                                          
                                        </div>

                                        <div class="form-row">
                                            <div class="card-body">
                                                <textarea name="desc" class="summernote"><p>Description here...</p></textarea>
                                            </div>
                                        </div>
                                        

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="upload" id="validatedCustomFile" accept=".png,.jpg" required>
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Create</button>
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
<link rel="stylesheet" href="{{asset('vendors/summernote/summernote-bs4.css')}}" />
<style type="text/css"></style>
@endsection
@section('js')
<script src="{{asset('vendors/summernote/summernote-bs4.js')}}"></script> 
<script src="{{asset('js/summernote.script.js')}}"></script>
<script>

</script>
@endsection
