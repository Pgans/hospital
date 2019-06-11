<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\db\Expression;
use app\models\User;
use \yii\web\UploadedFile;



/**
 * This is the model class for table "award2_upload".
 *
 * @property integer $id
 * @property string $award_name
 * @property string $fullname
 * @property string $ref
 * @property string $photo
 * @property string $covenant
 * @property string $receive_date
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $dep_id
 *
 * @property Departments $dep
 */
class Award2upload extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER = 'freelances';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'award2_upload';
    }
    public function behaviors()
     {
      return [
        
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
          BlameableBehavior::className(),
      ];
     }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname'], 'string'],
            [['receive_date', 'created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by', 'dep_id'], 'integer'],
            [['award_name'], 'string', 'max' => 100],
            [['title'], 'string', 'max' => 255],
            [['ref'], 'string', 'max' => 50],
            [['photo'], 'string', 'max' => 255],
            [['covenant'],'file','maxFiles'=>1],
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
            'award_name' => 'รางวัล',
            'fullname' => 'รายละเอียด',
            'ref' => 'Ref',
            'photo' => 'รูปภาพ',
            'covenant' => 'ไฟล์แนบ',
            'receive_date' => 'วันได้รับรางวัล',
            'created_at' => 'เวลาบันทึก',
            'updated_at' => 'Updated At',
            'created_by' => 'ผู้บันทึก',
            'updated_by' => 'Updated By',
            'dep_id' => 'Dep ID',
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
                    $docs_file .= '<li>'.Html::a($value,['/freelance/download','id'=>$this->id,'file'=>$key,'file_name'=>$value]).'</li>';
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
                            'url'    => Url::to(['/freelance/deletefile','id'=>$this->id,'fileName'=>$key,'field'=>$field]),
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


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDep()
    {
        return $this->hasOne(Departments::className(), ['id' => 'dep_id']);
    }
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    public function getUpdateBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}



