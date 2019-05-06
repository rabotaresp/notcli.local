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
//    public function actionIndex()
//    {
//        $model = new Users();
//        if(Yii::$app->user->isGuest) {
//            return $this->redirect('/users/login');
//        }
//        return $this->render('index',['model'=>$model,]);
//    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Users();
        if(Yii::$app->request->post('Users')){
            $req = Yii::$app->request->post('Users');
            $login = $req['login'];
            $pass = $req['password'];
            $user = Users::find()->andWhere(['login'=>$login])->one();
            if ($user){
                if(\Yii::$app->security->validatePassword($pass, $user->password)){
                    \Yii::$app->user->login($user);
                    return $this->redirect('/site/index');
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
        $req = Yii::$app->request->post('Users');
        $name = $req['name'];
        $login = $req['login'];
        $user = Users::find()->andWhere(['login'=>$login])->one();
        if(!$user){
            $pass = $req['password'];
            $check = $req['check_user'];
            $newUser->name = $name;
            $newUser->login = $login;
            $newUser->password = Yii::$app->security->generatePasswordHash($pass);
            $newUser->check_user = $check;
            $newUser->save();
            if($newUser->save())
            {
                    \Yii::$app->user->login($newUser);
                    return $this->redirect('/site/index');
            }
            else{
                $newUser->errors;
            }
        }
        else{
            $err = "Логин занят, выберите другой";
        }
        $newUser->name = '';
        $newUser->login = '';
        $newUser->password = '';
        return $this->render('reg', ['model' => $newUser, 'err' => $err]);

    }
}
