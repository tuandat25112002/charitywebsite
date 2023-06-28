@extends('admin/dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh mục bài viết</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('admin')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{URL::to('category')}}">Danh mục bài viết</a></li>
              <li class="breadcrumb-item active">Cập nhật danh mục</li>
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
                <h3 class="card-title">Cập nhật danh mục</h3>
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
              <form action="{{route('manager-category.update',[$category->id])}}" id="quickForm" enctype="multipart/form-data" method="POST">
              @csrf
              @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="slug">Tên danh mục (<span class="required">*</span>)</label>
                    <input type="text" name="name_category" onkeyup="ChangeToSlug()" class="form-control" id="slug" value="{{$category->name_category}}" placeholder="Name Of Category">
                  </div>
                  <div class="form-group">
                    <label for="convert_slug">Slug danh mục (<span class="required">*</span>)</label>
                    <input type="text" name="slug" value="{{$category->slug}}" class="form-control" id="convert_slug" placeholder="Slug">
                  </div>
                  <div class="form-group">
                    <label for="editor">Mô tả (<span class="required">*</span>):</label>
                    <textarea class="form-control" id="editor" name="description" rows="5" resize="none">{{$category->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Trạng thái (<span class="required">*</span>):</label>
                    <select class="custom-select" name="active">
                      <option <?php echo $category->active==1? "selected" : ""?> value="1">Kích hoạt</option>
                      <option <?php echo $category->active==0? "selected" : ""?> value="0">Không kích hoạt</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
