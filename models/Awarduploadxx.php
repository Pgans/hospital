<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "award_upload".
 *
 * @property integer $id
 * @property string $award_name
 * @property string $fullname
 * @property string $photo
 * @property string $description
 * @property integer $dep_id
 * @property string $docs
 *
 * @property Departments $dep
 */
class Awardupload extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'award_upload';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'description', 'docs'], 'string'],
            [['dep_id'], 'integer'],
            [['award_name'], 'string', 'max' => 100],
            [['photo'], 'string', 'max' => 255],
            [['dep_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['dep_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'award_name' => 'Award Name',
            'fullname' => 'Fullname',
            'photo' => 'Photo',
            'description' => 'Description',
            'dep_id' => 'Dep ID',
            'docs' => 'Docs',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDep()
    {
        return $this->hasOne(Departments::className(), ['id' => 'dep_id']);
    }
}
