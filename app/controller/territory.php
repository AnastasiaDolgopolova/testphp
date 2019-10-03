<?php
$db =include __DIR__ . '/../model/database/start.php';
include __DIR__ . '/../model/Area.php';
use App\Model\Area;
$newTerritory = new Area($db);
$regions = $newTerritory -> get_territory('t_koatuu_tree',0);
//var_dump($regions);die;

$cityes = $newTerritory -> get_cityes('t_koatuu_tree','01');
//var_dump($cityes);die;

$countryes = $newTerritory -> get_countryes('t_koatuu_tree','0111700000');
//var_dump($countryes);die;
include __DIR__ . '/../view/home.php';