<?php
define("DOMAIN", "www.samelement.com");
define("BUSINESS_NAME", "SAM Element");
define("SYSTEM_EMAIL","no-reply@samelement.com");
define("HELP_EMAIL","ask@samelement.com");
define("SESSION_EXP","30");
define("COOKIE_EXP","30");
define("DEFAULT_TIMEZONE","Asia/Jakarta");
define("IP_CHECK","0");
define("TEMP_ACTIVE","default/");
define("FUNC_DIR","includes/");
define("LANG_DIR","languages/");
define("TEMP_DIR","templates/");

define("SMTP_Server","mail.samelement.com");
define("SMTP_Username","no-reply@samelement.com");
define("SMTP_Password","");

setlocale(LC_MONETARY, 'id_ID');	

if (isset($_GET['l']) && file_exists('./' . LANG_DIR . $_GET['l'])) define("LANG", $_GET['l']);
else define("LANG", "en");

require_once(FUNC_DIR . 'function.php');

?>