<?php
$db =include __DIR__ . '/../model/database/start.php';
include __DIR__ . '/../model/User.php';
use App\Model\User;

$newUser = new User($db);
$users = $newUser->getAll('users');

require_once __DIR__ . '/../view/allusers.php';