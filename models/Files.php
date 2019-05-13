<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string $filename
 * @property int $user_id
 * @property string $fileway
 */
class Files extends ActiveRecord
{
    public $docFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filename', 'user_id', 'fileway'], 'required'],
            [['user_id'], 'integer'],
            [['fileway','filename'], 'string', 'max' => 250],
            [['docFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Filename',
            'user_id' => 'User ID',
            'fileway' => 'Path on file in script',
            'docFile' => 'Name File',
        ];
    }

    /**
     * @return bool
     */
    public function upload($path, $name)
    {
        if ($this->validate()) {
            if(!file_exists($path)){
                mkdir($path, 0777,true);
            }
            $this->docFile->saveAs($path.'/'. $name. '.' . $this->docFile->extension);
            return true;
        } else {
            return false;
        }
    }
    public function dowload($key)
    {

        $user = Yii::$app->user->identity->id;
        $file_path = self::find()->andWhere(['id' => $key])->one();
        $file = Yii::getAlias('@web') . trim($file_path['fileway'],'.');
        if (file_exists($file)) {
            Yii::$app->response->sendFile($file);
        }
    }

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */

}
