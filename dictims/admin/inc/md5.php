<?php
function md5_str($str) {
    return substr(md5($str), 8, 16);
}
?>
