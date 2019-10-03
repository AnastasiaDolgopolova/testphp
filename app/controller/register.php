<?php
$db =include __DIR__ . '/../model/database/start.php';
include __DIR__ . '/../model/Register.php';
use App\Model\Register;
//var_dump($_POST);die;
$newRegister = new Register($db);
$addPost=$newRegister->add('posts',$_POST);
echo "ok";