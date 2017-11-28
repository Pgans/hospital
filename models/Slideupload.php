<?php

namespace app\models;

use Yii;
use \yii\web\UploadedFile;

/**
 * This is the model class for table "slide_upload".
 *
 * @property integer $id
 * @property string $name
 * @property string $photo
 * @property string $d_update
 */
class Slideupload extends \yii\db\ActiveRecord
{
    public $upload_foler ='images';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slide_upload';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['d_update'], 'safe'],
            [['name'], 'string', 'length' => [5,100]],
            [['photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg']
            //[['photo'], 'string', 'max' => 255],
        ];
    }
    public function upload($model,$attribute)
{
    $photo  = UploadedFile::getInstance($model, $attribute);
      $path = $this->getUploadPath();
    if ($this->validate() && $photo !== null) {

       // $fileName = md5($photo->baseName.time()) . '.' . $photo->extension;
        $fileName = $photo->baseName . '.' . $photo->extension;
        if($photo->saveAs($path.$fileName)){
          return $fileName;
        }
    }
    return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
}

public function getUploadPath(){
  return Yii::getAlias('@webroot').'/'.$this->upload_foler.'/';
}

public function getUploadUrl(){
  return Yii::getAlias('@web').'/'.$this->upload_foler.'/';
}

public function getPhotoViewer(){
  return empty($this->photo) ? Yii::getAlias('@web').'/img/none.png' : $this->getUploadUrl().$this->photo;
}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'photo' => 'Photo',
            'd_update' => 'D Update',
        ];
    }
}
