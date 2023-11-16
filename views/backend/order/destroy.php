<?php
use App\Models\Order;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$order=Order:: find($id);

if($order == null){
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Mẫu tin không có']);
    header('location: index.php?option=order');
}
$order->delete();
MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
header('location: index.php?option=order&cat=trash');

