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
                  <h4 class="mb-0">User Management</h4>
               </div>
               <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item">User</li>
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
                  <h4 class="card-title">User</h4>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                    
                     <table id="example" class="display table dataTable table-striped table-bordered">
                        <thead>
                           <tr>
                              <th>S No</th>
                              <th>Role</th>
                              <th>Name</th>
                              <th>Username</th>
                              <th>Email</th>
                              <th>Contact Number</th>
                              <th>Department</th>
                              <th>Created On</th>
                              <th>Is Active</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody> 
                           @if($users) 
                           @foreach($users as $key => $val)
                           <tr>
                                <td>{{++$key}}</td>
                                <td>{{$val->roles->name}}</td>
                                <td>{{$val->name}}</td>
                                <td>{{$val->username}}</td>
                                <td>{{$val->email}}</td>
                                <td>{{$val->phonenumber}}</td>
                                <td>{{$val->departments->name}}</td>
                                
                                <td>{{date('M d,Y' , strtotime($val->created_at))}}</td>
                                 <td>
                                 <input type="checkbox" class="change_status" @if($val->is_active == 1) checked @endif data-user="{{$val->id}}" value="off" data-toggle="toggle" data-onstyle="primary">
                                 </td>
                                <td>
                                 @if(Helper::can_edit('users'))
                                    <a href="{{route('user.edit',[$val->id])}}" class="btn btn-primary edit_user">Edit</a>
                                 @endif
                                 @if(Helper::can_delete('users'))
                                    <form action="{{ route('user.destroy', ['user' => $val->id]) }}" method="POST">
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
                              <th>Role</th>
                              <th>Name</th>
                              <th>Username</th>
                              <th>Email</th>
                              <th>Contact Number</th>
                              <th>Department</th>
                              <th>Created On</th>
                              <th>Is Active</th>
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
<link rel="stylesheet" href="{{asset('vendors/bootstrap4-toggle/css/bootstrap4-toggle.min.css')}}" />
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
$(".change_status").change(function(){
   var status  = 0;
   if($(this).is(":checked")){
      status = 1;
   }else{
      status = 0;
   }
   var user_id = $(this).data("user")
   
   $.ajax({
      type: 'POST',
      url: '{{route("change_status")}}',
      data: {
         '_token': '{{ csrf_token() }}',
         'status': status,
         'user_id': user_id
      },
      success: function(resp) {
         if (resp.stat == "active") {                   
            toastr.success("User is now a active user")
         } else {
            toastr.info("User is now blocked")
         }
      },
      error: function(xhr, status, error) {
         console.log(xhr)
         console.log(status)
         console.log(error)
      }
   });
})
</script>
@endsection