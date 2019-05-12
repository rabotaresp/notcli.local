<?php

namespace app\controllers;

use app\models\Files;
use app\models\Tasks;
use Yii;
use yii\web\Controller;
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
                echo'<pre>';
                print_r($model->errors);
                exit();
            }
            $req_t = Yii::$app->request->Post('Tasks');
            $task->user_id = Yii::$app->user->identity->id;

            $task->user_check = 0;
            $task->tasks = $req_t['tasks'];
            $task->file_key = $model->id;
            $task->task_check = 0;
            $task->save();
            if(!$task->save()){
                echo'<pre>';
                print_r($task->errors);
                exit();
            }
            if ($model->upload($path, $name)) {
                // file is uploaded successfully
                return $this->redirect('/files/client');
            }
        }
        $task->tasks = null;
        $model->docFile = null;
        $task_table = $task->findTaskCli();
        foreach ($task_table as $item) {
                $req_names = $task->findName($item['user_check']);
        }
        return $this->render('/task/client', ['model' => $model, 'task' => $task, 'task_table'=>$task_table, 'req_names'=>$req_names,]);
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
                echo'<pre>';
                print_r($model->errors);
                exit();
            }
            $req_t = Yii::$app->request->Post('Tasks');
            if($req_t){
                $task->user_id = Yii::$app->user->identity->id;

                if(Yii::$app->user->identity->check_user ==0) {
                    $task->user_check = Yii::$app->user->identity->id;
                }
                $task->tasks = $req_t['tasks'];
                $task->file_key = $model->id;
                $task->task_check = 0;
                $task->save();
                if(!$task->save()){
                    echo'<pre>';
                    print_r($task->errors);
                    exit();
                }
                if ($model->upload($path, $name)) {
                    // file is uploaded successfully
                    return $this->redirect('/files/notarius');
                }
            }
        }
        $task->tasks = null;
        $model->docFile = null;
        $task_table = $task->findTaskNot();
        foreach ($task_table as $item) {
            $req_names[] = $task->findName($item['user_id']);
        }
        return $this->render('/task/notar', ['model' => $model, 'task' => $task, 'task_table'=>$task_table, 'req_names'=> $req_names,]);
    }
    public function actionDowload($id)
    {
        $user = Yii::$app->user->identity->id;
        $file_path = Files::find()->andWhere(['filename' => $id])->andWhere(['user-id'=>$user])->one();
        $file = Yii::getAlias('@webroot') . $file_path;

//        $file = $path . '/sample.pdf';

        if (file_exists($file)) {
            Yii::$app->response->sendFile($file);
        }
    }
}
