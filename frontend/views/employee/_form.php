<?php

use frontend\models\Department;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Employee $model */
/** @var yii\widgets\ActiveForm $form */
$branch = ArrayHelper::map(Department::find()->all(),'id','department');
// echo "<pre>";
// var_dump($branch);
// die

?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_id')->dropDownList($branch,['prompt'=>'select department']) ?>

    <?= $form->field($model, 'emp_id')->textInput() ?>

    <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
