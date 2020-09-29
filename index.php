<?php
session_start();

require_once ('libs/func.php');
require_once ('libs/MysqliDb.php');
require_once ('libs/conf.php');

$_SESSION['cans'] = rand_str(32, $char);

// nella
$db->where("vote", 1);
$db->get($tbl);
$a = $db->count;

// via
$db->where("vote", 0);
$db->get($tbl);
$b = $db->count;

$all = $a+$b;

$nella = persen($a,$all);
$via = persen($b,$all);

$r = base64_encode("If you found valid Flag SHL{r4nd0m1z3str1n6} , Send Your Flag To https://t.me/viloid_bot");

?>
<html>
 <head>
  <title> DUMP THE FLAG 2 </title>
  <meta name="author" content="Versailles">
  <meta name="keywords" content="">
  <meta name="description" content="">
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
<script type="text/javascript">

function submitdata()
{
    var vote = $(".vote:checked").val();
    var cans_token = $(".cans_token").val();
    var d = {
        "vote": vote,
        "cans_token": cans_token
    }
    $.ajax({
        type: 'post',
        url: 'api.php',
        data: d,
        dataType: 'json',
        success: function (res) {
            var str = JSON.stringify(res);
            var obj = JSON.parse(str);
            $('#res').html(obj['result']);
        }
    });
 return false;
}
</script>

 </head>
 <body>
 <center>
    <div class="container">
    <h1>Penyanyi Dangdut Cans</h1>
        <img src="img/unch.jpg" height="240" width="400"><br><br>
        <form method="POST" onsubmit="return submitdata();">
            <input type="hidden" class="cans_token" name="cans_token" value="<?=$_SESSION['cans'];?>">
            <input type="radio" class="vote" name="vote" value="0" /> VIA VALLEN
            <input type="radio" class="vote" name="vote" value="1" /> NELLA KHARISMA
            <br>
            <input type="submit" value="Coblos">
        </form>
        <h3 id="res"></h3>

        <b><u>STATISTIK</u></b>
        <table>
        <tr><td> Total Valid Vote </td><td>: <?=$all;?> Jones</td></tr>
        <tr><td> Nella Kharisma </td><td>: <?=$a;?> ( <?=$nella;?> ) </td></tr>
        <tr><td> Via Vallen </td><td>: <?=$b;?> ( <?=$via;?> ) </td></tr>
        </table>

        <br>
        <b><u>HALL OF FAME</u></b>
        <table border=1>
        <tr><th> NO </th><th> Solver Name </h></tr>
        <?php
        $n = 0;
        $fg = explode("\n",file_get_contents("solverlists.db"));
        foreach($fg as $solv){
        echo "<tr><td>$n</td><td><a href=https://t.me/$solv>@$solv</a></td></tr>";
        $n++;
        }
        ?>
        </table>
    </div>
    <!--
        README :
        <?=$r;?>

    -->

 </body>
</html>