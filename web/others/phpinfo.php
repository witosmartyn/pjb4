<?php
include_once "util.php";
function getServerInfo($var)
{
    ob_start();
    phpinfo(INFO_VARIABLES);
    $strPhpInfo = ob_get_contents();
    ob_clean();
    return $strPhpInfo;

}
?>