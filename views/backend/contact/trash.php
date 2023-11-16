<?php

use App\Models\Contact;

$list = Contact::all();
$list = Contact::where('status','=','0')->orderBy('created_at','DESC')->get();
?>
<?php require_once('../views/backend/header.php'); ?>
<div class="content-wrapper">
    <!-- Content Header: Page header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="d-inline">Thùng rác liên hệ</h1>
                </div>

            </div>
        </div><!--.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
        <div class="card-header">
         <div class="row">
            <div class="col-md-6">

            </div>
                <div class="col-md-6  text-right">
                <a class="btn btn-sm btn-info" href="index.php?option=contact">
                <i class="fas fa-arrow-left"></i> Quay về liên hệ
              </a>
            </div>
         </div>
          </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                            <th class="text-center" style="width:200px">Họ tên</th>
                            <th class="text-center" style="width:150px">Email</th>
                            <th class="text-center" style="width:150px">Số điện thoại</th>
                            <th class="text-center" style="width:160px">Ngày tạo</th>
                            <th class="text-center" style="width:200px">Chức năng</th>
                            <th class="text-center" style="width:20px">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $row) : ?>
                            <tr>
                                <td class="text-center"><input type="checkbox"></td>
                                <td><?= $row['name'] ?></td>
                                <td class="text-center"><?= $row['email'] ?></td>
                                <td class="text-center"><?= $row['phone'] ?></td>
                                <td class="text-center"><?= $row['created_at'] ?></td>
                                <td class="text-center">

                                    <a href="index.php?option=contact&cat=restore&id=<?=$item->id; ?>" class="btn btn-info btn-xs">
                                       <i class="fas fa-undo"></i> Khôi Phục</a>
                                       <a href="index.php?option=contact&cat=destroy&id=<?=$item->id; ?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i> Xóa VV</a> 
                        
                                </td>
                                <td class="text-center"><?= $row['id'] ?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  }
  );
</script>
<?php require_once('../views/backend/footer.php'); ?>