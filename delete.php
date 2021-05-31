<?php
require 'functions.php';
$db = new Database();

$db->delete($_GET['id']);

header('Location: /');