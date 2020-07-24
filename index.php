<?php

		//interface 
        interface square
        {
            public function calculate();
        }


        
        interface cube
        {
            public function calculate();
        }
        
        
        
        class Digit implements square
        {
            
            
            public function calculate()
            {
                echo "square";
                // $square = $s * $s;
                // return $square;
            }
            
            
            public static function x()
            {
                echo "Cube";
                // $cube = $s * $s * $s;
                // return $cube;
            }
            
            
        }
        
        
        $obj = new Digit;
        $obj.calculate();
        
    

?>