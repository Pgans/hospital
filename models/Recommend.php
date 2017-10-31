<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recommend".
 *
 * @property integer $id
 * @property string $name
 * @property string $telephone
 * @property string $recommend
 * @property string $created_at
 */
class Recommend extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recommend';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'telephone', 'recommend'], 'required'],
            [['recommend'], 'string'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 45],
            [['telephone'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'name' => 'ชื่อ',
            'telephone' => 'เบอร์โทร',
            'recommend' => 'ข้อเสนอแนะ',
            'created_at' => 'วันบันทึก',
        ];
    }
}
