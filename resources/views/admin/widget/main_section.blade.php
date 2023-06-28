<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    function chooseFile(thumbnail){
        if(thumbnail.files && thumbnail.files[0]){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#image').attr('src',e.target.result);
            }
            reader.readAsDataURL(thumbnail.files[0]);
        }

    }
    </script>
@extends('admin/master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Widgets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Widgets</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
              @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                                @if (session('status'))
                        <div class="alert container-fluid alert-success" role="alert">
                                {{session('status')}} <i id="close" class="fas fa-times float-right mt-1"></i>
                            </div>
                        @endif
        <form action="{{URL::to('/main-section/update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="p-3">
                <h4 class="mb-2"><i class="nav-icon far fa-image"></i> Logo Website</h4>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label >Tải ảnh lên (<span class="required">*</span>):</label>
                    <div><label for="thumbnail" class="thumbnail-btn"><i class="fas fa-upload"></i> Tải ảnh lên</label></div>
                    <input type="file" onchange="chooseFile(this)" id="thumbnail" name="logo" class="form-control" >
                    <img src="<?php echo $logo->content ?>" width="auto" height="300px" id="image">
                    </div>
                </div>
                 <h4 class="mb-2"><i class="nav-icon far fa-image"></i> Tên website</h4>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label >Nhập tên (<span class="required">*</span>):</label>
                        <input type="text" value="{{$name->content}}" name="name" required class="form-control" placeholder="Name of the website">
                    </div>
                </div>
                <input type="submit" name="submit" value="Cập nhật" class="btn btn-success">
            </div>
        </form>
      </div>
    </section>
</div>
@endsection
