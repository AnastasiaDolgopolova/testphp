<?php
$db =include __DIR__ . '/../model/database/start.php';
include __DIR__ . '/../model/Area.php';
use App\Model\Area;

$newTerritory = new Area($db);
$regions = $newTerritory -> get_territory('t_koatuu_tree',0);

if ($_POST['selectedRegion']) {
    $cityes = $newTerritory->get_cityes('t_koatuu_tree', $_POST['selectedRegion']);
    echo json_encode($cityes);
    return;
}

if ($_POST['selectedCity']) {
    $areas = $newTerritory->get_countryes('t_koatuu_tree', $_POST['selectedCity']);
    echo json_encode($areas);
    return;
}

include __DIR__ . '/../view/home.php';