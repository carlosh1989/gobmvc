<?php
require_once __DIR__ . '/vendor/autoload.php';

$data['uno'] = "asd";
$data['dos'] = "adasd";
$krumo = new Krumo;
$krumo->dump($arr);
echo "test";