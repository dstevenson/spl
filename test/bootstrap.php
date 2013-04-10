<?php

$autoload_path =  __DIR__ . "/../../../autoload.php";
require_once($autoload_path);

$loader =   ComposerAutoloaderInit::getLoader();
$loader->add('CentralDesktop\Spl\Test', __DIR__);
$loader->add('CentralDesktop\Spl', __DIR__ . "/../src");