<?php
require_once "models/gestorSlide.php";
require_once "models/gestorProducciones.php";
require_once "models/gestorInfo.php";

require_once "controllers/gestorInfo.php";
require_once "controllers/gestorProducciones.php";
require_once "controllers/gestorSlide.php";
require_once "controllers/template.php";

$template = new TemplateController();
$template ->template();