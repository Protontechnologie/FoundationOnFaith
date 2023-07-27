@extends('layouts.main')
@section('content')
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Membership Management</h4></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item"><a href="{{route('membership.index')}}">Membership</a></li>
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
                        <h6 class="card-title">Membership Management</h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{route('membership.update' , [$membership->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-row"> 
                                            <div class="form-group col-md-4">
                                                <label for="inputType4">Type</label>
                                                <select class="form-control rounded" name="type" required id="inputType4">
                                                    <option value="1" @if($membership->type == 1) selected @endif>Monthly</option>
                                                    <option value="2" @if($membership->type == 2) selected @endif>Yearly</option>
                                                </select>
                 
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputName4">Name</label>
                                                <input type="text" required name="title" class="form-control rounded" id="inputName4" placeholder="Name" value="{{$membership->title}}"/>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="slug">Slug</label>
                                                <input type="text" required name="slug" class="form-control rounded" id="slug" placeholder="Slug" value="{{$membership->slug}}"/>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="card-body">
                                                <textarea name="desc" class="summernote">{!! $membership->desc !!}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <label for="price">Price</label>
                                            <input type="number" min="0" required name="price" class="form-control rounded" id="price" placeholder="Enter the amount" value="{{$membership->price}}" step="0.01"/>
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
<link rel="stylesheet" href="{{asset('vendors/summernote/summernote-bs4.css')}}" />
<style type="text/css"></style>
@endsection
@section('js')
<script src="{{asset('vendors/summernote/summernote-bs4.js')}}"></script> 
<script src="{{asset('js/summernote.script.js')}}"></script>
<script>
    $("#inputName4").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        $("#slug").val(Text);  
    });
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
@endsection
