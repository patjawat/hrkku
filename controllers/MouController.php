<?php

namespace app\controllers;

use Yii;
use app\models\Mou;
use app\models\MouSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\html;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use \yii\web\Response;
use app\models\Uploads;
/**
 * MouController implements the CRUD actions for Mou model.
 */
class MouController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Mou models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MouSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 20];
        if(!Yii::$app->user->can('admin')){

        }else{

        }
        $dataProvider->query->andFilterWhere(['or',
        ['like', 'topic', $searchModel->q],
        // ['like', 'fullname', $searchModel->q],
        // ['like', 'email', $searchModel->q]

    ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mou model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Mou model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mou();

        if ($model->load(Yii::$app->request->post()) ) {


            $this->Uploads(false);

            if($model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(),10);
       }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Mou model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        list($initialPreview,$initialPreviewConfig) = $this->getInitialPreview($model->ref);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
             'initialPreview'=>$initialPreview,
             'initialPreviewConfig'=>$initialPreviewConfig
        ]);
    }

    /**
     * Deletes an existing Mou model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        //remove upload file & data
        $this->removeUploadDir($model->ref);
        Uploads::deleteAll(['ref'=>$model->ref]);

        $model->delete();

        return $this->redirect(['index']);
    }
    /**
     * Finds the Mou model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mou the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mou::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


/*|*********************************************************************************|
  |================================ Upload Ajax ====================================|
  |*********************************************************************************|*/

  public function actionUploadAjax(){
    $this->Uploads(true);
}

private function CreateDir($folderName){
 if($folderName != NULL){
     $basePath = Mou::getUploadPath();
     if(BaseFileHelper::createDirectory($basePath.$folderName,0777)){
         BaseFileHelper::createDirectory($basePath.$folderName.'/thumbnail',0777);
     }
 }
 return;
}

private function removeUploadDir($dir){
 BaseFileHelper::removeDirectory(Mou::getUploadPath().$dir);
}

private function Uploads($isAjax=false) {
      if (Yii::$app->request->isPost) {
         $images = UploadedFile::getInstancesByName('upload_ajax');
         if ($images) {

             if($isAjax===true){
                 $ref =Yii::$app->request->post('ref');
             }else{
                 $Mou = Yii::$app->request->post('Mou');
                 $ref = $Mou['ref'];
             }
            
             $this->CreateDir($ref);

             foreach ($images as $file){
                 $fileName       = $file->baseName . '.' . $file->extension;
                 $realFileName   = md5($file->baseName.time()) . '.' . $file->extension;
                 $savePath       = Mou::UPLOAD_FOLDER.'/'.$ref.'/'. $realFileName;
                 if($file->saveAs($savePath)){

                     if($this->isImage(Url::base(true).'/'.$savePath)){
                          $this->createThumbnail($ref,$realFileName);
                     }
                   
                     $model                  = new Uploads;
                     $model->ref             = $ref;
                     $model->file_name       = $fileName;
                     $model->real_filename   = $realFileName;
                     $model->save();

                     if($isAjax===true){
                        Yii::$app->response->format = Response::FORMAT_JSON;
                        return ['success' => 'true'];
                     }
                     
                 }else{
                     if($isAjax===true){
                        Yii::$app->response->format = Response::FORMAT_JSON;
                         return ['success'=>'false','eror'=>$file->error];
                     }
                 }
                 
             }
         }
     }
}

private function getInitialPreview($ref) {
     $datas = Uploads::find()->where(['ref'=>$ref])->all();
     $initialPreview = [];
     $initialPreviewConfig = [];
     foreach ($datas as $key => $value) {
         array_push($initialPreview, $this->getTemplatePreview($value));
         array_push($initialPreviewConfig, [
             'caption'=> $value->file_name,
             'width'  => '120px',
             'url'    => Url::to(['/mou/deletefile-ajax']),
             'key'    => $value->upload_id
         ]);
     }
     return  [$initialPreview,$initialPreviewConfig];
}

public function isImage($filePath){
     return @is_array(getimagesize($filePath)) ? true : false;
}

private function getTemplatePreview(Uploads $model){     
     $filePath = Mou::getUploadUrl().$model->ref.'/'.$model->real_filename;
     $isImage  = $this->isImage($filePath);
    //  if($isImage){
         $file = Html::img($filePath,['class'=>'file-preview-image', 'alt'=>$model->file_name, 'title'=>$model->file_name]);
    //  }else{
    //      $file =  "<div class='file-preview-other'> " .
    //               "<h2><i class='glyphicon glyphicon-file'></i></h2>" .
    //               "</div>";
    //  }
     return $file;
}

private function createThumbnail($folderName,$fileName,$width=250){
$uploadPath   = Mou::getUploadPath().'/'.$folderName.'/'; 
$file         = $uploadPath.$fileName;
$image        = Yii::$app->image->load($file);
$image->resize($width);
$image->save($uploadPath.'thumbnail/'.$fileName);
return;
}

public function actionDeletefileAjax(){
    Yii::$app->response->format = Response::FORMAT_JSON;
 $model = Uploads::findOne(Yii::$app->request->post('key'));
 if($model!==NULL){
     $filename  = Mou::getUploadPath().$model->ref.'/'.$model->real_filename;
     $thumbnail = Mou::getUploadPath().$model->ref.'/'.$model->real_filename;
     if($model->delete()){
         @unlink($filename);
         @unlink($thumbnail);
         return ['success'=>true];
     }else{
        return ['success'=>false];
     }
 }else{
   return ['success'=>false];  
 }
}

}
