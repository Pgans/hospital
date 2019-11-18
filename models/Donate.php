<?php

namespace app\models;

use Yii;
use yii\helpers\Url;
use app\models\Province;
/**
 * This is the model class for table "donate".
 *
 * @property integer $id
 * @property string $ref
 * @property string $event_name
 * @property string $detail
 * @property string $start_date
 * @property string $location
 * @property integer $province_id
 */
class Donate extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER='donates';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'donate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['detail'], 'string'],
            [['start_date'], 'safe'],
            [['province_id'], 'integer'],
            [['ref'], 'string', 'max' => 50],
            [['event_name', 'location'], 'string', 'max' => 255],
            [['ref'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref' => 'เลข fk กับ upload ใช้กับ upload ajax',
            'event_name' => 'ชื่องาน',
            'detail' => 'รายละเอียด',
            'start_date' => 'วันที่ถ่ายภาพ',
            'location' => 'สถานที่',
            'province_id' => 'จังหวัด',
        ];
    }

    public static function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/';
    }

    public static function getUploadUrl(){
        return Url::base(true).'/'.self::UPLOAD_FOLDER.'/';
    }

    public function getThumbnails($ref,$event_name){
         $uploadFiles   = Uploads::find()->where(['ref'=>$ref])->all();
         $preview = [];
        foreach ($uploadFiles as $file) {
            $preview[] = [
                'url'=>self::getUploadUrl(true).$ref.'/'.$file->real_filename,
                'src'=>self::getUploadUrl(true).$ref.'/thumbnail/'.$file->real_filename,
                'options' => ['title' => $event_name]
            ];
        }
        return $preview;
    }

    public function getProvince()
    {
      return $this->hasOne(Province::className(),['PROVINCE_ID'=>'province_id']);
    }

    public function getPhotcover($ref){

        $model = Uploads::find()
                ->where(['ref' => $ref])
                ->orderBy(['(upload_id)' => SORT_ASC])
                ->one();

        return \yii\helpers\Html::img('@web/donates/'.$ref.'/'.$model['real_filename'],['class'=>'img-responsive']);

    }

}
