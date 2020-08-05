<?php
include('functions.php');
if(!isset($_SESSION['name'])){ //If session not registered
header("location:index.php"); // Redirect to login.php page
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="UTF-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="adm_changeContent_style.css">
    <title>Welcome To Admin Page Demonstration</title>
</head>
<body>
<body>
<div id="adm_menu">
<table style="position: relative; width:100%; margin-left:1px;">
<tr>
    <th style="float: left;">Welcome To Admin Page <u><?php echo $_SESSION['name'] /*Echo the username */ ?></u></th>
    <th style="float: right; position:relative; margin-right: 5px;"><a href="logout.php">Logout</a></th>
</tr>
</table>
<!--
<ul>
    <li style="list-style: none;">Welcome To Admin Page <?php echo $_SESSION['name'] /*Echo the username */ ?></li>
    <li style="float: right;><a href="logout.php">Logout</a></li>
</ul>
-->
</div>

<!--Az oldalsó menü: -->
<div class="sidenav">
<ul>
    <li><a href="adm_bookcalendar.php">Teltház</a></li>
    <li><a href="adm_changeIndex.php">Bemutatkozás</a></li>
    <li><a href="adm_changeCost.php">Árak</a></li>
    <li><a href="adm_changeCsmga.php">Csomagajánlatok</a></li>
    <li><a href="adm_changeGalery.php">Galéria</a></li>

</ul>
</div>

<!--A tartalom megjelenítése: -->

</body>




<script>
function checkedcont() {
var checkboxes = document.getElementsByName('fstframe[]');
var checked = "";
var unchecked = "";
for (var i=0, n=checkboxes.length;i<n;i++)
{
    if (checkboxes[i].checked)
    {
        checked += checkboxes[i].value+",";
    }
    if(checkboxes[i].unchecked){
        unchecked += checkboxes[i].value+",";
    }
}
/*
var data = {
    'var1': checked,
    'var2': unchecked
};

$.ajax({
    type: 'post',
    url: '',
    data: checked,
    timeout: 50000
}).done(function(response) {
    console.log(response);
}).fail(function(error) {
    // uh-oh.
});
*/
console.log("eddig jó");
// meg kell nézni, hogy javascriptből, hogy lehet php variable-t átadni. jva már működik

}
</script>

<?php
function checkqry(){
$values = implode("','", $_POST['fstframe']);
$values = $mysqli->real_escape_string($values);

$check_query = "UPDATE piccontent SET checked = '0' where Id='$values';";
   $sql_chk = mysqli_query($db,$check_query);

}

/*
if(isset($_POST['fstform']))
{
$letsee = $_POST['fstform'];

echo '<div style="float:right;">';
foreach($letsee as $arrprint){
    echo $arrprint;
}

echo '</div>';

}
//print_r($_POST['data']);
/*
$letsee = $_POST['data'];

echo '<div style="float:right;">';
foreach($letsee as $arrprint){
    echo $arrprint;
}

//echo $unchk;
echo '</div>';

//if(isset($_POST['chk']) && isset($_POST['unchk'])){
if( isset($_POST['checked_vals'])){
$letsee = $_POST[''];

echo '<div style="float:right;">';
foreach($letsee as $arrprint){
    echo $arrprint;
}
echo 'az isset checkedcalsig eljutunk, ez már jó lehet';
$data = json_decode($_POST['checked_vals'],true);
echo "idáig eljutunk? JSON things";
echo var_dump($data);
//echo $unchk;
echo '</div>';

}
*/
?>



<?php
//*****************************************************************************************************
/* az implode-al van valami baja, le kell csekkolni, hogy az átadott érték az tömb vagy csak text*/
//*****************************************************************************************************
/*
if(isset(['chk']) && isset($_COOKIE['unchk'])) {


// sql update rész:
 foreach($checked_arr as $uplchk)
 {
   $check_query = "UPDATE piccontent SET checked = '1' where Id='$uplchk';";
   $sql_chk = mysqli_query($db,$check_query);

 }

 foreach($unchecked_arr as $uplunchk)
  {
    $uncheck_query = "UPDATE piccontent SET checked = '0' where Id='$uplunchk';";
    $sql_unchk = mysqli_query($db,$uncheck_query);

  }

}*/
?>


<script>
/*Az oldalsó menü alapján jeleníti meg a tartalmat a main div-ben */
function toggle(target){

  var artz = document.getElementsByClassName('article');
  var targ = document.getElementById(target);
  var isVis = targ.style.display=='block';

  // hide all
  for(var i=0;i<artz.length;i++){
     artz[i].style.display = 'none';
  }
  // toggle current
  targ.style.display = isVis?'none':'block';

  return false;
}
</script>

</html>

