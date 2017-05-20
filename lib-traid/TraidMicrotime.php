<?php
trait TraidMicrotime {
     
    static public function times($time){
      return ((float)$time);
    }
    
    static public function rond($start, $stop){  
     return round(($stop - $start), 5);
    }
}
