<?php
    print "<h1>Find Binary Gap</h1>";
    print "<hr/>";

    if(find_binary_gap(1041) == 5) {
        print "test #1 passed";
    }

    function find_binary_gap($N) {
        $binary_gap = 0;
        
        $binary_string = decbin($N);
        $binary_string_array = str_split($binary_string);
        
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
        
        return $binary_gap;
    }
?>