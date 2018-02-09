<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_logs".
 *
 * @property integer $id
 * @property string $username
 * @property string $ipaddress
 * @property string $logtime
 * @property string $controller
 * @property string $action
 */
class TblLogs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'ipaddress'], 'required'],
            [['logtime'], 'safe'],
            [['username', 'ipaddress'], 'string', 'max' => 50],
            [['controller', 'action'], 'string', 'max' => 255],
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
            'ipaddress' => 'Ipaddress',
            'logtime' => 'Logtime',
            'controller' => 'Controller',
            'action' => 'Action',
        ];
    }
}
