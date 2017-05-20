<?php

trait SuperError {
    
    
    public function error($param) {
            ?>
               <script>
                var param ='<?php echo $param; ?>'; 
                alert(param);
                </script>
                <?php
                exit;
        return ;
    }
    
     public function error1($param) {
            ?>
               <script>
                var param ='<?php echo $param; ?>'; 
                alert(param);
                </script>
                <?php
        return ;
    }
    
}
