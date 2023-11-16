<?php
use App\Models\Orderdetail;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$orderdetail = Orderdetail::find($id);
if($orderdetail==null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'denger']);
    header("location:index.php?option=orderdetaildetail");
}

$list = Orderdetail::where('status','=',0)->orderdetailBy('Created_at','DESC')->get();
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <form action ="index.php?option=orderdetail&cat=process" method="orderdetail" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                  <h1 class="d-inline">chi tiết đơn hàng</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12 text-right">
                    <a href="index.php?option=orderdetail" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                     </a>
                    </div>
                </div>
            </div>
               <div class="card-body p-2">
                  <table class="table table-borderdetailed">
                     <thead>
                        <tr>
                           
                           <th>Tên trường</th>
                           <th>Giá trị</th>
                        </tr>
                     </thead>
                     <tbody>
                     <tr>
                         <td>ID</td>
                         <td><?= $orderdetail->id;?></td>
                     </tr>
                     <tr>
                         <td>user_id</td>
                         <td><?= $orderdetail->order_id;?></td>
                     </tr>
                     <tr>
                         <td>deliveryaddress</td>
                         <td><?= $orderdetail->deliveryaddress;?></td>
                     </tr>
                     <tr>
                         <td>deliveryname</td>
                         <td><?= $orderdetail->deliveryname;?></td>
                     </tr>
                     <tr>
                         <td>deliveryphone</td>
                         <td><?= $orderdetail->deliveryphone;?></td>
                     </tr>
                   
                         <td>deliveryemail</td>
                         <td><?= $orderdetail->deliveryemail;?></td>
                     </tr>
                     <tr>
                         <td>note</td>
                         <td><?= $orderdetail->note;?></td>
                     </tr>
                   
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>