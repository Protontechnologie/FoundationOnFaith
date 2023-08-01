@extends('layouts.main')
@section('content')
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Client Assigning Management</h4></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item"><a href="{{route('client.index')}}">Client Assigning</a></li>
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
                        <h6 class="card-title">Client Assigning</h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{route('client.update' , [$client_assign->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-row"> 
                                            <div class="form-group col-md-4">
                                                <label for="client_id">Client</label>
                                                <select class="form-control rounded" name="client_id" required id="client_id">
                                                    @if($clients)
                                                        @foreach($clients as $val)
                                                            <option value="{{$val->id}}" @if($client_assign->client_id == $val->id) selected @endif>{{ $val->name }} - {{ $val->email }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                 
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="inputType4">Assign To</label>
                                                <select class="form-control rounded" name="assign_to" required id="inputType4">
                                                    @if($assign_to)
                                                        @foreach($assign_to as $val)
                                                            <option value="{{$val->id}}" @if($client_assign->assign_to == $val->id) selected @endif>{{ $val->name }} - {{ $val->departments->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>   
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="card-body">
                                                <textarea name="comments" class="summernote">{!! $client_assign->comments !!}</textarea>
                                            </div>
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
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
@endsection
