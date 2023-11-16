<?php

use App\Models\banner;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$banner = banner::find($id);

if ($banner == null) {
    MyClass::set_flash('message', ['msg' => 'Lỗi trang', 'type' => 'denger']);
    header('location: index.php?option=banner');
}
$banner->delete();
MyClass::set_flash('message', ['msg' => 'Xóa thành công', 'type' => 'success']);
header('location: index.php?option=banner&cat=trash');
