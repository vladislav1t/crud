<?php
require 'functions.php';
$db = new Database();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="content">
    <div class="container">

        <div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <?php
                    $item = $db->singleView($_GET['id']);
                    ?>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Создать товар</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form class="create_item" action="update.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $item['id'] ?>">

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Название</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="name" id="Title"
                                               value="<?php echo $item['name'] ?>">
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Описнаие<span
                                                class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea name="description"
                                                  id="desc"><?php echo $item['description'] ?></textarea>
                                    </div>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">

                                            <input type="submit" value="Обновить" class="btn btn-primary" name="create" id="create">
                                            <a class="btn btn-success" href="/">
                                                Назад
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY="
        crossorigin="anonymous"></script>
<script src="/scripts.js"></script>
</body>
</html>
