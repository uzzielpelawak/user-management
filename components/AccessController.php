<?php

namespace webvimark\modules\UserManagement\components;

use webvimark\modules\UserManagement\models\rbacDB\Route;
use webvimark\modules\UserManagement\models\User;
use yii\base\Action;
use Yii;
use yii\base\Module;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;

class AccessController extends Controller
{
	/**
	 * Full url like '/site/index' instead of '' or '/user-management/auth/login' instead of '/login'
	 *
	 * @var string
	 */
	public $currentFullRoute;

	/**
	 * @inheritdoc
	 */
	public function beforeAction($action)
	{
		$this->calculateFullRoute($action);

		if ( !$this->beforeControllerAction($action) )
		{
			return false;
		}

		return parent::beforeAction($action);
	}

	/**
	 * Make full url like '/site/index' instead of '' or '/user-management/auth/login' instead of '/login'
	 *
	 * @param Action $action
	 */
	protected function calculateFullRoute($action)
	{
		$parts[] = $action->id;
		$parts[] = $action->controller->id;

		$fullParts = $this->prependModulesRecursive($action->controller->module, $parts);

		$this->currentFullRoute = '/' . implode('/', array_reverse($fullParts));
	}

	/**
	 * @param Module $module
	 * @param array $parts
	 *
	 * @return array
	 */
	protected function prependModulesRecursive($module, $parts)
	{
		if ( $module->module )
		{
			$parts[] = $module->id;

			return $this->prependModulesRecursive($module->module, $parts);
		}

		return $parts;
	}


	/**
	 * Check if user has access to current route
	 *
	 * @param Action $action the action to be executed.
	 *
	 * @return boolean whether the action should continue to be executed.
	 */
	public function beforeControllerAction($action)
	{
		if ( Route::isFreeAccess($this->currentFullRoute, $action) )
		{
			return true;
		}

		if ( Yii::$app->user->isGuest )
		{
			$this->denyAccess();
		}

		// If user has been deleted, then destroy session and redirect to home page
		if ( ! Yii::$app->user->isGuest AND Yii::$app->user->identity === null )
		{
			Yii::$app->getSession()->destroy();
			$this->denyAccess();
		}

		// Superadmin owns everyone
		if ( Yii::$app->user->isSuperadmin )
		{
			return true;
		}

		if ( Yii::$app->user->identity->status != User::STATUS_ACTIVE)
		{
			Yii::$app->user->logout();
			Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());
		}

		if ( User::canRoute($this->currentFullRoute) )
		{
			return true;
		}

		$this->denyAccess();
	}


	/**
	 * Denies the access of the user.
	 * The default implementation will redirect the user to the login page if he is a guest;
	 * if the user is already logged, a 403 HTTP exception will be thrown.
	 *
	 * @throws ForbiddenHttpException if the user is already logged in.
	 */
	protected function denyAccess()
	{
		if ( Yii::$app->user->getIsGuest() )
		{
			Yii::$app->user->loginRequired();
		}
		else
		{
			throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
		}
	}

} 