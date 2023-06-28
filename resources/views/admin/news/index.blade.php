@extends('admin/master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>QUẢN LÝ TIN TỨC</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('admin')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{URL::to('news')}}">Quản lý tin tức</a></li>
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
                <h3 class="card-title">DANH SÁCH TIN TỨC</h3>
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
                    <th>*</th>
                    <th>Tiêu đề tin tức</th>
                    <th>Ảnh</th>
                    <th>Slug tin tức</th>
                    <th>Tóm tắt</th>
                    <th>Nội dung</th>
                    <th >Nguồn</th>
                    <th >Kích hoạt</th>
                    <th >Quản lý</th>
                  </tr>
                  </thead>
                  <tbody>
                 @foreach($news as $key => $list)
                        <tr>

                          <th scope="row">{{$key+1}}</th>
                          <td>{{$list->tieude}}</td>
                          <!-- load ảnh -->
                          <td><img src="{{$list->hinhanh}}" width="100" height="80"></td>

                          <td>{{$list->slug_tintuc}}</td>

                          <td class="description">{{$list->tomtat}}</td>
                          <td class="description">{{$list->noidung}}</td>


                          <td>
                             {{$list->nguon}}
                          </td>
                          <td>
                              @if($list->active==0)
                                <span class="text text-success text-danger">Không kích hoạt</span>
                              @else
                                <span class="text text-success text-center">Kích hoạt</span>
                              @endif
                          </td>
                          <td>
                                <a href="{{route('manager-news.edit',[$list->id])}}" class="btn btn-warning">Sửa</a>
                              <form action="{{route('manager-news.destroy',[$list->id])}}" method="POST">
                                  @method('DELETE')
                                  @csrf
                                  <button onclick ="return confirm('Bạn có muốn chắc xóa tin tức này?');" class="btn btn-danger">Xóa</button>
                              </form>
                          </td>

                        </tr>
                        @endforeach

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
    url:"{{URL::to('project/update_active')}}",
    method:"POST",
    data: {id:id,_token:_token},
    success:function(data){
      alert(data.message);
    }
  });
});
</script>
<script type="text/javascript">

</script>
@endsection
