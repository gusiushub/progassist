<?php
use \yii\widgets\ActiveForm;
?>


<?php
$forma = ActiveForm::begin(['class'=>'form-horizontal']);
?>
<h1>Авторизация</h1>
<?= $forma->field($login_model, 'email')->textInput() ?>
<?= $forma->field($login_model, 'password')->passwordInput() ?>
<div>
    <button type="submit" class="btn btn-success">Войти</button>
</div>

<?php
ActiveForm::end();
?>
