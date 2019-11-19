<?php

namespace app\modules\anc\models;

use Yii;

/**
 * This is the model class for table "fee_schedule".
 *
 * @property integer $fee_id
 * @property string $cid
 * @property string $regdate
 * @property string $regtime
 * @property string $wight
 * @property string $hieght
 * @property string $ga
 * @property string $gravida
 * @property string $lmp
 * @property string $icd10tm
 * @property string $icd9cm_1
 * @property string $icd9cm_2
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class Feeschedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fee_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fee_id', 'cid', 'regdate', 'regtime', 'wight', 'hieght', 'icd10tm', 'icd9cm_1', 'icd9cm_2'], 'required'],
            [['fee_id', 'created_by', 'updated_by'], 'integer'],
            [['regdate', 'regtime', 'lmp', 'created_at', 'updated_at'], 'safe'],
            [['cid'], 'string', 'max' => 13],
            [['wight', 'hieght'], 'string', 'max' => 3],
            [['ga'], 'string', 'max' => 1],
            [['gravida'], 'string', 'max' => 2],
            [['icd10tm', 'icd9cm_1', 'icd9cm_2'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fee_id' => 'ลำดับ',
            'cid' => '13หลัก',
            'regdate' => 'Regdate',
            'regtime' => 'Regtime',
            'wight' => 'น้ำหนัก',
            'hieght' => 'ส่วนสูง',
            'ga' => 'ครรภ์ที่',
            'gravida' => 'อายุครรภ์',
            'lmp' => 'วันกำหนดคลอด',
            'icd10tm' => 'รหัสโรค',
            'icd9cm_1' => 'รหัสหัตถการ1',
            'icd9cm_2' => 'รหัสหัตถการ2',
            'created_at' => 'วันที่บันทึก',
            'updated_at' => 'วันที่แก้ไข',
            'created_by' => 'สร้างโดย',
            'updated_by' => 'แก้ไขโดย',
        ];
    }
}
