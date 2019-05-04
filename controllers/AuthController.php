<?php

namespace app\controllers;

use Yii;
use yii\base\Security;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class AuthController extends Controller
{
    public function actionLogin()
    {
        var_dump(\Yii::$app->user->isGuest);
        exit();
        $pass = "djfadf";
        $login = 'Mihab';
        $user = Users::find()->andWhere(['login'=>$login])->one();
        if ($user){
            if(\Yii::$app->security->validatePassword($pass, $user->password)){
                \Yii::$app->user->login($user);
            }
        }
    }
}