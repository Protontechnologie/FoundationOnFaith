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
                  <h4 class="mb-0">My Task</h4>
               </div>
               <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item">My Task</li>
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
                  <h4 class="card-title">All Task</h4>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                    
                     <table id="example" class="display table dataTable table-striped table-bordered">
                        <thead>
                           <tr>
                              <th>S No</th>
                              <th>Title</th>
                              <th>Assign From</th>
                              <th>Deadline</th>
                              <th>Status</th>
                              <th>Created On</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody> 
                           @if($tasks) 
                           @foreach($tasks as $key => $val)
                           <tr>
                                <td>{{++$key}}</td>
                                <td>{{$val->title}}</td>
                                <td>{{$val->task_from->name}}</td>
                                <td>{{date('M d,Y' , strtotime($val->deadline))}}</td>
                                <td>
                                    <div class="btn-group mb-2">
                                       <button type="button" class="btn btn-{{$val->task_status()['alert']}}">{{$val->task_status()['type']}}</button>
                                    </div>
                                </td>
                                <td>{{date('M d,Y' , strtotime($val->created_at))}}</td>
                                <td>
                                 @if(Helper::can_edit('my_task'))
                                    <a href="javascript:void(0)" class="btn btn-primary @if($val->task_status()['type'] == 'Pending') update_task @else preview_task @endif" data-id="{{$val->id}}" data-task_name="{{ $val->title }}" data-task_details="{{ $val->details }}" data-task_comments="{{$val->comments}}">@if($val->task_status()['type'] == 'Pending') Update @else Review @endif</a>
                                 @endif
                                </td>
                                
                           </tr>
                           @endforeach 
                           @endif
                        </tbody>
                        <tfoot>
                           <tr>
                           <th>S No</th>
                              <th>Title</th>
                              <th>Assign From</th>
                              <th>Deadline</th>
                              <th>Status</th>
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
<div class="modal fade" id="UpdateTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Task Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <p>
                        <a class="btn btn-primary" id="task_name" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            XXX XXXX
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <p class="border p-3" id="task_details"> 
                            Task Details                                       
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{route('update_mytask')}}">
                                @csrf
                                <input type="hidden" value="" name="request_id" id="request_id" />
                                <div class="form-group row">
                                    <label for="task_status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="task_status" name="task_status">
                                            <option value="0">Pending</option>
                                            <option value="1">Close</option>
                                            <option value="2">Completed</option>
                                        <select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputComments" class="col-sm-2 col-form-label">Comments</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputComments" name="comments" placeholder="Enter Comments..." required></textarea>
                                    </div>
                                </div> 
                                <input type="submit" id="submit-task-update" hidden />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submit-changes" >Save changes</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ReviewTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Task Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <p>
                        <a class="btn btn-primary" id="task_name_review" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            XXX XXXX
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <p class="border p-3" id="task_details_review"> 
                            Task Details                                       
                        </p>
                    </div> 
                    <p class="border p-3" id="task_comments_review"> 
                            Task Comment                                       
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<!-- END: Card DATA-->
@endsection 
@section('css') 
<link rel="stylesheet" href="{{asset('vendors/datatable/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{asset('vendors/datatable/buttons/css/buttons.bootstrap4.min.css')}}"/>
@endsection 

@section('js') 
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

<script type="text/javascript">
    $(document).on("click",".update_task" , function(){
        $("#request_id").val($(this).data("id"))
        $("#task_name").text($(this).data("task_name"))
        $("#task_details").html($(this).data("task_details"))
        $("#UpdateTask").modal("show")
    })

    $(document).on("click",".preview_task" , function(){
        $("#task_name_review").text($(this).data("task_name"))
        $("#task_details_review").html($(this).data("task_details"))
        $("#task_comments_review").html($(this).data("task_comments"))
        $("#ReviewTask").modal("show")
    })

    

    $(document).on("click",".submit-changes" , function(){
        $("#submit-task-update").trigger("click")
    })
    
</script>

@endsection 
