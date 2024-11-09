<?php
session_start();
session_destroy();
echo "<script>location.href='../index.php?msg=0'</script>";


?>