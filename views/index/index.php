<?php
/**
 * @var array $items
 * @var array $item
 */
?>

<table class="table table-striped projects">
    <thead>
    <tr>
        <th style="width: 1%">Id</th>
        <th style="width: 79%">Название товара</th>
        <th style="width: 20%">Действие</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?php echo $item['id'] ?></td>
            <td><a><?php echo $item['name'] ?></a></td>
            <td>
                <a href="card.php?id=<?php echo $item['id'] ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>
                    Редактировать </a>
                <a href="delete.php?id=<?php echo $item['id'] ?>" class="btn btn-danger btn-xs"><i
                            class="fa fa-trash-o"></i> Удалить </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
