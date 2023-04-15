<?php

use frontend\models\Employee;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use Yii\helpers\ArrayHelper;
use frontend\models\Department;
/** @var yii\web\View $this */
/** @var frontend\models\EmployeeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
$branch = ArrayHelper::map(Department::find()->all(),'id','department');



?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            [
                'attribute'=>'department_id',
                'value'=>function($model){
                    return $model->department->department;
                },
                'filter'=>$branch
            ],
            [
                'attribute'=>'department_name',
                'value'=>function($model){
                    return $model->department->department;
                }
            ],
          
         
            // [
            //     'attribute'=>'department_id',
            //     'value'=>function($model)use($branch){
            //         return $branch[$model->department_id];
            //     }
            // ],
          
            'emp_id',
            'contact',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Employee $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                ],
        ],
    ]); ?>


</div>
