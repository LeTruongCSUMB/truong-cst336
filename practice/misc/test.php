<?php
    echo '<table>';
    for($d = 1; $d < 32; $d++){
        if($counter++ == 0) {
            echo '<tr>';
        }if($counter < 8){
            echo '<td align="center">' . $d . '</td>';
        }else if($counter == 8){
            echo '<td align="center">' . $d . '</td>';
            echo '</tr>';
            $counter = 0;
        }
    }
    echo '</table>';
?>