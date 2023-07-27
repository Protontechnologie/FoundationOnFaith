@extends('layouts.main') @section('content')
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><span class="h4 my-auto">User Department</span></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item">User</li>
                        <li class="breadcrumb-item active"><a href="{{route('departments.index')}}">department</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <!-- <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2> -->
                </div>
                @if(Helper::can_create('department'))
                <div class="pull-right text-right p-2">
                    <a class="btn btn-primary" href="" data-toggle="modal" data-target="#AddModal"> Create</a>
                </div>
                @endif
            </div>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header justify-content-between align-items-center">
                        <h4 class="card-title">Departments</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table dataTable table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Name</th>
                                        <th>Created On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($departments) @foreach ($departments as $key => $department)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$department->name}}</td>
                                        <td>{{date('M d,Y' , strtotime($department->created_at))}}</td>
                                        <td>
                                        @if(Helper::can_edit('department'))
                                            <a class="btn btn-primary" href="{{ route('departments.edit',$department->id) }}" data-toggle="modal" data-target="#editModal{{$department->id}}">Edit</a>
                                        @endif
                                        @if(Helper::can_delete('department'))
                                            <form action="{{ route('departments.destroy',$department->id) }}" method="POST" class="form-delete">
                                                @csrf @method('DELETE')

                                                <button type="submit" class="btn btn-danger delete_button" onclick="return confirm('Are you sure you want to delete this department?');">Delete</button>
                                            </form>
                                        @endif
                                        </td>
                                    </tr>
                                    <!-- Edit Modal start -->
                                    <div class="modal fade" id="editModal{{$department->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$department->id}}" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle{{$department->id}}">Edit Department</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="document-content">
                                                        @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <strong>Whoops!</strong> There were some problems with your input.<br />
                                                            <br />
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        @endif

                                                        <form action="{{ route('departments.update',$department->id) }}" method="POST">
                                                            @csrf @method('PUT')

                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <strong>Title:</strong>
                                                                        <input type="text" name="name" value="{{ $department->name }}" class="form-control mt-2" placeholder="Name" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit Modal start -->

                                    @endforeach @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S No</th>
                                        <th>Name</th>
                                        <th>Created On</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Modal start -->
        <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Department</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="document-content">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br />
                                <br />
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{ route('departments.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Title</strong>
                                            <input type="text" name="name" value="" class="form-control mt-2" placeholder="Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Modal start -->

        <div class="row mt-3"></div>
        <!-- END: Card DATA-->
    </div>
</main>

@endsection 
@section('link') 
<link rel="stylesheet" href="{{asset('vendors/datatable/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{asset('vendors/datatable/buttons/css/buttons.bootstrap4.min.css')}}"/>
<link rel="stylesheet" href="{{asset('vendors/x-editable/css/bootstrap-editable.css')}}" />
@endsection 

@section('script') 
<!-- END: Template JS-->

<script src="{{asset('vendors/x-editable/js/bootstrap-editable.min.js')}}"></script>
<script src="{{asset('js/xeditable.script.js')}}"></script>

<script src="{{asset('vendors/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/datatable/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('vendors/datatable/jszip/jszip.min.js')}}"></script>
<script src="{{asset('vendors/datatable/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('vendors/datatable/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('vendors/datatable/buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/datatable/buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/datatable/buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('vendors/datatable/buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('vendors/datatable/buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendors/datatable/buttons/js/buttons.print.min.js')}}"></script>

<script src="{{asset('js/datatable.script.js')}}"></script>
@endsection 

@section('css') 
<style type="text/css"></style>
@endsection 
@section('js') 
<script type="text/javascript">

</script>
@endsection
