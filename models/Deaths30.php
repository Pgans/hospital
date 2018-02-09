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
 * @property string $cdeath
 * @property string $ddeath
 * @property integer $cmu
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'fullname', 'cdeath', 'ddeath', 'cmu'], 'required'],
            [['ddeath', 'created_at'], 'safe'],
            [['cmu', 'created_by', 'updated_by'], 'integer'],
            [['cid'], 'string', 'length' =>[13,13]],
            [['cdeath'], 'string', 'length'=> [4,6]],
            [['cid'], 'unique'],
            [['fullname'], 'string', 'length' =>[10,100]],
            [['cdeath'], 'string', 'max' => 6],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'cid' => 'เลขประชาชน13หลัก',
            'fullname' => 'ชื่อ-สกุล',
            'cdeath' => 'สาเหตุการตาย',
            'ddeath' => 'วันที่ตาย',
            'cmu' => 'รพสต',
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