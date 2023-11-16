<?php

use App\Models\banner;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$banner = banner::find($id);
if ($banner == null) {
  MyClass::set_flash('message', ['msg' => 'Lỗi trang', 'type' => 'denger']);
  header("location:index.php?option=banner");
}
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=banner&cat=process" method="post" enctype="multipart/form-data">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="d-inline">Cập nhật banner</h1>
          </div>
        </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-12 text-right">
              <a href="index.php?option=banner" class="btn btn-sm btn-info">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Về banner
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
            <input type="hidden" name="id" value="<?= $banner->id; ?>">
            <div class="col md-9">
              <div class="mb-3">
                <label>Tên Banner</label>
                <input name="name" type="text" value="<?= $banner->name; ?>" class="form-control">
              </div>
              <div class="mb-3">
                <label>Liên kết</label>
                <textarea name="link" class="form-control"><?= $banner->link; ?></textarea>
              </div>
              <div class="col mb-3">
                <label>Sắp xếp</label>
                <select name="sort_order" class="form-control">
                  <option value="1">Chọn vị trí</option>
                </select>
              </div>
            </div>
            <div class="col md-5">
              <div class="mb-3">
                <label>Hình ảnh</label>
                <input type="file" name="image" class="form-control">
                <img src="../public/images/banner/<?= $banner->image; ?>">
              </div>
              <div class="mb-3">
                <label>Vị trí</label>
                <select name="position" class="form-control">
                  <option value="slidershow1">slider show 1</option>
                  <option value="slidershow2">slider show 2</option>
                  <option value="slidershow3">slider show 3</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="status">Trạng thái</label>
                <select name="status" id="status" class="form-control">
                  <option value="1" <?= ($banner->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                  <option value="2" <?= ($banner->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
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
<?php require_once "../views/backend/footer.php"; ?>