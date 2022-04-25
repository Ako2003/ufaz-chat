<?php
    while($row = mysqli_fetch_assoc($query)){
        $output .= '
        <img class="image" src="php/images/'. $row['file'] .'" alt="">';
    }
?>