<?php

namespace backend\controllers;

use yii\web\Controller;

class TestController extends Controller{
    public function actionIndex(){
        echo time();
    }
}