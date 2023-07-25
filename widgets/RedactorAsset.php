<?php
namespace lulubin\redactor\widgets;

class RedactorAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/lulubin/yii2-widget-redactor/assets';
    public $depends = ['yii\web\JqueryAsset'];

    public function init()
    {
        if (YII_DEBUG) {
            $this->js[] = 'redactor.js';
            $this->css[] = 'redactor.css';
        } else {
            $this->js[] = 'redactor.min.js';
            $this->css[] = 'redactor.min.css';
        }
    }
}