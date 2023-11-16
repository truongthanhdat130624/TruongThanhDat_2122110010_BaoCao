<?php
use App\Models\Banner;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$banner =  Banner::find($id);
if($banner==null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'denger']);
    header("location:index.php?option=banner");
}

$list = banner::where('status','=',0)->orderBy('Created_at','DESC')->get();
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                  <h1 class="d-inline">Chi tiết banner</h1>
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
                    <a href="index.php?option=banner" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Về banner
                     </a>
                    </div>
                </div>
            </div>
               <div class="card-body">
                  <table class="table table-bordered" >
                     <thead>
                        <tr>

                           <th>Tên trường</th>
                           <th>Giá trị</th>
                        </tr>
                     </thead>
                     <tbody>
                        
                     <tr>
                     <td>ID</td>
                         <td><?= $banner->id;?></td>
                     </tr>
                     <tr>
                     <td>name</td>
                         <td><?= $banner->name;?></td>
                     </tr>
                     <tr>
                     <td>link</td>
                         <td><?= $banner->link;?></td>
                     </tr>
                     <tr>
                     <td>sort_order</td>
                         <td><?= $banner->sort_order;?></td>
                     </tr>
                     <tr>
                     <td>position</td>
                         <td><?= $banner->position;?></td>
                     </tr>
                 
                     <tr>
                     <td>updated_at</td>
                         <td><?= $banner->updated_at;?></td>
                     </tr>
                     <tr>
                     <td>updated_by</td>
                         <td><?= $banner->updated_by;?></td>
                     </tr>
                     <tr>
                     <td>status</td>
                         <td><?= $banner->status;?></td>
                     </tr>

                     <tr>
                     <td>created_at</td>
                         <td><?= $banner->created_at;?></td>
                     </tr>
                     <tr>
                     <td>created_by</td>
                         <td><?= $banner->created_by;?></td>
                     </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>