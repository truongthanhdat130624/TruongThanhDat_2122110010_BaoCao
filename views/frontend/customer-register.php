<?php
use App\Libraries\MyClass;
use App\Models\user;

if (isset($_POST['THEM'])) {
   $user = new user();
   //lấy từ form
   $user->name = $_POST['name'];
   $user->phone = $_POST['phone'];
   $user->email = $_POST['email'];
   $user->username = $_POST['username'];
   $user->password = sha1($_POST['password']);
   $user->address = $_POST['address'];
   $user->gender = $_POST['gender'];
   $user->status = $_POST['status'];
   $user->roles = $_POST['roles'];

   //tư sinh ra
   $user->created_at = date('Y-m-d H:i:s');
   $user->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
   var_dump($user);
   //luu vao csdl
   $user->save();
   header('location:index.php?option=customer&login=true');
}
?>
<?php require_once "views/frontend/header.php" ?>
<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item">
               <a class="text-main" href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
               Đăng ký tài khoản
            </li>
         </ol>
      </nav>
   </div>
</section>
<section class="ttd-maincontent py-2">
   <form action="index.php?option=customer&register=true" method="post" name="registercustomer">
      <div class="container">
         <h1 class="fs-2 text-main text-center">ĐĂNG KÝ TÀI KHOẢN</h1>
         <div class="row">
            <div class="col-md-6">
               <div class="mb-3">
                  <label for="name" class="text-main">Họ tên(*)</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="nhập họ tên" required>
               </div>
               <div class="mb-3">
                  <label for="phone" class="text-main">Điện thoại(*)</label>
                  <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập điện thoại" required>
               </div>
               <div class="mb-3 text-main">
                  <label for="address">Địa chỉ(*)</label>
                  <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ">
               </div>
               <div class="mb-3 text-main">
                  <label>Giới tính(*)</label>
                  <select name="gender" class="form-control">
                     <option value="1"> Nam</option>
                     <option value="2"> Nữ</option>
                  </select>
               </div>
               <div class="mb-3 text-main">
                  <label>Vai Trò(*)</label>
                  <select name="roles" class="form-control">
                     <option value="2"> User</option>
                  </select>
               </div>
            </div>
            <div class="col-md-6">
               <div class="mb-3">
                  <label for="username" class="text-main">Tên tài khoản(*)</label>
                  <input type="text" name="username" id="username" class="form-control" 
                  placeholder="Nhập tài khoản đăng nhập" required>
               </div>
               <div class="mb-3">
                  <label for="email" class="text-main">Email(*)</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required>
               </div>
               <div class="mb-3">
                  <label for="password" class="text-main">Mật khẩu(*)</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" required>
               </div>
               <div class="mb-3">
                  <label for="password_re" class="text-main">Xác nhận Mật khẩu(*)</label>
                  <input type="password" name="password_re" id="password_re" class="form-control" 
                  placeholder="Xác nhận mật khẩu" required>
               </div>
               <div class="mb-3 text-main">
                  <label>Trạng thái(*)</label>
                  <select name="status" class="form-control">
                     <option value="1">Xuất bản</option>
                     <option value="2">Chưa xuất bản</option>
                  </select>
               </div>
               <div class="mb-3">
                  <button class="btn btn-main" name="THEM">Đăng ký</button>
               </div>
            </div>
         </div>
      </div>
   </form>
</section>
<?php require_once "views/frontend/footer.php" ?>