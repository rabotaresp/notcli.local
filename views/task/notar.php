<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Users */

use app\models\Files;
use app\models\Tasks;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;


$this->title = 'Table tasks clients for';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <h1><?= Html::encode($this->title).' '. Yii::$app->user->identity->name; ?></h1>
    <p>Please eding file to upload:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'upload-form-notarius',
        'layout' => 'horizontal',
        'options' => ['enctype' => 'multipart/form-data'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
    <?= $form->field($model, 'docFile')->fileInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Upload file', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    <table id="tab" class="table" >
        <thead>
        <tr>
            <th scope="col">Task</th>
            <th scope="col">Client name</th>
            <th scope="col">Status</th>
            <th scope="col">Download file</th>
        </tr>
        </thead>
        <tbody>
        <?
            $count = 0;
            foreach ($task_table as $item) {
                $name = $req_names[$count];
        ?>
        <tr>
            <td><?= $item['tasks'] ?></td>
            <td><?= $name;?> </td>
            <td>
                <?= Html::submitButton('status', ['class' => 'btn btn-primary']) ?>

                <?$js = <<<JS
                        $('form').on('beforeSubmit', function(){
                        var data = $(this).serialize();
                        $.ajax({
                        url: '/files/notarius',
                        type: 'POST',
                        data: data,
                        success: function(st1){
                        console.log(st1);
                        },
                        error: function(){
                        alert('Error!');
                        }
                        });
                        return false;
                        });
                    JS;
                    $this->registerJs($js);
                ?>
            </td>
            <td><?= Html::submitButton('Download file', ['class' => 'btn btn-primary']) ?> </td>
        </tr>
        <? $count++;}; ?>

        </tbody>
    </table>
<!--    <a href="reg">--><?//=$err;?><!--</a>-->

</div>