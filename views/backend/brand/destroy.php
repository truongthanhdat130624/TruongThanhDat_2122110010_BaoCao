<?php
use App\Models\Brand;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$brand=Brand:: find($id);

if($brand == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'denger']);
     header('location: index.php?option=brand');
}
$brand->delete();
MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
header('location: index.php?option=brand&cat=trash');

