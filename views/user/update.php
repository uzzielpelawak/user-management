<?php

use uzzielpelawak\modules\UserManagement\models\User;
use uzzielpelawak\extensions\BootstrapSwitch\BootstrapSwitch;
use uzzielpelawak\modules\UserManagement\UserManagementModule;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var uzzielpelawak\modules\UserManagement\models\User $model
 */

$this->title = UserManagementModule::t('back', 'Editing user: ') . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => UserManagementModule::t('back', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = UserManagementModule::t('back', 'Editing');
?>
<div class="user-update">

	<div class="card">
		<div class="card-body">

			<?= $this->render('_form', compact('model')) ?>
		</div>
	</div>

</div>