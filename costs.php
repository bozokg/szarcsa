<!DOCTYPE html>
<?php
include('functions.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kisszárcsa vendégház</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>

</header>
<ul class="menu" id="myMenu">
    <li><a href="index.php">Bemutatkozás</a></li>
    <li><a href="costs.php">Árak</a></li>
    <li><a href="rooms.html">Szobáink</a></li>
    <li><a href="csmga.php">Csomagajánlatok</a></li>
    <li><a href="book.php">Foglalás/Ajánlatkérés</a></li>
    <li><a href="galery.html">Galéria</a></li>
    <li><a href="contact.php">Kapcsolat</a></li>
    <li><a href="partners.html">Partnereink</a></li>

</ul>

<div style="height: 100%; margin: 2px; padding:2px;">
<div style="width: 80%; margin: auto; padding:10px;">
    <div style="margin: auto; padding:10px;"> <!-- padding-top: 30px; padding-bottom: 30px; padding-left: 5px;-->

        <?php
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
        <table style="width: 100%">
            <tbody>
            <tr>
                <td>
                    <p><b>FRANCIAÁGYAS SZOBA:</b></p>
                    <p>2 fő esetén:</p>
                    <p>1 éjszaka:  <?php echo"$db_fr_egy";?> Ft/szoba</p>
                    <p>2 éjszakától: <?php echo"$db_fr_ketto";?>Ft/szoba/éj</p>
                    <p>3 éjszakától: <?php echo"$db_fr_harom";?>Ft/szoba/éj</p>
                </td>
                <td style="padding-left: 10%;">
                    <p><b>APARTMAN:</b></p>
                    <p>2 fő esetén:</p>
                    <p>1 éjszaka:     <?php echo"$db_apart_egy";?>/szoba</p>
                    <p>2 éjszakától: <?php echo"$db_apart_ketto";?>Ft/szoba/éj</p>
                    <p>3 éjszakától: <?php echo"$db_apart_harom";?>Ft/szoba/éj</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><b>Főszezonban ( <?php echo str_pad($db_from_month, 2, "0", STR_PAD_LEFT)?>.<?php echo str_pad($db_from_day, 2, "0", STR_PAD_LEFT)?>-<?php echo str_pad($db_to_month, 2, "0", STR_PAD_LEFT)?>.<?php echo str_pad($db_to_day, 2, "0", STR_PAD_LEFT)?>-ig)</b></p>
                    <p>Franciaágyas szoba: <?php echo"$db_fr_szoba";?>Ft/szoba/éj</p>
                </td>
                <td style="padding-left: 10%;">
                    <p><b>Főszezonban ( <?php echo str_pad($db_from_month, 2, "0", STR_PAD_LEFT)?>.<?php echo str_pad($db_from_day, 2, "0", STR_PAD_LEFT)?>-<?php echo str_pad($db_to_month, 2, "0", STR_PAD_LEFT)?>.<?php echo str_pad($db_to_day, 2, "0", STR_PAD_LEFT)?>-ig)</b></p>
                    <p>Apartman szoba: <?php echo"$db_apart_szoba";?> Ft/szoba/éj</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
<div  style="width: 80%;  padding:10px;">
    <p><b>PÓTÁGY:</b> <?php echo"$db_potagy";?> Ft/fő/éj</p>
    <p><b>GYEREKÁR:</b> 0-5.99 évesig ingyenes, betöltött 6-16 évesig: <?php echo"$db_gyerekar";?>Ft/fő/éj   (kivéve a nyári főszezont)</p>
    <p><b>HÁZIÁLLAT:</b> 4.000Ft/éj</p>

</div>

<div style="width: 80%;  padding:10px;">
    <p>Áraink az idegenforgalmi adót nem tartalmazzák. IFA: <?php echo"$db_ifa";?>Ft/fő/éj (18. évtől)</p>
    <p>Az áraink tartalmazzák a szállást, reggelit, mini-wellness, konyha, légkondicionáló, wifi, kerékpár, parkoló használatát.</p>
</div>
<div style="padding-bottom: 30px; padding-top: 30px; width: 100%" >
    <center><a href="book.php"><button class="message_button" >Árajánlatot kérek</button></a></center>

</div>
</div>
</div>


<footer style="background-color: #333; margin-top: auto; padding-top: auto; clear: both; position: absolute; bottom:0; width:100%">
    <table style="margin: auto; width:80%; padding: 1px 0px 1px 0px;  ">
        <tr>
            <th style="float: left; color: white; padding: 0px; margin: 0px;">Kisszárcsa vendégház</th>
            <th rowspan="5" ><img src="logo2_neg2.jpg" style="height: 120px;"></th>
            <th rowspan="5" style="max-height:120px; padding: 0; margin:0;"><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FKisSzarcsaVendeghaz%2F%3F__tn__%3D%252Cd%252CP-R%26eid%3DARDC4E0BUtWE9uhlqYEE-oX8-izmOdK9D3GnPR3AkfR4DAFdfGfOVr4vNG6lPUcWqqpfhAxWI7QuXMEW&tabs&width=300&height=169&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=false&appId" width="300" height="100" style="border:none;overflow:hidden; height: 130px; float:right;" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></th>
        </tr>
        <tr>
            <td rowspan="4" style="float: left; color: white;" >Címünk: 2484 Agárd Kazinczy utca 19.
                <div>
                    Telefon: 06209451797 </br>
                    Email: info@kisszarcsa.hu</br></br>
                    <a href="contact.php"><button class="message_button" type="button">Üzenetet küldök most</button></a>
                </div></td>
        </tr>
    </table>
</footer>
</body>
</html>