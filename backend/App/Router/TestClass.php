<?php


namespace App\Router;


class TestClass {
    /**
     * @return mixed
     */
    public function getTest() {
        return $this->test;
    }

    /**
     * @param mixed $test
     */
    public function setTest($test) {
        $this->test = $test;
    }

    private $test;
}