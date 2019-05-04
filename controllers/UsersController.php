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
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $req = Yii::$app->request->post();
        $login = $req['login'];
        $pass = $req['password'];
        $user = Users::find()->andWhere(['login'=>$login])->one();
        if ($user){
            if(\Yii::$app->security->validatePassword($pass, $user->password)){
                $log = \Yii::$app->user->login($user);
                return $this->render('/site/index', ['log'=>$log,]);
            }
        }
        else{
            header('location: /users/reg');
            exit();
        }

//        if ($model->load($req) && $model->login()) {
//            return $this->goBack();
//        }

//        $model->password = '';
        return $this->render('login');
    }
    public function actionReg()
    {
        //$err = 'this login is busy, choose another';
        $newUser = new Users();
//        $newUser->load(Yii::$app->request->post());
        $req = Yii::$app->request->post();
        $name = $req['name'];
        $login = $req['login'];
        $pass = $req['password'];
        $check = $req['check_user'];
        $newUser->name = $name;
        $newUser->login = $login;
        $newUser->password = $pass;
        $newUser->check_user = $check;
        $newUser->save();
        if($newUser->save())
        {
            header('location: /site/index');

        }
        else{
            $newUser->error;
        }
        return $this->render('reg', ['model' => $newUser, ]);

    }
}
