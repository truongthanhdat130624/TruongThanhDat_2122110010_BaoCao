<?php

use App\Models\Banner;

$list = banner::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<form action="index.php?option=banner&cat=process" method="post" enctype="multipart/form-data">

   <!-- CONTENT -->
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả banner</h1>
                  <a href="index.php?option=banner&cat=create" class="btn btn-sm btn-primary">Thêm banner</a>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header">
               <div class="row">
                  <div class="col-md-6">
                     <a href="index.php?option=banner">Tất cả</a> |
                     <a href="index.php?option=banner&cat=trash"> Thùng rác</a>
                  </div>
                  <div class="col-md-6 text-right">

                  </div>
               </div>
            </div>
            <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>

               <table class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                        <th class="text-center">Tên Banner</th>
                        <th class="text-center">Tên liên kết</th>
                        <th class="text-center" style="width:170px">Chức năng</th>
                        <th class="text-center" style="width:30px">ID</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (count($list) > 0) : ?>
                        <?php foreach ($list as $item) : ?>
                           <tr>
                              <td class="text-center">
                                 <input type="checkbox" />
                              </td>
                              <td class="text-center">
                                 <img src="../public/images/banner/<?= $item->image; ?>" class="img-fluid" alt="<?= $item->image; ?>">
                              </td>
                              <td class="text-center">
                                 <?= $item->name; ?>
                              </td>
                              <td class="text-center"> <?= $item->link; ?></td>
                              <td class="text-center">
                                 <?php if ($item->status == 1) : ?>
                                    <a href="index.php?option=banner&cat=status&id=<?= $item->id; ?>" class="btn 
                                       btn-success btn-xs">
                                       <i class="fas fa-toggle-on"></i> Hiện
                                    </a>
                                 <?php else : ?>
                                    <a href="index.php?option=banner&cat=status&id=<?= $item->id; ?>" class="btn 
                                       btn-danger btn-xs">
                                       <i class="fas fa-toggle-off"></i> Ẩn
                                    </a>
                                 <?php endif; ?>
                                 <a href="index.php?option=banner&cat=edit&id=<?= $item->id; ?>" class="btn btn-primary btn-xs">
                                    <i class="fas fa-edit"></i> Chỉnh sửa

                                 </a>
                                 <a href="index.php?option=banner&cat=show&id=<?= $item->id; ?>" class="btn btn-info btn-xs">
                                    <i class="fas fa-eye"></i> Chi tiết
                                 </a>
                                 <a href="index.php?option=banner&cat=delete&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                    <i class="fas fa-trash"></i> Xoá
                                 </a>
                              </td>
                              <td class="text-center"><?= $item->id; ?></td>
                           </tr>
                        <?php endforeach; ?>
                     <?php endif; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>