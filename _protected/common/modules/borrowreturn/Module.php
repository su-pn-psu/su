<?php

namespace backend\modules\borrowreturn;

/**
 * borrowreturn module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\borrowreturn\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
		
		$this->params['adminModule'] = [5,18];
		$this->layout = 'borrowreturn';
		$this->params['ModuleVers'] = '1.0.0';
		$this->params['title'] = 'stdunion borrow-return app';
        // custom initialization code goes here
    }
}
