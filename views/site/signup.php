<h1>Registration</h1>
<?php
    use \yii\widgets\ActiveForm;
    use yii\helpers\Html;

?>
<?php
    $form = ActiveForm::begin(['class' => 'form-horizontal']);
?>
<?= $form->field($model, 'username')->textInput(['autofocus' => true]); ?>

<?= $form->field($model, 'email')->textInput(['autofocus' => true]); ?>

<?= $form->field($model, 'password_hash')->passwordInput(); ?>
<div>
    <button type="submit" class="btn btn-primary">Register</button>
</div>
<?php
    ActiveForm::end();
?>
