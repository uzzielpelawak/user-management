<?php
/**
 * @var yii\widgets\ActiveForm $form
 * @var uzzielpelawak\modules\UserManagement\models\rbacDB\Role $model
 */

use uzzielpelawak\modules\UserManagement\UserManagementModule;

$this->title = UserManagementModule::t('back', 'Editing role: ') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => UserManagementModule::t('back', 'Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card">
	<div class="card-body">
		<?= $this->render('_form', [
			'model'=>$model,
		]) ?>
	</div>
</div>