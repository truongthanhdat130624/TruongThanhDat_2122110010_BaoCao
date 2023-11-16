<?php
use App\Models\Category;
use App\Libraries\MyClass;

$list = category::where('status','!=',0)->orderBy('created_at','DESC')->get();
$parent_id_html ="";

foreach ($list as $cat)
{
   $parent_id_html .="<option value ='$cat->id'>$cat->name</option>";
}

$id = $_REQUEST['id'];
$category =  Category::find($id);
if($category==null){
   MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'denger']);
    header("location:index.php?option=category");
}

?>
<?php require_once '../views/backend/header.php';?>
<form action ="index.php?option=category&cat=process" method="post" enctype="multipart/form-data">
     <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                  <h1 class="d-inline">Cập nhật danh mục</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
            <div class="card-header text-right">
                  <button class="btn btn-sm btn-success" type="subumit"name ="CAPNHAT">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Lưu
                  </button>
                  <a href="index.php?option=category" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh mục
                  </a>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="mb-3">
                           <input type="hidden" name="id" value="<?=$category->id;?>" />
                           <label>Tên danh mục (*)</label>
                           <input type="text" value="<?=$category->name; ?>" name="name" id="name" placettder="Nhập tên danh mục" class="form-control"
                              onkeydown="handle_slug(this.value);">
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" value="<?=$category->slug; ?>" name="slug" id="slug" placettder="Nhập slug" class="form-control">
                        </div>
                        <div class="mb-3">
                        <label>Mô tả</label>
                          <textarea name="description" class="form-control"><?=$category->description; ?></textarea>
                        </div>
                        <div class="mb-3">
                           <label>Danh mục cha (*)</label>
                           <select name="parent_id" class="form-control">
                              <option value="">None</option>
                              <option value="1">Tên danh mục</option>
                              <?= $parent_id_html;?>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label>Hình đại diện</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                        <label>mã cấp cha</label>
                          <textarea name="parent_id" class="form-control"><?=$category->parent_id; ?></textarea>
                        </div>
                        <div class="mb-3">
                         <label >thứ tự</label>
                         <textarea name="sort_order" id="sort_order" class="form-control" ><?=$category->sort_order; ?></textarea>
                         </div>
                         <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1" <?=($category->status ==1 ) ? 'selected':''; ?> >Xuất bản</option>
                              <option value="2"<?=($category->status ==2 ) ? 'selected':''; ?>>Chưa xuất bản</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
      </form>
      <?php require_once '../views/backend/footer.php';?>
      
