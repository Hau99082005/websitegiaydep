<?php 
 include 'inc/database.php';
 _header('Đăng nhập');
 _navbar();
 ob_start();
 login();
 _footer();

?>