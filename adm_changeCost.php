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
    <link rel="stylesheet" type="text/css" href="adm_changeContent_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Welcome To Admin Page Demonstration</title>

    <style>

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }


    input[type=number] {
      -moz-appearance: textfield;
    }
    </style>
</head>
<body>
<div id="adm_menu">
<table style="position: relative; width: 100%">
<tr>
    <th style="float: left;">Welcome To Admin Page <?php echo $_SESSION['name'] /*Echo the username */ ?></th>
    <th style="float: right; position:relative;"><a href="logout.php">Logout</a></th>
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

<!-- ez a div a tartalom-->

                <?php
                // Get images from the database
                $query = $db->query("SELECT * FROM cost_details group by curr_date desc, curr_time desc LIMIT 1;");
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $db_fr_egy = $row["fr_egy"];
                        $db_fr_ketto = $row["fr_ketto"];
                        $db_fr_harom = $row["fr_harom"];
                        $db_apart_egy = $row["apart_egy"];
                        $db_apart_ketto = $row["apart_ketto"];
                        $db_apart_harom = $row["apart_harom"];
                        $db_from_month = $row["from_month"];
                        $db_from_day = $row["from_day"];
                        $db_to_month = $row["to_month"];
                        $db_to_day = $row["to_day"];
                        $db_fr_szoba = $row["fr_szoba"];
                        $db_apart_szoba = $row["apart_szoba"];
                        $db_potagy = $row["potagy"];
                        $db_gyerekar = $row["gyerekar"];
                        $db_ifa = $row["ifa"];
                     }
                }
                ?>

<div style="display: block; width: 80%; float: right;">
<form method="post">
<div style="width: 80%; margin:auto; padding:10px;">
    <div style="margin: auto; padding:10px;"> <!-- padding-top: 30px; padding-bottom: 30px; padding-left: 5px;-->
        <table style="width: 100%">
            <tbody>
            <tr>
                <td>
                    <p><b>FRANCIAÁGYAS SZOBA:</b></p>
                    <p>2 fő esetén:</p>
                    <p>1 éjszaka:  <input type="number" id="fr_egy" name="fr_egy" value="<?php echo $db_fr_egy;?>" style="width:100px;"/>Ft/szoba</p>
                    <p>2 éjszakától: <input type="number" id="fr_ketto" value="<?php echo $db_fr_ketto;?>" style="width:100px;">Ft/szoba/éj</p>
                    <p>3 éjszakától: <input type="number" id="fr_harom" value="<?php echo $db_fr_harom;?>" style="width:100px;"> Ft/szoba/éj</p>
                </td>
                <td style="padding-left: 10%;">
                    <p><b>APARTMAN:</b></p>
                    <p>2 fő esetén:</p>
                    <p>1 éjszaka:     <input type="number" id="apart_egy" value="<?php echo $db_apart_egy;?>" style="width:100px;">/szoba</p>
                    <p>2 éjszakától: <input type="number" id="apart_ketto" value="<?php echo $db_apart_ketto;?>" style="width:100px;">Ft/szoba/éj</p>
                    <p>3 éjszakától: <input type="number" id="apart_harom" value="<?php echo $db_apart_harom;?>" style="width:100px;"> Ft/szoba/éj</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><b>Főszezonban </br>( Hó: <select id="from_month_list" style="width: 35px;">
                                          <?php
                                          if(isset($db_from_month)){
                                          for($i=1; $i<=12; $i++){
                                            if($i==$db_from_month){
                                                echo "<option selected>$db_from_month</option>";
                                            }else{
                                                echo "<option>$i</option>";
                                            }
                                            }
                                          }else{
                                                for($i=1; $i<=12; $i++){echo "<option>$i</option>";}
                                               }
                                          ?>
                                        </select>
                                        Nap:
                                        <select id="from_day_list" style="width: 35px;">
                                           <?php
                                           if(isset($db_from_day)){
                                           for($i=1; $i<=31; $i++){
                                           if($i==$db_from_day){
                                                echo "<option selected>$db_from_day</option>";
                                           }else{
                                                echo "<option>$i</option>";
                                           }
                                           }
                                        }else{
                                            for($i=1; $i<=31; $i++){echo "<option>$i</option>";}
                                        }
                                        ?>
                                        </select>
                                        -tól

                                        Hó:<select id="to_month_list" style="width: 35px;">
                                            <?php
                                            if(isset($db_to_month)){
                                                for($i=1; $i<=12; $i++){
                                                        if($i==$db_to_month ){
                                                            echo "<option selected>$db_to_month</option>";
                                                        }
                                                        if($db_to_month != NULL){
                                                            echo "<option>$i</option>";
                                                        }
                                                }
                                            }else{
                                            for($i=1; $i<=12; $i++){echo "<option>$i</option>";}
                                            }
                                            ?>
                                            </select>
                                            Nap:
                                            <select id="to_day_list" style="width: 35px;">
                                            <?php
                                            if(isset($db_to_day)){
                                                for($i=1; $i<=31; $i++){
                                                        if($i==$db_to_day){
                                                            echo "<option selected>$db_to_day</option>";
                                                        }else{
                                                            echo "<option>$i</option>";
                                                        }
                                                }
                                            }else{
                                            for($i=1; $i<=31; $i++){echo "<option>$i</option>";}
                                            }

                                            ?>
                                            </select> -ig

                                    )</b></p>
                    <p>Franciaágyas szoba: <input type="number" id="fr_szoba" value="<?php echo $db_fr_szoba;?>"> Ft/szoba/éj</p>
                </td>
                <td style="padding-left: 10%;">

                    <p>Apartman szoba: <input type="number" id="apart_szoba" value="<?php echo $db_apart_szoba;?>"> Ft/szoba/éj</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
<div  style="width: 80%;  padding:10px;">
    <p><b>PÓTÁGY:</b> <input type="number" id="potagy" value="<?php echo $db_potagy;?>"> Ft/fő/éj</p>
    <p><b>GYEREKÁR:</b> 0-5.99 évesig ingyenes, betöltött 6-16 évesig: <input type="number" id="gyerekar" value="<?php echo $db_gyerekar;?>">Ft/fő/éj   (kivéve a nyári főszezont)</p>
    <p><b>HÁZIÁLLAT:</b> 4.000Ft/éj</p>

</div>

<div style="width: 80%;  padding:10px;">
    <p>Áraink az idegenforgalmi adót nem tartalmazzák. IFA: <input type="number" id="ifa" value="<?php echo $db_ifa;?>">Ft/fő/éj (18. évtől)</p>
    <p>Az áraink tartalmazzák a szállást, reggelit, mini-wellness, konyha, légkondicionáló, wifi, kerékpár, parkoló használatát.</p>
</div>
<button type="submit" id="upd_cost">Update</button>
</div>

</form>
</div>

<script>



 $(document).ready(function(){
           // --------------------------------------
                $("button").click(function(){
                var clkbtn = $(this).attr('id');
                    btname = clkbtn;

                    var fr_egy = document.getElementById("fr_egy");
                    var fr_ketto = document.getElementById("fr_ketto");
                    var fr_harom = document.getElementById("fr_harom");

                    var apart_egy = document.getElementById("apart_egy");
                    var apart_ketto = document.getElementById("apart_ketto");
                    var apart_harom = document.getElementById("apart_harom");
                    var from_month = document.getElementById("from_month_list");
                    var from_day = document.getElementById("from_day_list");
                    var to_month = document.getElementById("to_month_list");
                    var to_day = document.getElementById("to_day_list");
                    var fr_szoba = document.getElementById("fr_szoba");
                    var apart_szoba = document.getElementById("apart_szoba");
                    var potagy = document.getElementById("potagy");
                    var gyerekar = document.getElementById("gyerekar");
                    var ifa = document.getElementById("ifa");

                    var d = new Date();
                    var currdate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
                    var currtime = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
                    var query_det = "";
                    var datas = "";
                    //system.log(query_det);
                    query_det = "INSERT into cost_details (fr_egy, fr_ketto, fr_harom, apart_egy, apart_ketto, apart_harom, from_month, from_day, to_month, to_day, fr_szoba, apart_szoba, potagy, gyerekar, ifa, curr_date, curr_time) values('"+ fr_egy.value +"', '"+fr_ketto.value+"', '"+fr_harom.value+"', '"+apart_egy.value+"', '"+apart_ketto.value+"', '"+apart_harom.value+"', '"+from_month.value+"', '"+from_day.value+"', '"+to_month.value+"', '"+to_day.value+"', '"+fr_szoba.value+"', '"+apart_szoba.value+"', '"+potagy.value+"', '"+ gyerekar.value +"', '"+ ifa.value +"', '"+currdate+"', '"+currtime+"');";

                    datas = query_det;
                    $.ajax({
                        url:'update.php',
                        method:'POST',
                        data:{
                            btname:btname,
                            datas:datas
                        },
                        success:function(response){
                            alert("Sikeres frissítés!");
                        }
                    });


                });
           // -----------------------------------

            });

</script>


</body>
</html>