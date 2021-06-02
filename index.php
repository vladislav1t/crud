<?php
include 'functions.php';
include 'RepositoryItems.php';
$db = new Database();

$repository = new RepositoryItems($db);

function prepareViewData($path, $data = array())
{
    ob_start();
    extract($data);
    include 'views/' . $path . '.php';
    $content = ob_get_clean();

    return array_merge(compact('content'), $data);
}

$data = prepareViewData('index/index', [
    'items' => $repository->listing(),
]);
extract($data);

include 'views/layout/index.php';




