<?php

use App\Models\contact;
use App\Libraries\MyClass;

if(isset($_POST['THEM']))
{
    $contact=new contact();
    //lấy từ form
    $contact->name = $_POST['name'];
    $contact->email = $_POST['email'];
    $contact->phone = $_POST['phone'];
    $contact->status = $_POST['status'];
    $contact->content  = $_POST['content'];
    $contact->title  = $_POST['title'];
    $contact->replay_id  = $_POST['replay_id'];

    $contact->save();
    //Xử lí uploadfile
    //tư sinh ra
    $contact->created_at = date('Y-m-d H:i:s');
    var_dump($contact);
    //luu vao csdl
    //
    $contact->save();
    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    //
    header("location:index.php?option=contact");
}
    
if(isset($_POST['CAPNHAT']))
{
    $id= $_POST['id'];
    $contact=contact::find($id);
    if($contact == null){
        MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'denger']);
        header("location:index.php?option=contact");
    }
    //lấy từ form
    $contact->name = $_POST['name'];
    $contact->email = $_POST['email'];
    $contact->phone = $_POST['phone'];
    $contact->status = $_POST['status'];
    $contact->content  = $_POST['content '];
    $contact->title  = $_POST['title '];
    $contact->replay_id  = $_POST['replay_id '];

    
    //tư sinh ra
    $contact->updated_at = date('Y-m-d H:i:s');
    $contact->updated_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($contact);
    //luu vao csdl
    //
    $contact->save();
    //
    MyClass::set_flash('message',['msg'=>'Cập nhật thành công','type'=>'success']);
    header("location:index.php?option=contact");
}





