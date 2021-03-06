<?php

namespace app\controllers;

use app\controllers\base\SecuredController;
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

class ClientController extends SecuredController
{

    public function actionClient()
    {
        $model = new Files();
        $task = new Tasks();
        if(Yii::$app->user->identity->check_user !=0){
            return $this->redirect(['users/login']);
        }
        if (Yii::$app->request->isPost) {
            $model->docFile = UploadedFile::getInstance($model, 'docFile');
            $name = md5(time().rand(1,99).$model->docFile->baseName);
            $path = './uploads/'.$name[0].'/'.$name[1];
            $model->filename = md5(time().rand(1,9));
            $model->user_id = Yii::$app->user->identity->id;
            $model->fileway = $path.'/'. $name. '.' . $model->docFile->extension;
            $model->save();
            if(!$model->save()){
                echo'<pre>';
                print_r($model->errors);
                exit();
            }
            $req_t = Yii::$app->request->Post('Tasks');
            $task->user_id = Yii::$app->user->identity->id;

            $task->user_check = 0;
            $task->tasks = $req_t['tasks'];
            $task->file_key = $model->filename;
            $task->task_check = 0;
            $task->save();
            if(!$task->save()){
                echo'<pre>';
                print_r($task->errors);
                exit();
            }
            if ($model->upload($path, $name)) {
                // file is uploaded successfully
                return $this->redirect(['/client/client']);
//                return $this->render('/task/client');
            }
        }
        $task->tasks = null;
        $model->docFile = null;
        $task_table = $task->findTaskClient();
        foreach ($task_table as $item) {
            $req_names []= $task->findName($item['user_check']);
        }
        $status = ['0' => 'Waiting',
            '2'=>'In working',
            '3'=>'Done'];
        return $this->render('/task/client', ['model' => $model, 'task' => $task, 'task_table'=>$task_table, 'req_names'=>$req_names, 'status'=>$status,]);
    }
    public function actionDownload($id)
    {
        $file_download = new Files();
        $file_download->dowload($id);
    }

}
