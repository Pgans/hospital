<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\behaviors\BlameableBehavior;


/**
 * This is the model class for table "showslide".
 *
 * @property integer $id
 * @property string $photo
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 *
 * @property User $createdBy
 */
class Showslide extends \yii\db\ActiveRecord
{
    public $showslide_img;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'showslide';
    }
    public function behaviors()
  {
      return [
          BlameableBehavior::className(),
      ];
  }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photo'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_at'], 'safe'],
            //[['photo'], 'string', 'max' => 100],
            [['showslide_img'], 'file','skipOnEmpty'=>true, 'on'=> 'update', 'extensions' =>'jpg, png'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo' => 'รูปภาพ',
            'created_by' => 'ผู้บันทึก',
            'updated_by' => 'ผู้แก้ไข',
            'created_at' => 'วันบันทึก',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
