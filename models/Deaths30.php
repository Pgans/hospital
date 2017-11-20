<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "deaths_m30".
 *
 * @property integer $id
 * @property string $cid
 * @property string $fullname
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 *
 * @property User $createdBy
 */
class Deaths30 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deaths_m30';
    }
      public function behaviors()
     {
      return [
          BlameableBehavior::className(),
      ];
     }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'fullname'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_at'], 'safe'],
            [['cid'], 'string', 'length' => [13, 13]],
            [['cid'], 'unique'],
            [['fullname'], 'string', 'length' => [10,100]],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }
    public function validateIdCard()
    {
        $id = str_split(str_replace('-','', $this->cid)); //ตัดรูปแบบและเอา ตัวอักษร ไปแยกเป็น array $id
        $sum = 0;
        $total = 0;
        $digi = 13;
        
        for($i=0; $i<12; $i++){
            $sum = $sum + (intval($id[$i]) * $digi);
            $digi--;
        }
        $total = (11 - ($sum % 11)) % 10;
        
        if($total != $id[12]){ //ตัวที่ 13 มีค่าไม่เท่ากับผลรวมจากการคำนวณ ให้ add error
            $this->addError('cid', 'หมายเลขบัตรประชาชนไม่ถูกต้อง');
        }
        
        
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'cid' => 'เลขประชาชน13หลัก',
            'fullname' => 'ชื่อเต็ม',
            'created_by' => 'ผู้บันทึก',
            'updated_by' => 'ผู้แก้ไข',
            'created_at' => 'วันบันทึก',
        ];
    }
public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}