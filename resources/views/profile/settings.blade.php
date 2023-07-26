@extends('layouts.main') @section('content')
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><span class="h4 my-auto">Website Setting</span></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="#">Setting</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        
    </div>
</main>
@endsection @section('css')
<style type="text/css">
    .centered {
        position: absolute;
        font-size: 55px;
        color: red;
        transform: translate(20%, -17%);
    }
    .card-body .row {
        display: block;
    }
</style>
@endsection @section('js')
<script>
        
        $('document').ready(function(){
            $('#blah').click(function(){
                $('#upload-img').trigger('click');
            });
        });

        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
          }
        }
        $("#upload-img").change(function() {
          $("#heading_upload").hide();
          readURL(this);
        });

        $("#upload-img").change(function(e) {
            var val = $(this).val();
            if (val.match(/(?:gif|jpg|png|bmp)$/)) {
                if (confirm('Do you really want to change your profile image?')) {
                    $("#form-image-upload").submit();
                } else {
                    alert('No image has been updated');
                }
            }
        });

        
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
</script>
@endsection
