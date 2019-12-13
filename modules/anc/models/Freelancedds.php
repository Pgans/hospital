<?php

namespace app\modules\anc\models;

use Yii;

/**
 * This is the model class for table "freelance".
 *
 * @property integer $id
 * @property string $ref
 * @property string $title
 * @property string $covenant
 * @property string $docs
 * @property string $create_date
 * @property integer $view
 */
class Freelancedds extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'freelance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_date'], 'safe'],
            [['view'], 'integer'],
            [['ref'], 'string', 'max' => 50],
            [['title', 'covenant', 'docs'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref' => 'หลายเลข referent สำหรับอัพโหลดไฟล์ ajax',
            'title' => 'ชื่องาน',
            'covenant' => 'หนังสือสัญญา',
            'docs' => 'Docs',
            'create_date' => 'สร้างวันที่',
            'view' => 'จำนวนผู้เข้าชม',
        ];
    }
}
