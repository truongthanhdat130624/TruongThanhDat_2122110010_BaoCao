<?php

use App\Models\User;

$id = $_REQUEST['id'];
$user = User::find($id);
$list = User::where('status', '!=', '0')->get();

?>
<?php require_once '../views/backend/header.php'; ?>
<form action="index.php?option=user&cat=process" method="post" enctype="multipart/form-data">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="d-inline">Cập nhật thành viên</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col md-12 text-right">
            <a href="index.php?option=user" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                  <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Lưu
                  </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <input type="hidden" name="id" value="<?= $user->id; ?>">
            <div class="col md-9">
              <div class="mb-3">
                <label for="name">Tên người dùng</label>
                <input name="name" id="name" type="text" value="<?= $user->name; ?>" class="form-control" 
                 placeholder="Nhập tên người dùng">
              </div>
              <div class="mb-3">
                <label for="email">Email</label>
                <input name="email" id="email" class="form-control" value="<?= $user->email; ?>"
                 placeholder="Nhập email"></input>
              </div>
              <div class="mb-3">
                <label for="phone">Số điện thoại</label>
                <input name="phone" id="phone" class="form-control" value="<?= $user->phone; ?>" 
                placeholder="Nhập số điện thoại"></input>
              </div>

              <div class="mb-3">
                <label>Địa Chỉ</label>
                <input type="address" name="address" value="<?= $user->address; ?>" class="form-control">
              </div>
              <div class="mb-3">
                <label>Giới tính</label>
                <select name="gender" class="form-control">
                  <option value="1" <?= ($user->gender == 1) ? 'selected' : ''; ?>>nam</option>
                  <option value="2" <?= ($user->gender == 2) ? 'selected' : ''; ?>>nữ</option>
                </select>
              </div>
            </div>
          </div>
          <div class="md-3">
              <div class="mb-3">
                        <label>Tên đăng nhập</label>
                        <input type="text" value="<?= $user->username; ?>" name="username" id="username" 
                        placettder="Nhập địa chỉ" class="form-control" onkeydown="handle_slug(this.value);">
                     </div>
                     <div class="mb-3">
                        <label>mật khẩu</label>
                        <input type="password" value="<?= $user->password; ?>" name="password" id="password" 
                        placettder="Nhập địa chỉ" class="form-control" onkeydown="handle_slug(this.value);">
                     </div>
                     <div class="mb-3">
                        <label>nhập lại mật khẩu</label>
                        <input type="password" value="<?= $user->password; ?>" name="password" id="password" 
                        placettder="Nhập địa chỉ" class="form-control" onkeydown="handle_slug(this.value);">
                     </div>
            <div class="mb-3">
              <label for="image">Hình ảnh</label>
              <input type="file" name="image" class="form-control">
              <div class="mb-3">
                <label>Vai Trò</label>
                <select name="roles" class="form-control">
                  <option value="1" <?= ($user->roles == 1) ? 'selected' : ''; ?>>1</option>
                  <option value="2" <?= ($user->roles == 2) ? 'selected' : ''; ?>>2</option>
                </select>
              </div>
            </div>
            <div class="mb-3">
              <label for="status">Trạng thái</label>
              <select name="status" id="status" class="form-control">
                <option value="1" <?= ($user->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                <option value="2" <?= ($user->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
      </div>
  </div>
  </section>
  </div>
</form>