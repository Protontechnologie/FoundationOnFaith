@extends('layouts.main') 
@section('content')
<!-- START: Card Data-->
<main>
   <div class="container-fluid site-width">
      <!-- START: Breadcrumbs-->
      <div class="row">
         <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
               <div class="w-sm-100 mr-auto">
                  <h4 class="mb-0">Main Category Management</h4>
               </div>
               <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item">Category</li>
                  <li class="breadcrumb-item active"><a href="#">View All</a></li>
               </ol>
            </div>
         </div>
      </div>
      <!-- END: Breadcrumbs-->
      <!-- START: Card Data-->
      <div class="row">
         <div class="col-12 mt-3">
            <div class="card">
               <div class="card-header justify-content-between align-items-center">
                  <h4 class="card-title">Main Category</h4>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                    
                     <table id="example" class="display table dataTable table-striped table-bordered">
                        <thead>
                           <tr>
                              <th>S No</th>
                              <th>Type</th>
                              <th>Name</th>
                              <th>Slug</th>
                              <th>Created On</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody> 
                           @if($maincategory) 
                           @foreach($maincategory as $key => $val)
                           <tr>
                                <td>{{++$key}}</td>
                                <td>@if($val->type == 1) Men @else Women @endif</td> 
                                <td>{{$val->name}}</td>
                                <td>{{$val->slug}}</td>
                                <td>{{date('M d,Y' , strtotime($val->created_at))}}</td>
                                <td>
                                    <a href="{{route('maincategory.edit',[$val->id])}}" class="btn btn-primary edit_maincategory">Edit</a>
                                    <button type="button" class="btn btn-danger delete_maincategory">Delete</button>
                                </td>
                                
                           </tr>
                           @endforeach 
                           @endif
                        </tbody>
                        <tfoot>
                           <tr>
                           <th>S No</th>
                              <th>Type</th>
                              <th>Name</th>
                              <th>Slug</th>
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
      <!-- END: Card DATA-->
   </div>
</main>

<!-- END: Card DATA-->
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

    $(".edit_user").click(function(){
        $("#edit_designation").text($(this).data('designation'));
        $("#edit_department").text($(this).data('department'));
        $("#edit_emp_id").text($(this).data('emp_id'));
        $("#edit_reporting_line").text($(this).data('reporting_line'));
        $("#edit_salary").text($(this).data('salary'));
        $("#edit_role_id").text($(this).data('role_id'));
        $("#edit_email").text($(this).data('email'));
        $("#edit_email").prop("data-placeholder",$(this).data('email'));
        $("#edit_active").text($(this).data('status'));

        $("#edit_shift_in").text($(this).data('shift_in'));
        $("#edit_shift_out").text($(this).data('shift_out'));

        $("#edit_userid").val($(this).data('edit_userid'));
        $("#exampleModalgrid").modal('show');
    })   

</script>
@endsection