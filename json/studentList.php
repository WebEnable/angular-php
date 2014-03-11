<?php
include_once '../config/functions.php';
$Wall = new WallUpdates();
$studentList=$Wall->studentListJson();
?>