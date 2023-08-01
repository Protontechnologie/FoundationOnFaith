@extends('layouts.main')
@section('content')
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">User Management</h4></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item"><a href="{{route('user.index')}}">User</a></li>
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
                        <h6 class="card-title">User Form</h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row"> 
                                            <div class="form-group col-md-4">
                                                <label for="roleType">Role Type</label>
                                                <select class="form-control rounded" name="type" required id="roleType">
                                                    @if($roles)
                                                        @foreach($roles as $role)
                                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                        @endforeach
                                                        @else
                                                        <option value="" selected disabled>No Option Available</option>
                                                    @endif
                                                </select>
                                                <div class="form-group working-under d-none" >
                                                    <label for="under_team">Under team of</label>
                                                    <select class="form-control rounded" name="team_id" id="under_team">
                                                        @if($teams)
                                                            @foreach($teams as $team)
                                                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                                                            @endforeach
                                                            @else
                                                            <option value="" selected disabled>No Option Available</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputName4">Name</label>
                                                <input type="text" required name="name" class="form-control rounded" id="inputName4" placeholder="Name" />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="slug">Username</label>
                                                <input type="text" required name="username" class="form-control rounded" id="username" placeholder="Username" />
                                                <span id="usernameAvailabilityMsg"></span>
                                            </div>
                                        </div>


                                        <div class="form-row"> 
                                            <div class="form-group col-md-4">
                                                <label for="email">Email</label>
                                                <input type="email" required name="email" class="form-control rounded" id="email" placeholder="Email Address" />
                                                <span id="emailAvailabilityMsg"></span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputName4">Contact Number</label>
                                                <input type="text" required name="phonenumber" class="form-control rounded" id="inputName4" placeholder="Contact Number" />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="Department132">Department</label>
                                                <select class="form-control rounded" name="department" required id="Department132">
                                                    @if($departments)
                                                        @foreach($departments as $department)
                                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                        @endforeach
                                                        @else
                                                        <option value="" selected disabled>No Option Available</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        

                                        <div class="form-row"> 
                                            
                                            <div class="form-group col-md-4">
                                                <label for="password">Profile Picture</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="profile_pic" id="validatedCustomFile" accept=".png,.jpg,.jpeg" required>
                                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="password">Password</label>
                                                <input type="password" required name="password" class="form-control rounded" id="password" placeholder="Password" />
                                                <span id="passwordMatchMsg"></span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="confirmPassword">Confirm Password</label>
                                                <input type="password" required name="confirm_password" class="form-control rounded" id="confirmPassword" placeholder="Confirm Password" />
                                                <span id="confirmpasswordMatchMsg"></span>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary" id="user-form-submit">Create</button>
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
<script>
    
    $("#roleType").change(function(){
        var role_type = $(this).find(":selected").val();
        if(role_type == 4){
            $(".working-under").removeClass("d-none")
            $("#under_team").prop("required" , true)
        }else{
            $(".working-under").addClass("d-none")
            $("#under_team").prop("required" , false)
        }
    })

    $(document).ready(function(){
        $(document).on("focusout",'#email',function() {
            var email = $(this).val();
            
            if(email == ""){
                $("#user-form-submit").prop("disabled" , true)
                return false
            }else {
                $("#user-form-submit").prop("disabled" , false)
                $.ajax({
                        type: 'POST',
                        url: '{{route("username_availability")}}',
                        data: {
                        '_token': '{{ csrf_token() }}',
                        'data': email,
                        'type': 'email'
                    },
                    success: function(data) {
                        if (data.available) {
                            
                            $('#emailAvailabilityMsg').text('Email is available').css('color', 'green');
                            $("#user-form-submit").prop("disabled" , false)
                        } else {
                            $('#emailAvailabilityMsg').text('Email is not available.').css('color', 'red');
                            $("#user-form-submit").prop("disabled" , true)
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error if needed
                        console.log(xhr)
                        console.log(status)
                        console.log(error)
                    }
                });
            }
        });
    })


    $('#username').keyup(function() {
        var username = $(this).val();
        var validUsername = /^[a-zA-Z0-9_]+$/.test(username);

        if (!validUsername) {
            $('#usernameAvailabilityMsg').text('Username must contain only letters, numbers, and underscores. No spaces or special characters allowed.').css('color', 'red');
            $("#user-form-submit").prop("disabled", true);
        } else if (username === "") {
            $('#usernameAvailabilityMsg').text('');
            $("#user-form-submit").prop("disabled", true);
        } else {
            $.ajax({
                type: 'POST',
                url: '{{ route("username_availability") }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'data': username,
                    'type': 'username'
                },
                success: function(data) {
                    if (data.available) {
                        $('#usernameAvailabilityMsg').text('Username is available').css('color', 'green');
                        $("#user-form-submit").prop("disabled", false);
                    } else {
                        $('#usernameAvailabilityMsg').text('Username is not available. Suggested: ' + data.suggested).css('color', 'red');
                        $("#user-form-submit").prop("disabled", true);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                    $("#user-form-submit").prop("disabled", true);
                }
            });
        }
    });


    $('#confirmPassword').keyup(function() {
        var password = $('#password').val();
        var confirmPassword = $(this).val();
        
        if (password !== confirmPassword) {
            $('#passwordMatchMsg').text('Passwords do not match').css('color', 'red');
            $('#confirmpasswordMatchMsg').text('Confirm Passwords do not match').css('color', 'red');
            $("#user-form-submit").prop("disabled" , true)
        } else {
            $('#passwordMatchMsg').text('Passwords match').css('color', 'green');
            $('#confirmpasswordMatchMsg').text('');
            $("#user-form-submit").prop("disabled" , false)
        }
    });

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
@endsection
