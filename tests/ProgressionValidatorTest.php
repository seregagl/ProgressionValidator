<?php
require_once(dirname(__FILE__).'/../ProgressionValidator.php');

/**
 * Class ProgressionValidatorTest
 */
class ProgressionValidatorTest extends PHPUnit\Framework\TestCase
{
  public function testArithmeticalProgression()
  {
    $validator = new ProgressionValidator();

    $validator->setProgression('1');
    $this->assertEquals(false, $validator->isArithmetical());

    $validator->setProgression('1,3,5,');
    $this->assertEquals(true, $validator->isArithmetical());

    $validator->setProgression('1,3,5,9');
    $this->assertEquals(false, $validator->isArithmetical());
  }

  public function testGeometricalProgression()
  {
    $validator = new ProgressionValidator();

    $validator->setProgression('1');
    $this->assertEquals(false, $validator->isGeometrical());

    $validator->setProgression('0,1');
    $this->assertEquals(false, $validator->isGeometrical());

    $validator->setProgression('1,0');
    $this->assertEquals(false, $validator->isGeometrical());

    $validator->setProgression('1,3,5,');
    $this->assertEquals(false, $validator->isGeometrical());

    $validator->setProgression('1,2,4,8');
    $this->assertEquals(true, $validator->isGeometrical());
  }
}