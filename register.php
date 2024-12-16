<?php 
 include 'inc/database.php';
 _header('Đăng ký');
 _navbar();
 ob_start();
 register();
 _footer();
?>