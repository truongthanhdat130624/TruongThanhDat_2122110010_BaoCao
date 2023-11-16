<?php
use App\Models\User;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$user=User:: find($id);

if($user == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'denger']);
    header('location: index.php?option=user');
}
$user->delete();
MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']); 
header('location: index.php?option=customer&cat=trash');

