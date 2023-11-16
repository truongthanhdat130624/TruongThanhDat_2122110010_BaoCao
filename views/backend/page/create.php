<?php
use App\Models\Topic;

$list_topic = Topic::where('status','!=',0)->orderBy('Created_at','DESC')->get();

$topic_id_html ="";

foreach ($list_topic as $topic)
{
   $topic_id_html .="<option value ='$topic->id'>$topic->name</option>";
}
?>
<?php require_once "../views/backend/header.php";?>

      <!-- CONTENT -->
      <form action ="index.php?option=page&cat=process" method="post" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Thêm mới bài viết</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="content">
            <div class="card">
            <div class="card-header text-right">
                  <a href="index.php?option=page" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                  <button class="btn btn-sm btn-success" type ="submit"name="THEM">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Thêm bài viết
                  </button>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-9">
                        <div class="mb-3">
                           <label>Tiêu đề bài viết (*)</label>
                           <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" name="slug" id="slug" placeholder="Nhập slug" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Kiểu</label>
                          <textarea name="type" class="form-control"></textarea>
                         </div>
                        <div class="mb-3">
                           <label>Mô tả</label>
                          <textarea name="description" class="form-control"></textarea>
                         </div>
                        <div class="mb-3">
                           <label>Chi tiết (*)</label>
                           <textarea name="detail"  class="form-control"></textarea>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="mb-3">
                           <label>Chủ đề (*)</label>
                           <select name="topic_id" class="form-control">
                              <option value="0"></option>
                              
                              <?= $topic_id_html;?>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label>Hình đại diện</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1">Xuất bản</option>
                              <option value="2">Chưa xuất bản</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      </form>
      <?php require_once "../views/backend/footer.php";?>
