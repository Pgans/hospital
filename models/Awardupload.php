<?php

namespace app\models;

use Yii;
use \yii\web\UploadedFile;
use \yii\helpers\ArrayHelper;
use \yii\helpers\Html;

/**
 * This is the model class for table "award_upload".
 *
 * @property integer $id
 * @property string $award_name
 * @property string $fullname
 * @property string $photo
 * @property string $photos
 * @property integer $dep_id
 *
 * @property Departments $dep
 */
class Awardupload extends \yii\db\ActiveRecord
{
    public $upload_foler ='uploads';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'award_upload';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'photos'], 'string'],
            [['dep_id'], 'integer'],
            [['award_name'], 'string', 'max' => 100],
            [['photo'], 'file',
          'skipOnEmpty' => true,
          'extensions' => 'png,jpg'
         
        ], 
        [['photos'], 'file',
        'skipOnEmpty' => true,
        'maxFiles' => 3,
        'extensions' => 'png,jpg'
      ]
  ];
}
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'award_name' => 'Award Name',
            'fullname' => 'Fullname',
            'photo' => 'Photo',
            'photos' => 'Photos',
            'dep_id' => 'Dep ID',
        ];
    }

    public function upload($model,$attribute)
{
    $photo  = UploadedFile::getInstance($model, $attribute);
      $path = $this->getUploadPath();
    if ($this->validate() && $photo !== null) {

        $fileName = md5($photo->baseName.time()) . '.' . $photo->extension;
        //$fileName = $photo->baseName . '.' . $photo->extension;
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

   
}
