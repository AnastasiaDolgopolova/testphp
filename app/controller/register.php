<?php
$db =include __DIR__ . '/../model/database/start.php';
include __DIR__ . '/../model/Register.php';
use App\Model\Register;

$data = [ 
	'name' => trim($_POST['name']),
	'email' => trim($_POST['email']),
	'territory' => trim($_POST['territory'])
];

$newRegister = new Register($db);
$newRegister->add('users', [ 
	'name' => $data['name'],
	'email' => $data['email'],
	'territory' => $data['territory']
]);

echo "ok";