<?php 
  class Database {
    static $conn;
    public static function getConnection() {
      if(self::$conn == null)
       return new mysqli("localhost","root", "", "shoes");
      return null;
    }
    public static function query($s) {
      return self::getConnection()->query($s);
    }
  }


?>