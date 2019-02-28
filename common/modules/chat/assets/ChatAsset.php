<?php

namespace common\modules\chat\assets;

use yii\web\AssetBundle;

class ChatAsset extends AssetBundle
{
  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $css = [
    'css/site.css',
  ];
  public $js = [
    'js/chat.js'
  ];
  public $depends = [
    'yii\web\YiiAsset',
    'yii\bootstrap\BootstrapAsset',
  ];
}