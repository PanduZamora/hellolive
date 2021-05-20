<?php
//define("TOEMAIL", "cs@voffice.com.my");

define("TOEMAIL", "cs@voffice.com.my");

//reduce eway price by %3

define( 'EWAYADJUST', '0.03'); 

define( 'GST', '0.06'); 

define ("BASEORDERURL", "http://thebizclub.com.my/");


// grab exchange rates vs aud

define ("DBHOST", "imagination.flexihostings.net");

define ("DBUSER", "flexi_xrates");

define ("DBNAME", "flexi_xrates");

define ("DBPASS", "Re4upUSt");

define("LCURRENCY", "RM");

define("CURRENCY", "RM");


// MYR exchange

define ("MYREXRATESQLSTMT", "SELECT * FROM myexrates ORDER BY id DESC LIMIT 1");


// Set Pricing

if($_POST['membership']=="Ordinary")
define("PRICE", "288");

if($_POST['membership']=="Gold")
define("PRICE", "699");

?>

