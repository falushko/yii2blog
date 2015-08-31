<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo '<div class="form">';

$form = ActiveForm::begin([
    'action' => '/?r=site/registrate',
    'id' => 'register-form',
    'options' => ['class' => 'form-horizontal'],

]) ?>
<?= $form->field($model, 'name')->label('Имя') ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
<?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::classname(), [

]) ?>
    <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end() ?>
<?php
if(!empty($message)){
   echo  "<div class='alert alert-success' id='success' role='alert'>{$message}</div>";
}
?>

</div>
