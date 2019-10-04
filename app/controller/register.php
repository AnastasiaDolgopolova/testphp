<?php
$db =include __DIR__ . '/../model/database/start.php';
include __DIR__ . '/../model/Register.php';

use App\Model\Register;
if (count($_POST)>0) {
    $user =$newRegister-> checkUser('users',trim($_POST['email']));
    //var_dump($user);die;
}
if($user){
	require_once __DIR__ . '/../view/profile.php';
}

$regUser=$newRegister->add('users', [ 
	'name' => trim($_POST['name']),
	'email' => trim($_POST['email']),
	'territory' => trim($_POST['territory']
]);

echo "ok";
