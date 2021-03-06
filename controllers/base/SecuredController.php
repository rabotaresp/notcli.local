<?php

namespace app\controllers\base;

use Yii;
use yii\base\Security;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Users;
use app\models\ContactForm;

class SecuredController extends Controller
{
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest) {
            return $this->redirect(['users/login']);
        }
        return parent::beforeAction($action); // TODO: Change the autogenerated stub

    }
}
