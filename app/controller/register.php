<?php
$db =include __DIR__ . '/../model/database/start.php';

$data = [ 
	'name' => clean($_POST['name']),
	'email' => clean($_POST['email']),
	'territory' => clean($_POST['territory']),
];
var_dump($data);die;
$db->create('users', [ 
	'name' => ($_POST['name']),
	'email' => clean($_POST['email']),
	'territory' => clean($_POST['territory']),
];);
	header('Location: /');
	}