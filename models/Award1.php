<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\db\Expression;
use app\models\User;
use \yii\web\UploadedFile;

/**
 * This is the model class for table "award_upload".
 *
 * @property integer $id
 * @property string $award_name
 * @property string $fullname
 * @property string $photo
 * @property string $photos
 * @property string $receive_date
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $dep_id
 *
 * @property Departments $dep
 */
class Award1 extends \yii\db\ActiveRecord
{
    public $upload_foler ='uploads';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'award_upload';
    }

    public function behaviors()
     {
      return [
        
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
          BlameableBehavior::className(),
      ];
     }
    public function rules()
    {
        return [
            [['fullname', 'photos'], 'string'],
            [['receive_date', 'created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by', 'dep_id'], 'integer'],
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
            'award_name' => 'รางวัล',
            'fullname' => 'รายละเอียด',
            'photo' => 'รูปภาพ',
            'photos' => 'Photos',
            'receive_date' => 'วันได้รับรางวัล',
            'created_at' => 'วันบันทึก',
            'updated_at' => 'วันแก้ไข',
            'created_by' => 'ผู้บันทึก',
            'updated_by' => 'ผู้แก้ไข',
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


    
    public function getDep()
    {
        return $this->hasOne(Departments::className(), ['id' => 'dep_id']);
    }
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
