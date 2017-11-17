<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deaths_m30".
 *
 * @property integer $id
 * @property string $cid
 * @property string $fullname
 * @property integer $user_id
 * @property string $created_at
 *
 * @property User $user
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
            [['cid', 'fullname', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['created_at'], 'safe'],
            [['cid'], 'string', 'max' => 13],
            [['fullname'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'cid' => 'เลขประจำตัวประชาชน 13 หลัก',
            'fullname' => 'ชื่อเต็ม',
            'user_id' => 'วันบันทึก',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
