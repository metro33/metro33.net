<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Kirill Cherkashin
 * Date: 3/12/12
 * Time: 10:51 PM
 */



$query = $_SERVER["QUERY_STRING"];
if( !preg_match( "/^[a-z0-9]+$/", $query ) ) {
	die( "404" );
}
$file_name = $query . ".html";
if( !file_exists( $file_name )){
	die( "404" );
}
error_reporting(E_ALL); ini_set('display_errors', '1');
$head = '
<head>


<link href="/source/js/style.css" rel="stylesheet" type="text/css" />
<_script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<_script type="text/JavaScript" src="/js/script.js"></script>

';
//<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

$file = file_get_contents( $file_name );

/*
//$file = preg_replace( "/face\=\"[a-zA-Z\ ]*\"/i", "WASHER", $file );
$file = preg_replace( "/\<font[^>]*\>/", "", $file);
$file = preg_replace( "/<\/font>/", "", $file);
$file = preg_replace( "/<b>/i", "", $file);
$file = preg_replace( "/<\/b>/i", "", $file);
$file = preg_replace( "/<center>/i", "", $file);
$file = preg_replace( "/<\/center>/i", "", $file);
*/

$file = preg_replace( "/(page[0-9]{1,2})\.html/", "/$1.html", $file );

$file = preg_replace( "/(href\=\"[\d\%\(\)]+\.jpg\")/", '$0 class = "cloud-zoom" rel = ""', $file );

$file = str_replace( "<head>", $head, $file );
echo $file;