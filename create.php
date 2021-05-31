<?php
require 'functions.php';
$db = new Database();

$db->create($_POST['name'], $_POST['description']);

header('Location: /');
