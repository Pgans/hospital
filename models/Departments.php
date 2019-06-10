<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property integer $id
 * @property string $name
 *
 * @property AwardUpload[] $awardUploads
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'แผนก',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAwardUploads()
    {
        return $this->hasMany(AwardUpload::className(), ['dep_id' => 'id']);
    }
}
