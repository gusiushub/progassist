<?php
use \yii\widgets\ActiveForm;
?>

<?php
$form = ActiveForm::begin(['class'=>'form-horizontal']);
?>
<h1>Регистрация</h1>
<?= $form->field($model, 'email')->textInput(['autofocus'=>true]) ?>
<?= $form->field($model, 'username')->textInput() ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<div>
    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</div>
<?php
ActiveForm::end();
?>
