<?php
use App\Models\Contact;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$contact=Contact:: find($id);

if($contact == null){
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Mẫu tin không có']);
            header('location: index.php?option=contact');
}

$contact->delete();
MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
header('location: index.php?option=contact&cat=trash');

