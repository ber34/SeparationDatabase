<?php

class ClassMicrotime {
use TraidMicrotime;

static public function view($start, $stop){
/*
* return 'Start='.self::times($start).'<br> Stop='.self::times($stop)
 .'<br> Strona została wygenerowana='.self::rond(self::times($start), self::times($stop)); 
*/ 
return '<br> Strona została wygenerowana  '
    .self::rond(self::times($start), self::times($stop))." sek"; 
   
}
}
