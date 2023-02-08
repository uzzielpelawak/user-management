<?php
/**
 *
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var uzzielpelawak\modules\UserManagement\models\rbacDB\Permission $model
 */

use uzzielpelawak\modules\UserManagement\UserManagementModule;

$this->title = UserManagementModule::t('back', 'Permission creation');
$this->params['breadcrumbs'][] = ['label' => UserManagementModule::t('back', 'Permissions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
	<div class="card-body">
		<?= $this->render('_form', [
			'model'=>$model,
		]) ?>
	</div>
</div>