<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "award_upload".
 *
 * @property integer $id
 * @property string $award_name
 * @property string $fullname
 * @property string $photo
 * @property string $description
 * @property integer $dep_id
 * @property string $docs
 *
 * @property Departments $dep
 */
class Awarduload extends \yii\db\ActiveRecord
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
            [['fullname', 'description', 'docs'], 'string'],
            [['dep_id'], 'integer'],
            [['award_name'], 'string', 'max' => 100],
            [['photo'], 'string', 'max' => 255],
            [['dep_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['dep_id' => 'id']],
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
            'description' => 'Description',
            'dep_id' => 'Dep ID',
            'docs' => 'Docs',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
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
    public function getDep()
    {
        return $this->hasOne(Departments::className(), ['id' => 'dep_id']);
    }

}
