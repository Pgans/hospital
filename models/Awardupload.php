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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDep()
    {
        return $this->hasOne(Departments::className(), ['id' => 'dep_id']);
    }
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    public function getUpdateBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
