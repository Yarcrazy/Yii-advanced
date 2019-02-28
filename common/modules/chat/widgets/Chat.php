<?php
namespace common\modules\chat\widgets;

use common\modules\chat\assets\ChatAsset;
use yii\bootstrap\Widget;

class Chat extends Widget
{
  public $port = 8081;

  public function init()
  {

  }

  public function run()
  {
    $this->view->registerJsVar('wsPort', $this->port);
    // $this->view->registerJsFile('js/chat.js');
    ChatAsset::register($this->view);
    return $this->render('chat');
  }
}