<?php
namespace console\controllers;

use yii\console\Controller;
use yii\console\ExitCode;


/**
 * Site controller
 */
class HelloController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->stdout('Hello, console!'.PHP_EOL);
        return ExitCode::OK;
    }

}
