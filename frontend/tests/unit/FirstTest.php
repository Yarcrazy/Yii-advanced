<?php namespace frontend\tests;

use frontend\models\ContactForm;

class FirstTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testRun()
    {
      $bool = true;
      $this->assertTrue($bool);

      $a = 123123;
      $this->assertEquals(123123, $a);
      $this->assertLessThan(999999, $a);

      $model = new ContactForm();
      $name = 'xxx';
      $email = 'qwe@bc.com';
      $model->setAttributes(['name' => $name, 'email' => $email]);
      expect('set name', $model->name)->equals($name);
      expect('set email', $model->email)->equals($email);

      $array = [
        'key' => 'value',
      ];
      $this->assertArrayHasKey('key', $array);
    }
}