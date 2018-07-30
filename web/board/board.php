<?php
if (!empty($_POST['size']) ) {
    $size = htmlspecialchars($_POST['size']);
    $color1 = $_POST['color1'];
    echo "PHP result"."<br>";
    echo "Your input size: $size and color: $color1";

    echo "<br>";
    echo getBoard($size,["color1"=>$color1]);
}
function getBoard($sizeStr,$params)
{

//    casting
    $size = (int)(string)$sizeStr;
//    validation

    if($size<2 or $size>26){
        $msg = "ERROR! :Size must be from 2 to 26";
        return $msg ;}
    $reulst = "<!doctype html><html lang=\"en\">";
    $reulst .= getHeadPart($size,$params);
    $reulst .= getLinks();
    $reulst .= generate($size);
    $reulst .= "<body></body></html>";
    return $reulst;
}

function generate($size)
{
    $mock_symbol = ' ';
    $alphabet = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    $table = "<table>";
    $table .= "<tr>";
    $table .= "<td class='mock'>$mock_symbol</td>";
    $LR = $size;

    for ($a = 0; $a < $size; $a++) {
        $table .= "<td class='top'>$alphabet[$a]</td>";
    }
    $table .= "<td class='mock'>$mock_symbol</td>";

    $table . "</tr>";
    for ($e = 0; $e < $size; $e++) {
        $table .= "<tr>";

        $table .= "<td class='left'>".$LR."</td>";

        for ($i = 0; $i < $size; $i++) {
            $table .= "<td class='" . getColor($i, $e) . "'></td>";
        }

        $table .= "<td class='right'>".$LR--."</td>";
        $table .= "</tr>";
    }
    $table .= "<td class='mock'>$mock_symbol</td>";
    for ($a = 0; $a < $size; $a++) {
        $table .= "<td class='bottom'>$alphabet[$a]</td>";
    }
    $table .= "<td class='mock'>$mock_symbol</td>";
    $table .= "</table>";
    return $table;
}

function getLinks(){
    $index = "<a href='../index.php'>mainpage</a> ";
    $jspFormLink = "<a href='form.jsp'>JSP Form</a> ";
    $phpFormLink = "<a href='form.php'>PHP Form</a> ";

    return $phpFormLink."<br>".$jspFormLink."<br>";

}
function getColor($x, $y)
{
    if ($x % 2 == 1) {
        $y++;
    }
    if ($y % 2 == 0) {
        return 'wh';
    } else {
        return 'bl';
    }
}
//generate head part with specific style
function getHeadPart($gridSize,$params)
{
    function getDynamicCellSize($gridSize)
    {
        $KOEF = 1000;
        if ($gridSize > 1 & $gridSize < $KOEF * 100) {
            return $KOEF / $gridSize;
        } else {
            return $KOEF;
        }
    }
//
    $head = "
    <style>
        td:not(bl):not(wh) {
            text-align: center;
            font-weight: bold;
            font-size: 18px;

        }
        td.right , td.left {
            padding: 0px 2px 0px 2px;

       }
       td.right {
            border-left: 2px solid black;

       }
        td.left {
            border-right: 2px solid black;

       }
        td.top {
            border-bottom: 2px solid black;

       }
        td.bottom {
            border-top: 2px solid black;

       }
            td.right ,td.top {
            transform: rotate(180deg);
        }
        
        table {
            border: 1px solid black;
            order-spacing:0px;
                border-collapse: collapse;

        }
    td.wh, td.bl {
    
    height:" . getDynamicCellSize($gridSize) . "px;
    width:" . getDynamicCellSize($gridSize) . "px;
}
td.bl{
background-color:".$params['color1'].";
}

    </style>
</head>";
    return $head;
}
?>