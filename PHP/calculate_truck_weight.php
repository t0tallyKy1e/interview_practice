<?php
    print "<h1>Calculate Truck Weight</h1>";
    print "<hr/>";

    if(calculate_truck_weight("+6b25 +50 -20 +9b10") == 270) {
        print("test #1 passed");
    }

    function calculate_truck_weight($string) {
        $parsed_string = explode(" ", $string);
        $weight = 0;

        foreach($parsed_string as $box) {
            if(strpos($box, "b")) {
                $num_boxes_and_weight = explode("b", $box);
                $weight += ($num_boxes_and_weight[0] * $num_boxes_and_weight[1]);
            } else {
                $weight += $box;
            }
        }

        return $weight;
    }
?>