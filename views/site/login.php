<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo '<div class="form">';

$form = ActiveForm::begin([
    'action' => '/?r=site/login',
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],

]) ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

<div class="form-group">
    <?= Html::submitButton('Вход', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end() ?>

<?php
if (!empty($message))
    echo "<div class='alert alert-success' id='success' role='alert'>{$message}</div>";
?>

</div>
