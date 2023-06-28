@extends('admin/dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý dự án</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('admin')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{URL::to('project')}}">Quản lý dự án</a></li>
              <li class="breadcrumb-item active">Upload ảnh</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Upload ảnh</h3>
              </div>
            </div>
            <div class="card-body">
            <label >Hình ảnh mô tả về dự án (<span class="required">*</span>):</label>
                 <div class="col-sm-12 col-11 main-section-upload">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <div class="file-loading">
                                            <input id="file-1" type="file" name="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
                                        </div>
                                    </div>

                            </div>
           </div>
          </div>

        </div>
      </div>
  </div>
    <script type="text/javascript">
                        $("#file-1").fileinput({
                            theme: 'fa',
                            uploadUrl: "/image-view",
                            uploadExtraData: function() {
                                return {
                                    _token: $("input[name='_token']").val(),
                                };
                            },
                            allowedFileExtensions: ['jpg', 'png', 'gif'],
                            overwriteInitial: false,
                            maxFileSize:2000,
                            maxFilesNum: 10,
                            slugCallback: function (filename) {
                                return filename.replace('(', '_').replace(']', '_');
                            }
                        });
                    </script>
  @endsection

