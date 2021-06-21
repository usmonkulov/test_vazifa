<?php

namespace backend\controllers;

use Yii;
use common\models\Nomzod;
use backend\models\NomzodSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NomzodController implements the CRUD actions for Nomzod model.
 */
class NomzodController extends AppController
{

    /**
     * Lists all Nomzod models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NomzodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Nomzod model.
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
     * Creates a new Nomzod model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Nomzod();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Nomzod model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Nomzod model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Nomzod model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Nomzod the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nomzod::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionActivate($id){
        $activ = Nomzod::findOne($id);
        if (++$activ->status > 4) $activ->status = 1;
        $activ->save();
        return $this->redirect('index');
    }

    public function actionActiv($id){
        $activ = Nomzod::findOne($id);
        if (++$activ->status > 4) $activ->status = 1;
        $activ->save();
        $model = $this->findModel($id);
        return $this->redirect(['view', 'id' => $model->id]);
    }

    public function actionHired($id){
        $hired = Nomzod::findOne($id);
        if (++$hired->hired > 1) $hired->hired = 0;
        $hired->save();
        return $this->redirect('index');
    }

    public function actionHireda($id){
        $hired = Nomzod::findOne($id);
        if (++$hired->hired > 1) $hired->hired = 0;
        $hired->save();
        $model = $this->findModel($id);
        return $this->redirect(['view', 'id' => $model->id]);
    }
}
