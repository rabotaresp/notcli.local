<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property int $user_id
 * @property int $user_check
 * @property string $tasks
 * @property int $file_key
 * @property int $task_check
 *
 * @property Files $fileKey
 * @property Users $user
 */
class Tasks extends \yii\db\ActiveRecord
{
    const STATUS_WAITING = 0;
    const STATUS_INWORKING = 2;
    const STATUS_DONE = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'user_check', 'tasks', 'file_key'], 'required'],
            [['user_id', 'user_check', 'task_check'], 'integer'],
            [['tasks'], 'string', 'max' => 100],
            [['file_key'],'string', 'max' => 250],
            [['file_key'], 'exist', 'skipOnError' => true, 'targetClass' => Files::className(), 'targetAttribute' => ['file_key' => 'filename']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'user_check' => 'User Check',
            'tasks' => 'Tasks',
            'file_key' => 'File Key',
            'task_check' => 'Task Check',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFileKey()
    {
        return $this->hasOne(Files::className(), ['id' => 'file_key']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
    public function findTaskNotary()
    {
        $task_table = self::find()->andWhere(['user_check'=> 0])->all();
        return $task_table;
    }
    public function findTaskClient()
    {
        $task_table = self::find()->andWhere(['user_id'=> Yii::$app->user->identity->id])->all();
        return $task_table;
    }
    public function findName($id)
    {
        $req_name = Users::findOne(['id'=>$id]);
        return $req_name['name'];
    }
}
