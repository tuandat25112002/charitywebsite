<head>
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
</head>
@extends('admin/dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý tin tức</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('admin')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{URL::to('news')}}">Quản lý tin tức</a></li>
              <li class="breadcrumb-item active">Thêm tin tức</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm tin tức</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
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
              <form action="{{route('manager-news.update',[$news->id])}}" method="POST" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                          <div class="card-body">
                            <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề tin tức:</label>
                            <input type="text" class="form-control" name="tieude" id="slug" value="{{$news->tieude}}" onkeyup="ChangeToSlug();" aria-describedby="emailHelp" placeholder="Tiêu đề tin tức...">

                          </div>
                              <div class="form-group">
                            <label for="exampleInputEmail1">Slug tin tức:</label>
                            <input type="text" class="form-control" name="slug_tintuc" id="convert_slug" value="{{$news->slug_tintuc}}" aria-describedby="emailHelp" placeholder="Slug tin tức...">

                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt tin tức:</label>
                            <input type="text" name="tomtat" class="form-control" id="exampleInputEmail1" value="{{$news->tomtat}}" aria-describedby="emailHelp" placeholder="Tóm tắt tin tức...">

                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung tin tức:</label>
                            <textarea class="form-control" id="editor" name="noidung" rows="5" resize="none">{{$news->noidung}}</textarea>

                          </div>
                          <div class="form-group col-md-4">
                    <label >Hình ảnh (<span class="required">*</span>):</label>
                    <div><label for="thumbnail" class="thumbnail-btn"><i class="fas fa-upload"></i> Tải ảnh lên</label></div>
                    <input type="file" onchange="chooseFile(this)" id="thumbnail" name="hinhanh" class="form-control" >
                    <img src="{{$news->hinhanh}}" width="auto" height="300px" id="image">
                  </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nguồn</label>
                            <input type="text" class="form-control" name="nguon" value="{{$news->nguon}}"  aria-describedby="emailHelp" placeholder="Nguồn...">

                          </div>

                         <div class="form-group">
                          <label for="exampleInputEmail1">Trạng thái:</label>
                          <select class="custom-select" name="active">

                              <option <?php echo $news->active==1?"selected":""?> value="1">Kích hoạt</option>
                              <option <?php echo $news->active==0?"selected":""?> value="0">Không kích hoạt</option>

                          </select>
                         </div>
                          </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
