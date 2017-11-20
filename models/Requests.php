<?php

namespace app\models;

use Yii;
/* เพิ่มคำสั่ง 3 บรรทัดต่อจากนี้ลงไป */
use yii\filters\AccessControl;        // เรียกใช้ คลาส AccessControl
use app\models\User;             // เรียกใช้ Model คลาส User ที่ปรับปรังปรุงไว้
use app\components\AccessRule;   // เรียกใช้ คลาส Component AccessRule ที่เราสร้างใหม่

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
            [['fullname'], 'string', 'length' => [10,45]],
            [['fullname'], 'string', 'min' => 10],
            [['email'], 'email'],
            [['telephone'], 'string', 'length' => [10,10]],
            [['request_text'], 'string', 'max' => 250],
        ];
    }
    

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
