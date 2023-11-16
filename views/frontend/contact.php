<?php


use App\Models\contact;
use App\Libraries\MyClass;

if(isset($_POST['GUI']))
{
    $contact=new contact();
    //lấy từ form
    $contact->name = $_POST['name'];
    $contact->email = $_POST['email'];
    $contact->phone = $_POST['phone'];
    $contact->content  = $_POST['content'];
    $contact->title  = $_POST['title'];
    $contact->status = 2;
    $contact->save();
    $contact->created_at = date('Y-m-d H:i:s');
    var_dump($contact);
    //luu vao csdl
    $contact->save();
    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
 
    header("location:index.php?option=contact");
}
?>
 <?php require_once "views/frontend/header.php"; ?>


   <section class="bg-light">
      <div class="container">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
               <li class="breadcrumb-item">
                  <a class="text-main" href="index.php">Trang chủ</a>
               </li>
               <form name=""form1 action="" method="post" >
               <li class="breadcrumb-item active" aria-current="page">
                  Liên hệ
               </li>
            </ol>
         </nav>
      </div>
   </section>
   <section class="ttd-maincontent py-2">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.9888748291637!2d106.7697991748186!3d10.812162858534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317526f5dee8d527%3A0x8f419b553ea5591a!2zMTQ3IMSQxrDhu51uZyBT4buRIDEyLCBQaMaw4bubYyBCw6xuaCwgUXXhuq1uIDksIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1699805268548!5m2!1svi!2s" 
               width="600" height="450" style="border:0;" 
               allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
               <div class="mb-3">
                  <label for="name" class="text-main">Họ tên</label>
                  <input type="text" name="name" required id="name" class="form-control" placeholder="Nhập họ tên">
               </div>
               <div class="mb-3">
                  <label for="phone" class="text-main">Điện thoại</label>
                  <input type="text" name="phone" required id="phone" class="form-control" placeholder="Nhập điện thoại">
               </div>
               <div class="mb-3">
                  <label for="email" class="text-main">Email</label>
                  <input type="text" name="email" required id="email" class="form-control" placeholder="Nhập email">
               </div>
               <div class="mb-3">
                  <label for="title" class="text-main">Tiêu đề</label>
                  <input type="text" name="title" required id="title" class="form-control" placeholder="Nhập tiêu đề">
               </div>
               <div class="mb-3">
                  <label for="content" class="text-main">Nội dung</label>
                  <textarea name="content" required id="content" class="form-control"
                     placeholder="Nhập nội dung liên hệ"></textarea>
               </div>
               <div class="mb-3">
                  <button name="GUI" type="submit" class="btn btn-main">Gửi liên hệ</button>
               </div>
               </form>
            </div>
         </div>
      </div>
   </section>
   <?php require_once "views/frontend/footer.php"; ?>