<?
require_once('config-base.ini.php');

define("DB_HOST", "localhost");
define("DB_USER", "sinari5_admin");
define("DB_PASS", "m4le4kh1");
define("DB_NAME", "sinari5_samelement_subscribers");

$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die ('Error connecting to mysql');
mysql_select_db(DB_NAME);

date_default_timezone_set(DEFAULT_TIMEZONE);

?>