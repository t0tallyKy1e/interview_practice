<?php
    print "<h1>Find Binary Gap</h1>";
    print "<hr/>";

    if(find_binary_gap(1041) == 5) {
        print "test #1 passed<br>";
    }

    if(find_binary_gap(0) == 0) {
        print "test #2 passed<br>";
    }

    if(find_binary_gap(1) == 0) {
        print "test #3 passed<br>";
    }

    if(find_binary_gap(32) == 0) {
        print "test #4 passed<br>";
    }

    if(find_binary_gap(1610612737) == 28) {
        print "test #5 passed<br>";
    }

    function find_binary_gap($N) {
        $binary_gap = 0;
        
        $binary_string = decbin($N);
        $binary_string_array = str_split($binary_string);
        $binary_string_len = count($binary_string_array);
        
        if($binary_string_len > 2 || $N <= 2147483647) {
            $temp_binary_gap = 0;
            foreach($binary_string_array as $bit) {
                if($bit == '1') {
                    if($temp_binary_gap > $binary_gap) {
                        $binary_gap = $temp_binary_gap;
                    }
                    
                    $temp_binary_gap = 0;
                } else {
                    $temp_binary_gap += 1;
                }
            }
        }
        
        return $binary_gap;
    }
?>