<?php
    while($row = mysqli_fetch_assoc($query)){
        $output .= '
        <img id="myImg" class="image" src="php/images/'. $row['file'] .'" alt="">
        <div id="myModal" class="modal">
        <img class="modal-content" id="img01">
        <div id="caption"></div>
        </div>';
    }
?>