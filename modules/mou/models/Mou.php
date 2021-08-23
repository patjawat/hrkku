<?php

namespace app\models;

use Yii;
use yii\helpers\Url;
use app\models\Uploads;
use yii\behaviors\BlameableBehavior;
use app\modules\usermanager\models\User;

class Mou extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const UPLOAD_FOLDER='uploads';
    public static function tableName()
    {
        return 'mou';
    }

    public function behaviors()
  {
      return [
          [
              'class' => BlameableBehavior::className(),
            //   'createdByAttribute' => 'created_by',
            //   'updatedByAttribute' => 'updated_by',
          ],
      ];
  }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department', 'topic'], 'required'],
            [['department', 'created_by', 'updated_by'], 'integer'],
            [['date_start', 'date_end', 'updated_at', 'created_at','expire'], 'safe'],
            [['ref', 'topic', 'contact', 'results', 'level'], 'string', 'max' => 255],
        ];
    }

   /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref' => 'Ref',
            'department' => 'ส่วนงาน/หน่วยงาน',
            'topic' => 'ชื่อเรื่อง',
            'contact' => 'โทรศัพท์',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'results' => 'ผลการตรวจสอบ',
            'level' => 'พิรณาภายใน',
            'expire' => 'พิรณาภายในวันทำการ',
            'created_by' => 'ผู้รับผิดชอบ',
            'updated_by' => 'Update By',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    public function getAuthor(){
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    public function getUpdater(){
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
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

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {

            if (($this->level)) {
                $this->expire = $this->expireDate();
            }
          
            return true;
        } else {
            return false;
        }
    }



   public function expireDate()
    {
        $dates = $this->created_at;
        $date = strtotime($dates);
        $date = strtotime("+".$this->level." day", $date);
       return date('Y-m-d', $date);

        // return date('Y-m-d', strtotime("+3 days"));
    }

    public function levelStatus()
    {

    }
}
