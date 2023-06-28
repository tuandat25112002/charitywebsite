
@extends('user/master')
@section('content')
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
     <script type="text/javascript">
    function chooseFile1(thumbnail){
        if(thumbnail.files && thumbnail.files[0]){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#image2').attr('src',e.target.result);
            }
            reader.readAsDataURL(thumbnail.files[0]);
        }

    }
    </script>
<style type="text/css">
  .ui-w-80 {
    width: 80px !important;
    height: auto;
}

.btn-default {
    border-color: rgba(24,28,33,0.1);
    background: rgba(0,0,0,0);
    color: #4E5155;
}

label.btn {
    margin-bottom: 0;
}

.btn-outline-primary {
    border-color: #26B4FF;
    background: transparent;
    color: #26B4FF;
}

.btn {
    cursor: pointer;
}

/*.text-light {
    color: #babbbc !important;
}
*/
.btn-facebook {
    border-color: rgba(0,0,0,0);
    background: #3B5998;
    color: #fff;
}

.btn-instagram {
    border-color: rgba(0,0,0,0);
    background: #000;
    color: #fff;
}

.card {
    background-clip: padding-box;
    box-shadow: 0 1px 4px rgba(24,28,33,0.012);
}

.row-bordered {
    overflow: hidden;
}

.account-settings-fileinput {
    position: absolute;
    visibility: hidden;
    width: 1px;
    height: 1px;
    opacity: 0;
}
.account-settings-links .list-group-item.active {
    font-weight: bold !important;
}
html:not(.dark-style) .account-settings-links .list-group-item.active {
    background: transparent !important;
}
.account-settings-multiselect ~ .select2-container {
    width: 100% !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.material-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.material-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.dark-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(255, 255, 255, 0.03) !important;
}
.dark-style .account-settings-links .list-group-item.active {
    color: #fff !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4E5155 !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24,28,33,0.03) !important;
}
</style>
    <div class="container mt-3">
           <div class="row col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{URL::to('profile')}}">Profile</a></li>
            </ol>
          </div>
    </div>
    <div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
      Account settings
    </h4>

    <div class="card overflow-hidden mb-5">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">Thông tin chung</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Đổi mật khẩu</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Tạo dự án của bạn</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Social links</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notifications</a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">

              <div class="card-body media align-items-center">
                <img height="100px" src="https://res.cloudinary.com/dcugpagjy/image/upload/v1686597652/avatar/avatar_default_lotm7k.png">
                <div class="media-body ml-4">
                  <h5>{{$user->name}}</h5>
                  <h6 class="text-secondary">{{$user->email}}</h6>
                </div>
              </div>
              <hr class="border-light m-0">

              <div class="card-body">
                <div class="form-group">
                  <label class="form-label">Tên của bạn</label>
                  <input type="text" class="form-control mb-1" value="{{$user->name}}">
                </div>
                <div class="form-group">
                  <label class="form-label">E-mail</label>
                  <input type="text" class="form-control mb-1" value="{{$user->email}}">
                </div>
              </div>

            </div>
            <div class="tab-pane fade" id="account-change-password">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">Current password</label>
                  <input type="password" class="form-control">
                </div>

                <div class="form-group">
                  <label class="form-label">New password</label>
                  <input type="password" class="form-control">
                </div>

                <div class="form-group">
                  <label class="form-label">Repeat new password</label>
                  <input type="password" class="form-control">
                </div>

              </div>
            </div>
            <div class="tab-pane fade" id="account-info">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">Bio</label>
                  <textarea class="form-control" rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nunc arcu, dignissim sit amet sollicitudin iaculis, vehicula id urna. Sed luctus urna nunc. Donec fermentum, magna sit amet rutrum pretium, turpis dolor molestie diam, ut lacinia diam risus eleifend sapien. Curabitur ac nibh nulla. Maecenas nec augue placerat, viverra tellus non, pulvinar risus.</textarea>
                </div>
                <div class="form-group">
                  <label class="form-label">Birthday</label>
                  <input type="text" class="form-control" value="May 3, 1995">
                </div>
                <div class="form-group">
                  <label class="form-label">Country</label>
                  <select class="custom-select">
                    <option>USA</option>
                    <option selected="">Canada</option>
                    <option>UK</option>
                    <option>Germany</option>
                    <option>France</option>
                  </select>
                </div>


              </div>
              <hr class="border-light m-0">
              <div class="card-body pb-2">

                <h6 class="mb-4">Contacts</h6>
                <div class="form-group">
                  <label class="form-label">Phone</label>
                  <input type="text" class="form-control" value="+0 (123) 456 7891">
                </div>
                <div class="form-group">
                  <label class="form-label">Website</label>
                  <input type="text" class="form-control" value="">
                </div>

              </div>

            </div>
            <div class="tab-pane fade" id="account-social-links">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">Twitter</label>
                  <input type="text" class="form-control" value="https://twitter.com/user">
                </div>
                <div class="form-group">
                  <label class="form-label">Facebook</label>
                  <input type="text" class="form-control" value="https://www.facebook.com/user">
                </div>
                <div class="form-group">
                  <label class="form-label">Google+</label>
                  <input type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label class="form-label">LinkedIn</label>
                  <input type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label class="form-label">Instagram</label>
                  <input type="text" class="form-control" value="https://www.instagram.com/user">
                </div>

              </div>
            </div>
            <div class="tab-pane fade" id="account-connections">
              <div class="card-body">
                <h5>TẠO DỰ ÁN TỪ THIỆN CỦA BẠN</h5>
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                   <form action="{{URL::to('create-project')}}" method="POST" id="form-create" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="slug">Tên dự án (<span class="required">*</span>):</label>
                    <input type="text" name="name_project" onkeyup="ChangeToSlug()" class="form-control" id="slug" value="{{old('name_project')}}" placeholder="Name of project">
                  </div>
                  <div class="form-group">
                    <label for="convert_slug">Slug dự án (<span class="required">*</span>):</label>
                    <input type="text" name="slug" value="{{old('slug')}}" class="form-control" id="convert_slug" placeholder="Slug">
                  </div>
                  <div class="form-group ">
                    <label for="id_category">Danh mục (<span class="required">*</span>):</label>
                    <select class="custom-select" name="id_category" required="true">
                      <?php $categories = Session::get('categories')?>
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name_category}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                            <label for="exampleInputEmail1">Ngày diễn ra chương trình (<span class="required">*</span>):</label>
                              <input type="date" id="date_action" class="form-control"  name="date_action" value="{{old('date_action')}}"  aria-describedby="emailHelp">
                  </div>
                  <div id="donation" class="hidden">
                  <div class="row" >
                    <div class="form-group col-md-12 col-sm-12">
                            <label for="donate_for">Ủng hộ cho:(<span class="required">*</span>)</label>
                            <input type="text" id="donate_for" class="form-control"  name="donate_for" value="{{old('donate_for')}}" required  placeholder="Tên tổ chức, người được thụ hưởng">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                            <label for="target">Mục tiêu ủng hộ:(<span class="required">*</span>)</label>
                            <input type="text" id="target" class="form-control money"  name="target" value="{{old('target')}}" required aria-describedby="emailHelp" placeholder="VNĐ">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                            <label for="phone">SĐT đơn vị được ủng hộ:(<span class="required">*</span>)</label>
                            <input type="tel" id="phone" class="form-control"  name="phone" value="{{old('phone')}}" required pattern="(09|03|07|08|05)+([0-9]{8})"  placeholder="Số điện thoại">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                            <label for="link">Liên kết:</label>
                            <input type="text" id="link" class="form-control"  name="link" value="{{old('link')}}"  placeholder="facebook.com/username">
                    </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="short_desc">Mô tả sơ lượt:(<span class="required">*</span>)</label>
                    <textarea class="form-control" id="short_desc" name="short_desc" rows="3" >{{old('short_desc')}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="editor">Mô tả (<span class="required">*</span>):</label>
                    <textarea class="form-control" id="editor" name="description" rows="5" resize="none">{{old('description')}}</textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <label >Thumbnail (<span class="required">*</span>):</label>
                    <div><label for="thumbnail" class="thumbnail-btn"><i class="fas fa-upload"></i> Tải ảnh lên</label></div>
                    <input type="file" onchange="chooseFile(this)" id="thumbnail" name="thumbnail" class="form-control d-none" >
                    <img src="{{asset("img/default.png")}}" width="auto" height="300px" id="image">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a id="submit" class="btn btn-primary text-light" data-toggle="modal" data-target="#exampleModal">Submit</a>
                </div>
              </form>
              </div>
              <hr class="border-light m-0">
              <div class="card-body">

              </div>
            </div>
            <div class="tab-pane fade" id="account-notifications">
              <div class="card-body pb-2">

                <h6 class="mb-4">Activity</h6>

                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when someone comments on my article</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when someone answers on my forum thread</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when someone follows me</span>
                  </label>
                </div>
              </div>
              <hr class="border-light m-0">
              <div class="card-body pb-2">

                <h6 class="mb-4">Application</h6>

                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">News and announcements</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Weekly product updates</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Weekly blog digest</span>
                  </label>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
       <div class="text-right mb-3 mr-4">
      <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
      <button type="button" class="btn btn-default">Cancel</button>
    </div>
    </div>
  </div>
  <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <h6>Xác nhận thông tin nhà hảo tâm:</h6>
                  <form name="photo" id="imageUploadForm" enctype="multipart/form-data" action="{{URL::to('confirm-user')}}" method="post">
                  @csrf
                    <div class="form-group col-md-12">
                    <label >CMND/CCCD (<span class="required">*</span>):</label>
                    <div><label for="image_checked" class="thumbnail-btn btn btn-primary"><i class="fas fa-upload"></i> Tải ảnh lên</label></div>
                    <input type="file" onchange="chooseFile1(this)" id="image_checked" name="cccd" class="form-control d-none" required="" >
                    <img class="mt-2" src="" width="auto" height="200px" id="image2">
                    <hr class="border-light m-0">
                    <button id="confirm" class="mt-4 btn btn-outline-warning" name="check" >Kiểm tra</button>
                    </div>
                  </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$('#imageUploadForm').on('submit',function(e){
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
    type:"POST",
    url:$(this).attr('action'),
    data:formData,
    cache:false,
    contentType: false,
    processData: false,
    success:function(data){
      if(data.status==200){
        $('#form-create').trigger("submit");

      }else{
        Swal.fire({
              icon: 'warning',
              title: 'Tạo dự án không thành công',
              text: 'Xác nhận người dùng không thành công!'
            });
      }
    },
    error: function(data){
      // Swal.fire({
      //         icon: 'error',
      //         title: 'Tạo dự án không thành công',
      //         text: 'Xác nhận người dùng không thành công!'
      //       });
      console.log(data);
    }
  });
});
</script>
 @if ($errors->any())
    <script type="text/javascript">
           Swal.fire({
              icon: 'error',
              title: 'Tạo dự án không thành công',
              text: 'Bạn đã nhập thiếu trường hoặc sai định dạng'
            });
 </script>
@endif
 @if(session('status'))
        <script type="text/javascript">
            Swal.fire(
              'Tạo dự án thành công',
              'Dự án sẽ được duyệt sau vài ngày!',
              'success'
            );
 </script>
@endif
@endsection
