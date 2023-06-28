@extends('admin/master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>QUẢN LÝ DANH MỤC</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('admin')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{URL::to('category')}}">Danh mục bài viết</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                 @if (session('status'))
                        <div class="alert container-fluid alert-success" role="alert">
                                {{session('status')}} <i id="close" class="fas fa-times float-right mt-1"></i>
                            </div>
                        @endif
                <table id="table-category" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Tên danh mục</th>
                    <th>Slug</th>
                    <th class="litmit-th">Mô tả</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($categories as $key=>$category)
                  <tr>
                    <td>{{$category->name_category}}</td>
                    <td>{{$category->slug}}</td>
                    <td class="description"><?php echo $category->description?></td>
                    <td>
                      <label class="switch">
                        <input type="checkbox" class="checkbox-active" data-id="{{$category->id}}" <?php echo $category->active==1 ? "checked" : ""?>>
                        <span class="slider round"></span>
                      </label>
                    </td>
                    <td class="d-flex">
                      <form  action="{{route('manager-category.destroy',[$category->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                      <button onclick ="return confirm('Bạn muốn xóa danh mục này ?');" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                      </form>
                      <a href="{{route('manager-category.edit',[$category->id])}}" class="btn btn-primary ml-1"><i class="fas fa-edit"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  <tfoot>
                  <tr>
                    <th>Tên danh mục</th>
                    <th>Slug</th>
                    <th>Mô tả</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<script type="text/javascript">
$('.checkbox-active').click(function(){
  var id= $(this).data('id');
  var _token = $('input[name="_token"]').val();
  $.ajax({
    url:"{{URL::to('category/update_active')}}",
    method:"POST",
    data: {id:id,_token:_token},
    success:function(data){
      alert(data.message);
    }
  });
});
</script>

@endsection
