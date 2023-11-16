<?php

use App\Models\Menu;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$menu = Menu::find($id);
if ($menu == null) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không có']);
    header("location:index.php?option=menu&cat=trash");
}
$menu->delete();
MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
header("location: index.php?option=menu&cat=trash");
