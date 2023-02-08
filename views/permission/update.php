<?php
/**
 * @var yii\widgets\ActiveForm $form
 * @var uzzielpelawak\modules\UserManagement\models\rbacDB\Permission $model
 */

use uzzielpelawak\modules\UserManagement\UserManagementModule;

$this->title = UserManagementModule::t('back', 'Editing permission: ') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => UserManagementModule::t('back', 'Permissions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card card-default">
	<div class="panel-body">
		<?= $this->render('_form', [
			'model'=>$model,
		]) ?>
	</div>
</div>