<?php

namespace app\modules\hradmin\models;

use Yii;
use yii\helpers\Json;
use yii\helpers\Url;
use app\models\Uploads;
use yii\helpers\html;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "tracking".
 *
 * @property int $id
 * @property string $pname คำนำหน้า
 * @property string $fname ชื่อ
 * @property string $lname นามสกุล
 * @property string $affiliation สังกัด
 * @property int $position ขอกำหนดตำแหน่ง
 * @property string $position_type โดยวิธี
 * @property string $position_way วิธีที่
 * @property string $reader Reader
 * @property string $branch ในสาขาวิชา
 * @property int $branch_code รหัสสาขาวิชา
 * @property string|null $local_meeting_date วันประชุมคณะกรรมการประจำส่วนงาน
 * @property string|null $hr_getsubject_date วันที่กองทรัพยากรบุคคลรับเรื่อง
 * @property int|null $step1 ขั้นที่ 1 กองทรัพยากรบุคคลรับเรื่องจากคณะ/หน่วยงาน
 * @property string|null $step1_comment หมายเหตุ
 * @property int|null $step2 ขั้นที่ 2 นำเรื่องเสนอคณะกรรมการพิจารณาตำแหน่งทางวิชาการ เพื่อพิจารณารายละเอียดของผลงานทางวิชาการและรายชื่อผู้ทรงคุณวุฒิ
 * @property string|null $step2_comment หมายเหตุ
 * @property int|null $step3 ขั้นที่ 3 ติดต่อทาบทามคณะกรรมการผู้ทรงคุณวุฒิ เพื่อทำหน้าที่ประเมินผลงานทางวิชาการ
 * @property string|null $step3_comment หมายเหตุ
 * @property int|null $step4 ขั้นที่ 4 รอผลการทาบทามคณะกรรมการผู้ทรงคุณวุฒิทำหน้าที่ประเมินผลงานทางวิชาการ
 * @property string|null $step4_comment หมายเหตุ
 * @property int|null $step5 ขั้นที่ 5 ส่งผลงานให้ผู้ทรงคุณวุฒิประเมิน
 * @property string|null $step5_comment หมายเหตุ
 * @property int|null $step6 ขั้นที่ 6 ประชุมคณะกรรมการพิจารณาตำแหน่งทางวิชาการทุกวันพฤหัสบดีที่ 3 ของทุกเดือน
 * @property string|null $step6_comment หมายเหตุ
 * @property string|null $step6_date วันที่ประชุมคณะกรรมการพิจารณาตำแหน่งทางวิชาการ
 * @property int|null $step7 ขั้นที่ 7 นำเรื่องเสนอที่ประชุมสภามหาวิทยาลัย
 * @property string|null $step7_comment หมายเหตุ
 * @property string|null $step7_date วันที่ประชุมสภามหาวิทยาลัย
 * @property int|null $step8 ขั้นที่ 8 คำสั่งแต่งตั้งให้ดำรงตำแหน่งทางวิชาการ
 * @property string|null $step8_comment หมายเหตุ
 * @property int|null $success กระบวนขอตำแหน่งทางวิชาการเสร็จสิ้นแล้วหรือไม่
 */
class Tracking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const UPLOAD_FOLDER='uploads';

    public static function tableName()
    {
        return 'tracking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pname', 'fname', 'lname', 'affiliation', 'position', 'position_type', 'position_way',  'branch', 'branch_code'], 'required'],
            [['position', 'branch_code', 'step1', 'step2', 'step3', 'step4', 'step5', 'step6', 'step7', 'step8', 'success'], 'integer'],
            // [['reader'], 'string'],
            [['local_meeting_date', 'hr_getsubject_date', 'step6_date', 'step7_date','ref','reader'], 'safe'],
            [['pname', 'fname', 'lname', 'affiliation', 'position_type', 'position_way', 'branch', 'step1_comment', 'step2_comment', 'step3_comment', 'step4_comment', 'step5_comment', 'step6_comment', 'step7_comment', 'step8_comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pname' => 'คำนำหน้า',
            'fname' => 'ชื่อ',
            'lname' => 'นามสกุล',
            'affiliation' => 'สังกัด',
            'position' => 'ขอกำหนดตำแหน่ง',
            'position_type' => 'โดยวิธี',
            'position_way' => 'วิธีที่',
            'reader' => 'Reader',
            'branch' => 'ในสาขาวิชา',
            'branch_code' => 'รหัสสาขาวิชา',
            'local_meeting_date' => 'วันประชุมคณะกรรมการประจำส่วนงาน',
            'hr_getsubject_date' => 'วันที่กองทรัพยากรบุคคลรับเรื่อง',
            'step1' => 'ขั้นที่ 1 กองทรัพยากรบุคคลรับเรื่องจากคณะ/หน่วยงาน',
            'step1_comment' => 'หมายเหตุ',
            'step2' => 'ขั้นที่ 2 นำเรื่องเสนอคณะกรรมการพิจารณาตำแหน่งทางวิชาการ เพื่อพิจารณารายละเอียดของผลงานทางวิชาการและรายชื่อผู้ทรงคุณวุฒิ',
            'step2_comment' => 'หมายเหตุ',
            'step3' => 'ขั้นที่ 3 ติดต่อทาบทามคณะกรรมการผู้ทรงคุณวุฒิ เพื่อทำหน้าที่ประเมินผลงานทางวิชาการ',
            'step3_comment' => 'หมายเหตุ',
            'step4' => 'ขั้นที่ 4 รอผลการทาบทามคณะกรรมการผู้ทรงคุณวุฒิทำหน้าที่ประเมินผลงานทางวิชาการ',
            'step4_comment' => 'หมายเหตุ',
            'step5' => 'ขั้นที่ 5 ส่งผลงานให้ผู้ทรงคุณวุฒิประเมิน',
            'step5_comment' => 'หมายเหตุ',
            'step6' => 'ขั้นที่ 6 ประชุมคณะกรรมการพิจารณาตำแหน่งทางวิชาการทุกวันพฤหัสบดีที่ 3 ของทุกเดือน',
            'step6_comment' => 'หมายเหตุ',
            'step6_date' => 'วันที่ประชุมคณะกรรมการพิจารณาตำแหน่งทางวิชาการ',
            'step7' => 'ขั้นที่ 7 นำเรื่องเสนอที่ประชุมสภามหาวิทยาลัย',
            'step7_comment' => 'หมายเหตุ',
            'step7_date' => 'วันที่ประชุมสภามหาวิทยาลัย',
            'step8' => 'ขั้นที่ 8 คำสั่งแต่งตั้งให้ดำรงตำแหน่งทางวิชาการ',
            'step8_comment' => 'หมายเหตุ',
            'success' => 'กระบวนขอตำแหน่งทางวิชาการเสร็จสิ้นแล้วหรือไม่',
        ];
    }
    public function afterFind() {
        $this->reader = Json::decode($this->reader, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return parent::afterFind();
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->reader = Json::encode($this->reader, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

            return true;
        } else {
            return false;
        }
    }

    public function getPositionname() {
        return $this->hasOne(TrackingPosition::className(), ['id' => 'position']);
    }

    public function stepStatusView($id) {
        if($id){

            $data = StepStatus::find()->where(['id'=> $id])->one()->name;
            if(isset($data)){
          
                return $data;
            }else{
                return null;
            }
        }
    }

    public function stepStatusViewTimeline($id) {
        if($id){

            $data = StepStatus::find()->where(['id'=> $id])->one()->name;
            if(isset($data)){
                switch ($id) {
                    case 1:
                       return '<span class="time text-danger"><i class="fas fa-clock"></i> '.$data.'</span>';
                    break;
                case 2:
                    return '<span class="time text-warning"><i class="fas fa-clock"></i> '.$data.'</span>';


                    break;
                case 3:
                    return '<span class="time text-success"><i class="fas fa-check"></i> '.$data.'</span>';


                    break;
                    default:
                        # code...
                        break;
                }

                // return $data;
            }else{
                return null;
            }
        }
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
    

}