<?php

namespace app\controllers;

use app\models\Files;
use app\models\Tasks;
use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class FilesController extends Controller
{

    public function actionClient()
    {
        $model = new Files();
        $task = new Tasks();
        if (Yii::$app->request->isPost) {
            $model->docFile = UploadedFile::getInstance($model, 'docFile');
            $name = md5(time().rand(1,99).$model->docFile->baseName);
            $path = './uploads/'.$name[0].'/'.$name[1];
            $model->filename = md5(time().rand(1,9));
            $model->user_id = Yii::$app->user->identity->id;
            $model->fileway = $path.'/'. $name. '.' . $model->docFile->extension;
            $model->save();
            if(!$model->save()){
                $model->errors;
            }
            $req_t = Yii::$app->request->Post('Tasks');
            $task->user_id = Yii::$app->user->identity->id;
//
//            if(Yii::$app->user->identity->check_user ==0) {
//                $task->user_check = Yii::$app->user->identity->id;
//            }
            $task->user_check = 0;
            $task->tasks = $req_t['tasks'];
            $task->file_key = $model->id;
            $task->task_check = 0;
            $task->save();
//            var_dump( $task->save());
//            echo'<pre>';
//            print_r($task->errors);
//            exit();
            if(!$task->save()){
                $task->errors;
            }
            if ($model->upload($path, $name)) {
                // file is uploaded successfully
                return $this->redirect('/files/client');
            }
        }
        $task->tasks = null;
        $model->docFile = null;
        return $this->render('/task/client', ['model' => $model, 'task' => $task]);
    }
    public function actionNotarius()
    {
        $model = new Files();
        $task = new Tasks();
        if (Yii::$app->request->isPost) {
            $model->docFile = UploadedFile::getInstance($model, 'docFile');
            $name = md5(time().rand(1,99).$model->docFile->baseName);
            $path = './uploads/'.$name[0].'/'.$name[1];
            $model->filename = md5(time().rand(1,9));
            $model->user_id = Yii::$app->user->identity->id;
            $model->fileway = $path.'/'. $name. '.' . $model->docFile->extension;
            $model->save();
            if(!$model->save()){
                $model->errors;
            }
            $req_t = Yii::$app->request->Post('Tasks');
            $task->user_id = Yii::$app->user->identity->id;

            if(Yii::$app->user->identity->check_user ==1) {
                $task->user_check = Yii::$app->user->identity->id;
            }
            $task->tasks = $req_t['tasks'];
            $task->file_key = $model->id;
            $task->task_check = 0;
            $task->save();
//            var_dump( $task->save());
//            echo'<pre>';
//            print_r($task->errors);
//            exit();
            if(!$task->save()){
                $task->errors;
            }
            if ($model->upload($path, $name)) {
                // file is uploaded successfully

                return $this->redirect('/files/notarius');
            }
        }
        $task->tasks = null;
        $model->docFile = null;
        return $this->render('/task/notar', ['model' => $model, 'task' => $task]);
    }
    public function actionDowload()
    {
        $path = Yii::getAlias('@webroot') . '/uploads';

        $file = $path . '/sample.pdf';

        if (file_exists($file)) {
            Yii::$app->response->sendFile($file);
        }
    }
}
