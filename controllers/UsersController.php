<?php

namespace app\controllers;

use Yii;
use yii\base\Security;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Users;
use app\models\ContactForm;

class UsersController extends Controller
{
    public function actionLogin()
    {
//        if (!Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
        $model = new Users();
        if(Yii::$app->request->post('Users')){
            $req = Yii::$app->request->post('Users');
            $login = $req['login'];
            $pass = $req['password'];
            $user = Users::find()->andWhere(['login'=>$login])->one();
            if ($user){
                if(\Yii::$app->security->validatePassword($pass, $user->password)){
                    \Yii::$app->user->login($user);
                    if(Yii::$app->user->identity->check_user){
                        return $this->redirect('/notarius/notarius');
                    }
                    return $this->redirect('/client/client');
                }
            }
            else{
                $err = "Логин не зарегистрирован, пройдите регистрацию";
            }
        }
        return $this->render('login',['model'=>$model,'err' => $err]);
    }
    public function actionReg()
    {
        $newUser = new Users();
        if(Yii::$app->request->post('Users')) {
            $req = Yii::$app->request->post('Users');
            $name = $req['name'];
            $login = $req['login'];
            $pass = $req['password'];
            $check = $req['check_user'];
            $user = Users::find()->andWhere(['login' => $login])->one();
            if (!$user) {
                $newUser->name = $name;
                $newUser->login = $login;
                $newUser->password = Yii::$app->security->generatePasswordHash($pass);
                $newUser->check_user = $check;
                $newUser->save();
                if (!$newUser->save()) {
                    echo'<pre>';
                    print_r($newUser->errors);
                    exit();
                }
                if($check)
                {
                    \Yii::$app->user->login($newUser);
                    return $this->redirect('/notarius/notarius');
                }
                \Yii::$app->user->login($newUser);
                return $this->redirect('/client/client');
            } else {
                $err = "Логин занят, выберите другой";
            }
        }
        $newUser->name = '';
        $newUser->login = '';
        $newUser->password = '';
        return $this->render('reg', ['model' => $newUser, 'err' => $err]);
    }
}
