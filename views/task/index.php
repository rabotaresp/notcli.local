<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'First page';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>You are, <?=\Yii::$app->user->identity->id;?> Client Congratulations!</h1>
    </div>

    <div class="body-content">


    </div>
</div>
