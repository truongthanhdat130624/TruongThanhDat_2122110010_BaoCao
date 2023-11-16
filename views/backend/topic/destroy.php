<?php
use App\Models\Topic;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$topic=Topic:: find($id);

if($topic == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'denger']);
    header('location: index.php?option=topic');
}
$topic->delete();
MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
header('location: index.php?option=topic&cat=trash');

