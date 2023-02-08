<?php

namespace uzzielpelawak\modules\UserManagement\controllers;

use Yii;
use uzzielpelawak\modules\UserManagement\models\UserVisitLog;
use uzzielpelawak\modules\UserManagement\models\search\UserVisitLogSearch;
use uzzielpelawak\components\AdminDefaultController;

/**
 * UserVisitLogController implements the CRUD actions for UserVisitLog model.
 */
class UserVisitLogController extends AdminDefaultController
{
	/**
	 * @var UserVisitLog
	 */
	public $modelClass = 'uzzielpelawak\modules\UserManagement\models\UserVisitLog';

	/**
	 * @var UserVisitLogSearch
	 */
	public $modelSearchClass = 'uzzielpelawak\modules\UserManagement\models\search\UserVisitLogSearch';

	public $enableOnlyActions = ['index', 'view', 'grid-page-size'];
}
