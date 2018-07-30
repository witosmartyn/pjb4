<?php

if (count($_GET)>0){
    echo "GET";
    print_r($_GET).'<br>';
    echo "POST".'<br>';
    print_r($_POST).'<br>';
    echo '<br><br><br><br>';

    echo "Cookies".'<br>';
//    print_r($_COOKIE).'<br>';

    $StrCookies='';
    foreach ($_COOKIE as $k=> $v){
        $StrCookies .= $v.'<br>';
    }
    echo $StrCookies;
    echo '<br><br><br><br>';


    echo "_SERVER".'<br>';
    print_r($_SERVER).'<br>';
    echo "REQUEST".'<br>';
    print_r($_REQUEST).'<br>';
    echo "_FILES".'<br>';
    print_r($_FILES).'<br>';
    if (isset($_GET['info'])){
        echo phpinfo($_GET['info']);
    }
}
?>