<?php
use App\Models\Category;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$category=Category:: find($id);

if($category == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'denger']);
    header('location: index.php?option=category');
}
$category->delete();
MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
header('location: index.php?option=category&cat=trash');

