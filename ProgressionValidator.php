<?php
/**
 * Class ProgressionValidator
 */
class ProgressionValidator
{
  /**
   * @var array
   */
  private $progression;

  /**
   * @param $string
   */
  public function __construct($string = null)
  {
    if( isset($string) )
      $this->setProgression($string);
  }

  /**
   * @param $string
   */
  public function setProgression($string)
  {
    $this->prepare($string);
  }

  /**
   * a[n] = a[n-1] + d
   *
   * @return bool
   */
  public function isArithmetical()
  {
    if( count($this->progression) < 2 )
      return false;

    $d = $this->progression[1] - $this->progression[0];

    for($i = 1; $i < count($this->progression); $i++)
      if( $this->progression[$i] !== ($this->progression[$i - 1] + $d) )
        return false;

    return true;
  }

  /**
   * b[n] = b[n-1] * q
   *
   * @return bool
   */
  public function isGeometrical()
  {
    if( count($this->progression) < 2 || $this->progression[0] === 0 || $this->progression[1] === 0)
      return false;

    $q = $this->progression[1] / $this->progression[0];

    for($i = 1; $i < count($this->progression); $i++)
      if( $this->progression[$i] !== ($this->progression[$i - 1] * $q) )
        return false;

    return true;
  }

  /**
   * @param $string
   */
  private function prepare($string)
  {
    $this->progression = explode(',', trim($string, ','));

    $this->progression = array_map(function($item){
      return intval(trim($item));
    }, $this->progression);
  }
}