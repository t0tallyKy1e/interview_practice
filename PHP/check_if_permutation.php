<?php
    $a = [4, 1, 3, 2];
    if(solution($a) == 1) {
        print "test a: passed <br>";
    } else {
        print "test a: failed : ". solution($a) ."<br>";
    }

    $b = [4, 1, 3];
    if(solution($b) == 0) {
        print "test b: passed <br>";
    } else {
        print "test b: failed: ". solution($b) ."<br>";
    }

    $c = [4, 4, 4, 4];
    if(solution($b) == 0) {
        print "test c: passed <br>";
    } else {
        print "test c: failed: ". solution($c) ."<br>";
    }

    function solution($A) {
        sort($A); // O(nlgn)
        $arr_size = count($A);
        
        $is_permutation = 0;
        
        if(check_for_doubles($A) == 0) {
            if($A[0] == 1) { // check for 1
                if($A[$arr_size - 1] == $arr_size) { // check for n
                    $is_permutation = 1;
                }
            }
        }
        
        return $is_permutation;
    }
    
    function check_for_doubles($A) {
        $arr_size = count($A);
        $found_double = 0;
        
        for($i = 1; $i < $arr_size && $found_double == 0; ++$i) {
            if($A[$i] == $A[$i - 1]) {
                $found_double = 1;
            }
        }
        
        return $found_double;
    }

    function print_array($array) {
        $array_size = count($array);
        print("[");
        for($i = 0; $i < $array_size; ++$i) {
            print($array[$i] . ", ");
        }
        print("] <br>");
    }
?>
    
