<?php
$db =include __DIR__ . '/../model/database/start.php';
include __DIR__ . '/../model/Register.php';

use App\Model\Register;
$newRegister= new Register($db);
if (count($_POST)>0) {
    $user =$newRegister->checkUser('users',trim($_POST['email']));
    //var_dump($user);die;

	if($user){
        echo json_encode(['status' => 'redirect', 'path' => '/profile?id='.$user['id']]);
	    die;
	} else {
        $regUser=$newRegister->add('users', [
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'territory' => trim($_POST['territory'])
        ]);

        echo json_encode(['status' => 'ok', 'data' => '']);
	}
}