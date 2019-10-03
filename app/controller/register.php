<?php
$db =include __DIR__ . '/../model/database/start.php';
include __DIR__ . '/../model/Register.php';
use App\Model\Register;

$newRegister = new Register($db);
$addPost=$newRegister->add('posts',$_POST);
echo "ok";