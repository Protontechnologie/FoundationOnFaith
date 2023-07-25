@extends('layouts.main')
@section('content')
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Product Management</h4></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item"><a href="{{route('product.index')}}">Product</a></li>
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
                        <h6 class="card-title">Product Management</h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{route('product.update' , [$product->id])}}" method="PUT" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputName4">Name</label>
                                                <input type="text" required name="name" value="{{$product->name}}" class="form-control rounded" id="inputName4" placeholder="Name" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="slug">Slug</label>
                                                <input type="text" required name="slug" value="{{$product->slug}}" class="form-control rounded" id="slug" placeholder="Slug" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputDescription">Description</label>
                                            <input type="text" class="form-control" value="{{$product->details}}" required name="details" id="inputDescription" placeholder="Tell something about this product" />
                                        </div>

                                        @if($product->product_file != '')
                                        <div class="form-group">
                                            <div class="item col-12 col-md-6 col-lg-4 mb-4 text-center Branding">                                       
                                                <img src="{{asset($product->product_file)}}" alt="" class="portfolioImage img-fluid">
                                                <div class="d-flex">
                                                    <a data-fancybox-group="gallery" href="{{asset($product->product_file)}}" class="fancybox btn rounded-0 btn-dark w-100">View Large</a>                            
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="product_file" id="validatedCustomFile" accept=".png,.jpg"  @if($product->product_file == '') required @endif>
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>

                                        <div class="form-group">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <input type="checkbox" name="is_active" value="1"  data-toggle="toggle" data-on="Active" data-off="Not Active" data-onstyle="success" data-offstyle="danger" @if($product->is_active == 1) checked="" @endif>
                                                </div>
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
<style type="text/css"></style>
@endsection
@section('js')
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
