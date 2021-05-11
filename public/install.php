<?php

include_once '../vendor/autoload.php';
include_once '../config.php';

$db = new \Core\Db();
$db->truncate('user')->exec();
$db->truncate('city')->exec();
$db->truncate('map_field')->exec();
echo "Tables truncated <br>";

$generator = new \Service\Map\Generator();
$generator->execute();
echo "Map Generated <br>";

$user = new \Model\User();
$user->setUserName('Arnoldas');
$user->setEmail('nikaflash@gmail.com');
$user->setPassword('admin123');
$user->save();
echo "User Created <br>";

$assign = new \Service\Map\Field\AssignField();
$mapField = $assign->createAndAssignField($user->getId());
echo "Field Assighned <br>";

$city = new Model\City();
$city->setName('City of '.$user->getUserName());
$city->setMapFieldId($mapField->getId());
$city->save();
echo "City created <br>";

echo 'Insta completed!';
