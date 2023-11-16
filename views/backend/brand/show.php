<?php

use App\Libraries\MyClass;

use App\Models\Brand;

$id = $_REQUEST['id'];
$brand = Brand::find($id);
if ($brand == NULL) {
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'denger']);
    header("location:index.php?option=brand");
}
?>
<?php require_once('../views/backend/header.php'); ?>
<<div class="content-wrapper">
    <!-- Content Header: Page header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="d-inline">Chi tiết thương hiệu</h1>
                </div>

            </div>
        </div>
        <!--container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12 text-right">
                    <a href="index.php?option=brand" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về thương hiệu
                  </a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <th>Tên trường</th>
                        <th>Giá trị</th>
                    </tr>
                    <tr>
                        <td> id</td>
                        <td>
                            <?= $brand->id; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Tên thương hiệu</td>
                        <td>
                            <?= $brand->name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Slug </td>
                        <td>
                            <?= $brand->slug; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> description </td>
                        <td>
                            <?= $brand->description; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> sort_order	</td>
                        <td>
                            <?= $brand->sort_order	; ?>
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <td>image</td>
                        <td><img class="img-fluid" src="../public/images/brand/<?= $brand->image; ?>" 
                        alt="<?= $brand->image; ?>"></td>
                    </tr>

                    <tr>
                        <td> Ngày tạo </td>
                        <td>
                            <?= $brand->created_at; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Người tạo </td>
                        <td>
                            <?= $brand->created_by; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Người cập nhật </td>
                        <td>
                            <?= $brand->updated_by; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Ngày cập nhật </td>
                        <td>
                            <?= $brand->updated_at; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Trạng thái </td>
                        <td>
                            <?= $brand->status; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </section>
    </div>
    <?php require_once('../views/backend/footer.php'); ?>