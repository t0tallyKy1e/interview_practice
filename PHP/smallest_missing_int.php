<?php
    $a = [1, 3, 6, 4, 1, 2];
    if(solution($a) == 5) {
        print "test a: passed<br>";
    }

    $b = [-1, -3];
    if(solution($b) == 1) {
        print "test b: passed<br>";
    }

    $c = [1, 2, 3];
    if(solution($c) == 4) {
        print "test c: passed<br>";
    } else {
        print "test c: failed [".solution($c)."]<br>";
    }

    function solution($A) {
        $maximum = 1000000;
        $largest = find_largest($A);

        if($largest < 1) {
            $smallest = 1;
        } else {
            $array_of_nums = array_fill(0, $largest + 1, null);
            $array_of_nums = figure_out_included_numbers($A, $array_of_nums);

            $smallest = null;
            $found_smallest = false;
            $array_size = count($array_of_nums);
        
            for($i = 1; $i < $array_size && $found_smallest == false; ++$i) {
                if(!isset($array_of_nums[$i])) {
                    $smallest = $i;
                    $found_smallest = true;
                }
            }

            if(!$found_smallest) {
                $smallest = $array_size;
            }
        }
        
        return $smallest;
    }

    function figure_out_included_numbers($A, $array_of_nums) {
        $array_size = count($A);
        sort($A);
        
        for($i = 0; $i < $array_size; ++$i) {
            if($A[$i] > 0) {
                $array_of_nums[$A[$i]] = $A[$i];
            }
        }
        
        return $array_of_nums;
    }

    function find_largest($A) {
        sort($A);
        $array_size = count($A);
        
        return $A[$array_size - 1];
    }

    function print_array($array) {
        $array_size = count($array);
        print("[");
        for($i = 0; $i < $array_size; ++$i) {
            print($array[$i] . ", ");
        }
        print("]");
    }
?>