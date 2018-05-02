<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log_web".
 *
 * @property integer $id
 * @property string $username
 * @property string $ip
 * @property string $patient_cid
 * @property string $datetime
 */
class LogWeb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_web';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['datetime'], 'safe'],
            [['username', 'ip', 'patient_cid'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'ip' => 'Ip',
            'patient_cid' => 'Patient Cid',
            'datetime' => 'Datetime',
        ];
    }
}
