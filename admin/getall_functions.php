<?php 
        function update($data,$table,$where){ 
                foreach ($data as $coloum => $value) 
        { 
        $update=("UPDATE $table SET $coloum = $value WHERE id= '$where'"); 
                //echo $update; 
                mysqli_query($GLOBALS['connect'],$update); 
        } 
                return true; 
        }
?>