<?php

/* @var $this yii\web\View */

use \yii\bootstrap\Html;

$this->title = 'Структура сайта';

?>
<div class="site-index">
    <table class="table table-striped">
        <tr>
            <th style="width: 30px">#</th>
            <th>Наименование</th>
            <th>SEO - заголовок</th>
            <th>Url</th>
            <th style="width: 200px;"></th>
        </tr>
        <?php foreach ($structure_items as $item) :?>
            <tr>
                <td>
                    <?=$item->id?>
                </td>
                <td>
                    <?=$item->name?>
                </td>
                <td>
                    <?=$item->title?>
                </td>
                <td>

                </td>
                <td>
                    <?=Html::a('Изменить', ['structure/edit', 'item_id' => $item->id])?>
                    <?=Html::a('Удалить', ['structure/delete', 'item_id' => $item->id], ['onclick' => 'confirm("Удалить раздел?")'])?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
