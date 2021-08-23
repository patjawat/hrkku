<?php

namespace app\modules\hradmin\models;

use Yii;

/**
 * This is the model class for table "reader".
 *
 * @property int $id
 * @property string $sex เพศ
 * @property string $fname ชื่อ
 * @property string $lname นามสกุล
 * @property string $position ตำแหน่ง
 * @property string $major สาขาวิชา
 * @property string $affiliation สังกัด
 * @property string $contact ที่อยู่
 * @property string|null $email Email
 * @property string|null $phone เบอร์โทร
 */
class Reader extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $q;
    public static function tableName()
    {
        return 'reader';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sex', 'fname', 'lname', 'position', 'major', 'affiliation', 'contact'], 'required'],
            [['sex', 'fname', 'lname', 'position', 'major', 'affiliation', 'contact', 'email', 'phone','q'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sex' => 'เพศ',
            'fname' => 'ชื่อ',
            'lname' => 'นามสกุล',
            'position' => 'ตำแหน่ง',
            'major' => 'สาขาวิชา',
            'affiliation' => 'สังกัด',
            'contact' => 'ที่อยู่',
            'email' => 'Email',
            'phone' => 'เบอร์โทร',
        ];
    }
}
