<?php
$db =include __DIR__ . '/../model/database/start.php';
include __DIR__ . '/../model/User.php';
use App\Model\User;

$newUser = new User($db);
$user = $newUser->showProfile ('users',$_POST['email']);

require_once __DIR__ . '/../view/profile.php';