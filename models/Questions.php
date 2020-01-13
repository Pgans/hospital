<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property int $question_id รหัสแบบสอบถาม
 * @property string|null $question_date วันที่ตอบ
 * @property string|null $question_value คะแนนที่ได้
 */
class Questions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question_id'], 'required'],
            [['question_id'], 'integer'],
            [['question_date'], 'safe'],
            [['question_value'], 'string', 'max' => 1],
            [['question_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'question_id' => 'Question ID',
            'question_date' => 'Question Date',
            'question_value' => 'Question Value',
        ];
    }
}
