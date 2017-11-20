<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "deaths_m30".
 *
 * @property integer $id
 * @property string $cid
 * @property string $fullname
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 *
 * @property User $createdBy
 */
class Deaths30 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deaths_m30';
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
            [['cid', 'fullname'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_at'], 'safe'],
            [['cid'], 'string', 'max' => 13],
            [['fullname'], 'string', 'max' => 100],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'cid' => 'เลขประชาชน13หลัก',
            'fullname' => 'ชื่อเต็ม',
            'created_by' => 'ผู้บันทึก',
            'updated_by' => 'ผู้แก้ไข',
            'created_at' => 'วันบันทึก',
        ];
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