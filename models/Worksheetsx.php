<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
/**
 * This is the model class for table "worksheets".
 *
 * @property integer $id
 * @property string $ref
 * @property string $worksheet_name
 * @property string $covenant
 * @property string $docs
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 *
 * @property User $createdBy
 */
class Worksheets extends \yii\db\ActiveRecord
{
   const UPLOAD_FOLDER = 'sheets';

    public static function tableName()
    {
        return 'worksheets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'worksheet_name'], 'required'],
            [['id', 'created_by', 'updated_by'], 'integer'],
            [['created_at'], 'safe'],
            [['ref'], 'string', 'max' => 50],
            [['worksheet_name'], 'string', 'max' => 250],
            [['covenant'],'file','maxFiles'=>1],
            //[['covenant', 'docs'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
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
            'worksheet_name' => 'ชื่อใบงาน',
            'covenant' => 'แนบไฟล์',
            'docs' => 'Docs',
            'created_by' => 'ผู้สร้าง',
            'updated_by' => 'ผู้แก้ไข',
            'created_at' => 'วันบันทึก',
        ];
    }

    public static function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/';
    }

    public static function getUploadUrl(){
        return Url::base(true).'/'.self::UPLOAD_FOLDER.'/';
    }

    public function listDownloadFiles($type){
     $docs_file = '';
     if(in_array($type, ['covenant'])){
             $data = $type==='docs'?$this->docs:$this->covenant;
             $files = Json::decode($data);
            if(is_array($files)){
                 $docs_file ='<ul>';
                 foreach ($files as $key => $value) {
                    $docs_file .= '<li>'.Html::a($value,['/worksheets/download','id'=>$this->id,'file'=>$key,'file_name'=>$value]).'</li>';
                 }
                 $docs_file .='</ul>';
            }
     }

     return $docs_file;
    }

    public function initialPreview($data,$field,$type='file'){
            $initial = [];
            $files = Json::decode($data);
            if(is_array($files)){
                 foreach ($files as $key => $value) {
                    if($type=='file'){
                        $initial[] = "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
                    }elseif($type=='config'){
                        $initial[] = [
                            'caption'=> $value,
                            'width'  => '120px',
                            'url'    => Url::to(['/worksheets/deletefile','id'=>$this->id,'fileName'=>$key,'field'=>$field]),
                            'key'    => $key
                        ];
                    }
                    else{
                        $initial[] = Html::img(self::getUploadUrl().$this->ref.'/'.$value,['class'=>'file-preview-image', 'alt'=>$model->file_name, 'title'=>$model->file_name]);
                    }
                 }
         }
        return $initial;
    }



    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
