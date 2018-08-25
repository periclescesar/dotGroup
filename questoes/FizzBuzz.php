<?php
/**
 * Created by PhpStorm.
 * User: pericles
 * Date: 25/08/18
 * Time: 00:34
 */

class FizzBuzz
{
    private $multFizz = 3;
    private $multBuzz = 5;

    /**
     * FizzBuzz constructor.
     * @param $multFizz integer multiplos para Fizz
     * @param $multBuzz integer multiplos para Buzz
     */
    public function __construct($multFizz, $multBuzz)
    {
        $this->multFizz = $multFizz;
        $this->multBuzz = $multBuzz;
    }

    /**
     * @param $num int
     * @param $mult int
     * @return bool
     */
    public function isMultpleOf($num, $mult)
    {
        return $num % $mult === 0;
    }

    /**
     * @param $num int
     * @return bool
     */
    public function isFizz($num)
    {
        return $this->isMultpleOf($num, $this->multFizz);
    }

    /**
     * @param $num int
     * @return bool
     */
    public function isBuzz($num)
    {
        return $this->isMultpleOf($num, $this->multBuzz);
    }

    /**
     * @param $num int
     * @return bool
     */
    public function isFizzBuzz($num)
    {
        return $this->isFizz($num) && $this->isBuzz($num);
    }

    /**
     * @param $num int
     * @return string
     */
    public function toString($num)
    {
        if ($this->isFizzBuzz($num)) {
            return 'FizzBuzz';
        }

        if ($this->isFizz($num)) {
            return 'Fizz';
        }

        if ($this->isBuzz($num)) {
            return 'Buzz';
        }

        return $num;
    }

    public function makeRange($length)
    {
        $range = array();
        for ($i = 1; $i <= $length; $i++) {
            $range[] = $this->toString($i);
        }

        return $range;
    }
}

if (php_sapi_name() === "cli") {
    $fizzBuzzObj = new FizzBuzz(3, 5);

    echo implode(PHP_EOL, $fizzBuzzObj->makeRange(100));
}