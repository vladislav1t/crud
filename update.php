<?php
require 'functions.php';
$db = new Database();

$qu = $db->update($_POST['name'], $_POST['description'], $_POST['id']);

header('Location: /');