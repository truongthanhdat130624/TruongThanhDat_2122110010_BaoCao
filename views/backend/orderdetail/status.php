<?php

use App\Libraries\MyClass;
use App\Models\Orderdetail;

$id = $_REQUEST['id'];
$order=Orderdetail::find($id);
if ($order == NULL) {
    MyClass::set_flash('message',['type'=>'danger','msg'=>'Mẫu tin không có']);
    header("location:index.php?option=orderdetail");
}
$order->status = ($order->status == 1) ? 2 : 1;
$order->updated_at = date('Y-m-d H:i:s');
$order->updated_by = (isset($_SESSION['order_id'])) ? $_SESSION['order_id'] : 1;
$order->save();
MyClass::set_flash('message',['msg'=>'Thay đổi trạng thái thành công','type'=>'success']);
header("location:index.php?option=orderdetail");