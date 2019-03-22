<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 23.03.2019
 * Time: 1:36
 */

namespace common\services;


interface EmailServiceInterface
{
  public function send($to, $subj, $views, $data);
}