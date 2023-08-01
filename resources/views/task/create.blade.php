@extends('layouts.main')
@section('content')
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Task Management</h4></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item"><a href="{{route('task.index')}}">Task</a></li>
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
                        <h6 class="card-title">Task Form</h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{route('task.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row"> 
                                            <div class="form-group col-md-4">
                                                <label for="inputType4">Assign To</label>
                                                <select class="form-control rounded" name="assign_to" required id="inputType4">
                                                    @if($assign_to)
                                                        @foreach($assign_to as $val)
                                                            <option value="{{$val->id}}">{{ $val->name }} - {{ $val->departments->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                 
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label for="inputName4">Title</label>
                                                <input type="text" required name="title" class="form-control rounded" id="inputName4" placeholder="Enter the Task title" />
                                            </div>
                                        </div>
                                        

                                        <div class="form-row">
                                            <div class="card-body">
                                                <textarea name="details" class="summernote"><p>Description here...</p></textarea>
                                            </div>
                                        </div>

                                        <div class="form-row col-md-4">
                                            <label for="deadline">Deadline</label>
                                            <input type="date" required name="deadline" class="form-control rounded" id="deadline" min="{{ date('Y-m-d') }}"/>
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
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
@endsection
