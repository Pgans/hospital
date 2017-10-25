<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requests".
 *
 * @property integer $id
 * @property string $fullname
 * @property string $email
 * @property string $telephone
 * @property string $request_text
 * @property string $created_at
 */
class Requests extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'email', 'telephone', 'request_text'], 'required'],
            [['created_at'], 'safe'],
            [['fullname'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 20],
            [['telephone'], 'string', 'max' => 10],
            [['request_text'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'ชื่อ-สกุล',
            'email' => 'อีเมล์',
            'telephone' => 'เบอร์โทร',
            'request_text' => 'ข้อความ',
            'created_at' => 'แจ้งเมื่อ',
        ];
    }
}
