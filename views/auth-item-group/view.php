<?php

use uzzielpelawak\modules\UserManagement\UserManagementModule;
use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var uzzielpelawak\modules\UserManagement\models\rbacDB\AuthItemGroup $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => UserManagementModule::t('back', 'Permission groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-group-view">

	<div class="card">
		<div class="card-body">
			<p>
				<?= Html::a(UserManagementModule::t('back', 'Edit'), ['update', 'id' => $model->code], ['class' => 'btn btn-sm btn-primary']) ?>
				<?= Html::a(UserManagementModule::t('back', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
				<?= Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->code], [
					'class' => 'btn btn-sm btn-danger pull-right',
					'data' => [
						'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
						'method' => 'post',
					],
				]) ?>
			</p>

			<?= DetailView::widget([
				'model' => $model,
				'attributes' => [
					'name',
					'code',
					'created_at:datetime',
					'updated_at:datetime',
				],
			]) ?>

		</div>
	</div>
</div>
