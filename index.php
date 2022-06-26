<?php
session_start();
require_once "autoload.php";
require_once "config.php";


$core  = new Core;


$core->start();
