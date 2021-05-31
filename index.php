<?php
include 'functions.php';
$db = new Database();

function prepareViewData($path, $data = array())
{
    $content = '';
    ob_start();
    extract($data);
    include 'views/' . $path . '.php';
    $content = ob_get_clean();

    return array_merge(compact('content'), $data);
}

$data = prepareViewData('index/index', [
    'items' => $db->listing(),
]);
extract($data);

include 'views/layout/index.php';




