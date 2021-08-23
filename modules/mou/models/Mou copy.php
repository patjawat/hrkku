<?php

namespace app\modules\mou\models;

use Yii;
use yii\helpers\Url;
use app\models\Uploads;
/**
 * This is the model class for table "mou".
 *
 * @property int $id
 * @property string|null $ref
 * @property int|null $department
 * @property string|null $topic
 * @property string|null $phone
 * @property string|null $date_start
 * @property string|null $date_end
 * @property string|null $results
 * @property string|null $level
 * @property int|null $create_by
 * @property int|null $update_by
 * @property string $updated_at
 * @property string $created_at
 */
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department', 'create_by', 'update_by'], 'integer'],
            [['date_start', 'date_end', 'updated_at', 'created_at'], 'safe'],
            [['ref', 'topic', 'phone', 'results', 'level'], 'string', 'max' => 255],
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
            'department' => 'Department',
            'topic' => 'Topic',
            'phone' => 'Phone',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'results' => 'Results',
            'level' => 'พิรณาภายใน',
            'create_by' => 'Create By',
            'update_by' => 'Update By',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
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
}
