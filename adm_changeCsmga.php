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
</head>
<body>
<div id="adm_menu">
<table style="position: relative; width: 100%">
<tr>
    <th style="float: left; padding-left:170px">Welcome To Admin Page <?php echo $_SESSION['name'] /*Echo the username */ ?></th>
    <th style="float: right; position:relative;"><a href="logout.php">Logout</a></th>
</tr>
</table>
<!--
<ul>
    <li style="float: left;">Welcome To Admin Page <?php echo $_SESSION['name'] /*Echo the username */ ?></li>
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

<!-- Ide jön a tartalom: -->
<div style="display: block; width: 80%; float: right;">
<!-- ez a feltöltő form: -->
    <div style="border-style: solid; padding-right: 2%; width: 95%;">
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th><label>Kép feltöltés: </label></th>
                <th style="float:left;"><input id="fstopen" type="button" class="adm_buttons" onclick="document.getElementById('get_fst_frame_files').click()" value="Choose file(s)" /></th>
                <th style="float:left;"><input id="get_fst_frame_files" style="display:none;" method="post" type="file" name="file" accept=".jpeg, .jpg, .png" required/></th>
                <th><label>Csomag neve: </label></th>
                                <th><input style="height: 20px" type="text" name="csmg_name" id="csmg_name" placeholder="Csomag neve.." required></th>
            </tr>
            <tr>
               <!-- <th><label>Csomag neve: </label></th>
                <th><input style="height: 20px" type="text" name="csmg_name" id="csmg_name" method="post" placeholder="Csomag neve.." required></th>
                -->
            </tr>
            <tr>
                <th><label>Kedvcsináló szöveg: </label></th>
                <th><textarea name="kedvsz" id="kedvsz" rows="5" placeholder="Kedvcsináló szöveg..." required></textarea></th>
                <th><label>Csomag leírása: </label></th>
                <th><textarea name="csmgleiras" id="csmgleiras" rows="5" placeholder="Csomag leírása..." required></textarea></th>
            </tr>
            <tr>
                <!-- <th><label>Csomag leírása: </label></th>
                <th><textarea name="csmgleiras" id="csmgleiras" rows="5" placeholder="Csomag leírása..." required></textarea></th> -->
            </tr>
            <tr>
                <th><label>Csomag ár: </label></th>
                <th><input style="height: 20px" type="text" name="ar" id="ar" placeholder="Ár.." required><label> Ft</label></th>
                <th></th>
                <th style="float: right;"><button id="pckg_save" name="pckg_save" method="post">Mentés</button></th>
            </tr>
        </table>


    </form>
    </div>

<!-- itt listázom ki az összes csomagajánlatot-->

    <div style="padding-top: 30px; display: inline-block; float: left; width: 100%">
     <p>Jelenleg feltöltött csomagajánlatok: </p>
     <th style="float:right;"><button class="adm_buttons" type="submit" id="csmgsavebtn" style="float: right; margin-right: 20px; margin-left: 10px;">Save</button></th>
     <th style="float:right;"><button class="adm_buttons" type="submit" id="csmgdelbtn" style="float: right">Delete</button></th>

<form method="post" name="fstform" id="fstform" style=" overflow: scroll; height: 350px;overflow-x: hidden;">
                       <div style="position: relative; object-fit: contain; display: block;">
                            <table style="width: 100%;">
                            <tbody>
                            <tr style="border: 1px solid black; font-style: bold; text-align: left;">
                                <th>Kép</th>
                                <th>Csomag neve</th>
                                <th>Kedvcsináló szöveg</th>
                                <th>Csomag leírás</th>
                                <th>Csomag ár</th>
                                <th>Láthatóság</th>
                            </tr>
     <?php
                     // Get images from the database
                     $query = $db->query("SELECT * FROM pckg;");
                     if($query->num_rows > 0){
                         while($row = $query->fetch_assoc()){
                             $imageURL = $row["img"]; /*image helyett name volt*/
                             $id = $row["id"];
                             $checked = $row["checked"];
                             $pckg_name = $row["pckg_name"];
                             $pckg_text = $row["pckg_text"];
                             $pckg_desc = $row["pckg_desc"];
                             $pckg_cost = $row["pckg_cost"];
                             if($checked > 0){
                                 $status = "checked";
                             }else{
                                 $status = "";
                                 }
                     ?>
                     <!--/*<form method="post" name="fstform" id="fstform" style="padding-top: 10px;">
                       <div style="position: relative; object-fit: contain; margin: auto; display: block;">
                            <table style="width: 100%;">
                            <tbody>
                           */ -->
                           <tr style="border: 1px solid black;">
                            <td style="padding: 0px 5px 0px 0px;"><?php echo '<img style="width: 150px; height: 85px;" src="'.$imageURL.'"/>';?></td>
                            <td style="padding: 0px 5px 0px 0px;"><?php echo $pckg_name?></td>
                            <td style="padding: 0px 5px 0px 0px;"><?php echo $pckg_text?></td>
                            <td style="padding: 0px 5px 0px 0px;"><?php echo $pckg_desc?></td>
                            <td style="padding: 0px 5px 0px 0px;"><?php echo $pckg_cost?></td>
                            <td style="margin: auto;"><center><input id="checkstyle" type="checkbox" name="fstframe[]" value="<?php echo $id; ?>" style="width: 20px; height: 20px;"<?php echo $status;?> /></center></td>

                            </tr>

                      </div>

                        <?php }

                         }else{ ?>
                             <p>No image(s) found...</p>
                         <?php } ?>
                        </tbody>
                        </table>
                     </form>

    </div>
</div>
<script>

var checkboxes = "";
var checked = "";
var btname = "";
var i=0;
 $(document).ready(function(){
           // --------------------------------------
                 $("button").click(function(){
                                var clkbtn = $(this).attr('id');
                                /* ez az első frameről beolvasott gombok*/
                                if(clkbtn == "csmgsavebtn" || clkbtn == "csmgdelbtn")
                                {
                                    checkboxes = document.getElementsByName('fstframe[]');
                                    btname = clkbtn;
                                    if(btname == "csmgdelbtn")
                                    {
                                    var answer = window.confirm("Would you like to delete?");
                                    if (!answer) {
                                        exit;
                                    }

                                    }
                                }

                     for (i, n=checkboxes.length;i<n;i++)
                                        {
                                            if (checkboxes[i].checked)
                                            {
                                                checked += checkboxes[i].value+",";
                                            }
                                        }

                    $.ajax({
                        url:'update.php',
                        method:'POST',
                        data:{

                            btname:btname,
                            checked:checked
                        },
                        success:function(response){

                        }
                    });
                    });
                    });

</script>

</body>


</html>