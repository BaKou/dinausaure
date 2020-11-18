<?php

include './dinosaure.php';

class Test{

    private  $nbTest;
    private  $nbSuccess;

    function __construct()
    {
        $this->nbTest = 0;
        $this->nbSuccess = 0;
    }

    public function execute($size, $mountain, $result, $desc = null)
    {
        $start = microtime(true);
        $val = paravent($size,$mountain);
        $memory_used = memory_get_usage() / 1024;
        $duration = number_format(microtime(true) - $start, 5);

        $this->nbTest++;

        if ($val !== $result){
            echo "test $this->nbTest FAILED: $desc, expected: $result and got $val <br/>";

        }else {
                echo "test $this->nbTest OK, duration: $duration sec, memory: $memory_used ko <br/>";
                $this->nbSuccess++;
            }
        }

    public function testExample(){
        $this->execute(10,'30 27 17 42 29 12 14 41 42 42',6, "Should be correct");
        $this->execute(10,'30 27 17 42 t z php 41 42 42',6, "Should be ok");
        $this->execute(10,'30 27 17 42 -10 12 14 41 -1 42',6, "Should get an error: incorrect number ");
        $this->execute(20000000,'30 27 17 42 12 14 41 42 42',6, "Should get an error: incorrect number ");
        $this->execute(10,'30 27 17 42 250000 12 14 41 42 42',6, "Should get an error: incorrect number ");
        $this->execute(-5,'30 27 17 42 25 12 14 41 42 42',6, "Should get an error: incorrect number ");
    }
}