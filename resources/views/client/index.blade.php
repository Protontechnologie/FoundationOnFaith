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
                  <h4 class="mb-0">Client Assigning Management</h4>
               </div>
               <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item">Client Assign</li>
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
                  <h4 class="card-title">Clients</h4>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                    
                     <table id="example" class="display table dataTable table-striped table-bordered">
                        <thead>
                           <tr>
                              <th>S No</th>
                              <th>Client</th>
                              <th>Assign To</th>
                              <th>Assign From</th>
                              <th>Created On</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody> 
                           @if($client_assign) 
                           @foreach($client_assign as $key => $val)
                           <tr>
                                <td>{{++$key}}</td>
                                <td>{{$val->client_detail->name}}</td>
                                <td>{{$val->assigned_to->name}}</td>
                                <td>{{$val->assigned_from->name}}</td>
                                <td>{{date('M d,Y' , strtotime($val->created_at))}}</td>
                                <td>
                                 @if(Helper::can_edit('client_assignment'))
                                    <a href="{{route('client.edit',[$val->id])}}" class="btn btn-primary edit_client">Edit</a>
                                 @endif
                                 @if(Helper::can_delete('client_assignment'))
                                    

                                    <form action="{{ route('client.destroy', ['client' => $val->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger delete_program">Delete</button>
                                    </form>
                                 @endif
                                </td>
                                
                           </tr>
                           @endforeach 
                           @endif
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>S No</th>
                              <th>Client</th>
                              <th>Assign To</th>
                              <th>Assign From</th>
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
@endsection 

@section('script') 
<!-- END: Template JS-->
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