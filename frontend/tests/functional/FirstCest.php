<?php namespace frontend\tests\functional;

use Codeception\Example;
use frontend\tests\FunctionalTester;

class FirstCest
{
  public function _before(FunctionalTester $I)
  {
  }

  /**
   * @param FunctionalTester $I
   * @dataProvider pageProvider
   */
  public function tryRun(FunctionalTester $I, Example $data)
  {
    $I->amOnRoute($data['url']);
    $I->see($data['menu'], 'li.active');
  }

  protected function pageProvider()
  {
    return [
      ['url' => 'site/index', 'menu' => 'Home'],
      ['url' => 'site/about', 'menu' => 'About'],
      ['url' => 'site/contact', 'menu' => 'Contact'],
      ['url' => 'site/signup', 'menu' => 'Signup'],
      ['url' => 'site/login', 'menu' => 'Login'],
    ];
  }
}
