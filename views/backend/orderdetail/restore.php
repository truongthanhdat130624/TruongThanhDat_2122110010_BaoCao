<?php

use App\Models\orderdetail;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$order = orderdetail::find($id);

if ($order == null) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không có']);
    header('location: index.php?option=orderdetail'); 
}

$order->status = 2;
$order->updated_at = date('Y-m-d H:i:s');
$order->updated_by = 1;
$order->save();
MyClass::set_flash('message',['msg'=>'Khôi phục thành công','type'=>'success']);
header('location: index.php?option=orderdetail');

