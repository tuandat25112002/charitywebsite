@extends('admin/master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>QUẢN LÝ DỰ ÁN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('admin')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{URL::to('product')}}">Quản lý dự án</a></li>
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
                <h3 class="card-title">DANH SÁCH DỰ ÁN</h3>
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
                    <th>Ngày diễN ra</th>
                    <th>Dự án</th>
                    <th>Ảnh dự án</th>
                    <th>Slug</th>
                    <th>Danh mục</th>
                    <th>Thụ hưởng</th>
                    <th>Mục tiêu</th>
                    <th>Quỹ nhóm</th>
                    <th class="litmit-th">Mô tả</th>
                    <th>Trạng thái</th>
                    <th>Active</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($projects as $key=>$project)
                  <tr>
                    <td><?php echo date("Y-m-d", $project->date_action)?></td>
                    <td>{{$project->name_project}}</td>
                    <td class="td-image"><img src="<?php echo $project->thumbnail?>"></td>
                    <td>{{$project->slug}}</td>
                    <td>{{$project->Category->name_category}}</td>
                    <td>{{$project->donate_for}}</td>
                    <td><?php echo number_format($project->target,0); ?> VND</td>
                    <td><?php echo number_format($project->fund,0); ?> VND</td>
                    <td class="description">{{$project->short_desc}}</td>
                    <td class="w-200px">
                    <p class="<?php echo $project->status==0? "text-danger" : "text-success"?>" >
                    <select class="custom-select checkbox-status" data-id="{{$project->id}}" name="status">
                        <option value="0" class="bg-danger" <?php echo $project->status==0? "selected" : ""?>>Chưa hoàn thành</option>
                        <option value="1" class="bg-success" <?php echo $project->status==1? "selected" : ""?>>Hoàn thành</option></option>
                    </select>
                    </p></td>
                    <td>
                      <label class="switch">
                        <input type="checkbox" class="checkbox-active" data-id="{{$project->id}}" <?php echo $project->active==1 ? "checked" : ""?>>
                        <span class="slider round"></span>
                      </label>
                    </td>
                    <td class="w-200px">
                      <form  action="{{route('manager-project.destroy',[$project->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                      <button onclick ="return confirm('Bạn muốn xóa dự án này ?');" type="submit " class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button>
                      <a href="{{route('manager-project.edit',[$project->id])}}" class="pr-2 btn btn-primary"><i class="fas fa-edit"></i></a>
                       <a href="{{URL::to('project/uploadiamge/'.$project->id)}}" class="pr-2 btn btn-success"><i class="fas fa-edit"></i></a>
                      </form>

                    </td>
                  </tr>
                  @endforeach
 {{--                  <tfoot>
                  <tr>
                    <th>Tên danh mục</th>
                    <th>Slug</th>
                    <th>Mô tả</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </tfoot> --}}
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
$('.checkbox-status').change(function(){
  var id= $(this).data('id');
  var _token = $('input[name="_token"]').val();
  $.ajax({
    url:"{{URL::to('project/update_status')}}",
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
