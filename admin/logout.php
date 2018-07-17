<?php
session_start();
session_destroy();
echo "<script>alert('data telah logout')</script>";
echo '<meta http-equiv="refresh" content=1;url="./">';

?>