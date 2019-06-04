<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "run_m301".
 *
 * @property string $bib
 * @property string $fullname
 * @property string $tel
 * @property string $fname
 * @property string $lname
 * @property string $category
 * @property string $serial
 * @property string $size
 * @property string $shirth
 */
class Runm301 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'run_m301';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bib', 'fullname', 'tel', 'fname', 'lname', 'category', 'serial', 'size', 'shirth'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bib' => 'Bib',
            'fullname' => 'Fullname',
            'tel' => 'Tel',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'category' => 'Category',
            'serial' => 'Serial',
            'size' => 'Size',
            'shirth' => 'Shirth',
        ];
    }
}
