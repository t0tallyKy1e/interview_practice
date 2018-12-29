<?php
    $a = 199;
    $b = 2137853449;
    $c = 1;
    $d = 2;
    $e = 213785344;
    $f = 2000;
    
    check_if_passed("a", check_if_prime($a), true);
    check_if_passed("b", check_if_prime($b), false);
    check_if_passed("c", check_if_prime($c), true);
    check_if_passed("d", check_if_prime($d), true);
    check_if_passed("e", check_if_prime($e), false);
    check_if_passed("f", check_if_prime($f), false);

    function check_if_prime($num) {
        $factors = 0;

        for($i = 1; $i <= $num && $factors <= 2; ++$i) {
            if($num % $i == 0) {
                if($num / $i == $i) {
                    $factors+=2;
                } else {
                    $factors++;
                }
            }
        }

        if($factors == 2) {
            return true;
        } else {
            return false;
        }
    }

    function check_if_passed($test_letter, $test, $target_result) {
        if($test == $target_result) {
            print "test $test_letter: passed<br>";
        } else {
            print "test $test_letter: failed [result = $test]<br>";
        }
    }
?>