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
 * @property integer $user_id
 * @property string $created_at
 *
 * @property User $user
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
            [['user_id'], 'integer'],
            [['created_at'], 'safe'],
            //[['photo'], 'string', 'max' => 100],
            [['showslide_img'], 'file','skipOnEmpty'=>true, 'on'=> 'update', 'extensions' =>'jpg, png'],
           // [['showslide_img', 'file', 'skipOnEmpty'=> true, 'on'=>'update','extensions'=>'jpg']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
           // 'photo' => Yii::t('app', 'รูปภาพ'),
            'showslide_img'=> Yii::t('app', 'รูปภาพ'),
            'user_id' => Yii::t('app', 'ผู้บันทึก'),
            'created_at' => Yii::t('app', 'วันบันทึก'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatBy()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getCreatedBy()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'created_by']);
    }
}
