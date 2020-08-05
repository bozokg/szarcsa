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
    <th style="float: left;">Üdvözöljük  <b><?php echo $_SESSION['name'] ?></b></th>
    <th style="float: right; position:relative;"><a href="logout.php">Logout</a></th>
</tr>
</table>
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
<div class="main">
<p id="focimek">Szobák:</p>
    <div id="frames">

        <div id="intro" class="tabcontent" >
                         <form method="post" enctype="multipart/form-data">
                             <div id="frames_sty">
                                 <table style="width:100%;">
                                   <tr>
                                     <th style="float:left;"><input id="fstopen" type="button" class="adm_buttons" onclick="document.getElementById('get_fst_frame_files').click()" value="Choose file(s)"/></th>
                                     <!-- lent a name = files[] volt, vissza köll írni!!!!-->
                                     <th style="float:left;"><input id="get_fst_frame_files" style="display:none;" method="post" type="file" name="files[]" multiple="multiple"/></th>
                                     <th style="float:left;"><label id="countlabel" class="adm_buttons" style=" display: none; color:white; font-size: 15px; height:5%; width: 5%; position:relative;" value="0">0</label></th>
                                     <th style="float:left;"><input id="fstupload" method="post" class="adm_buttons" type="submit" name="glry_fst_slideshow" value="Upload"/></th> <!-- name="bev_fst_slideshow"-->
                                     <th style="float:left; padding-left: 5%;"><input class="adm_buttons" type="button" onclick="unchkall()" name="unchk" value="Uncheck all"/></th>
                                     <th style="float:right;"><button class="adm_buttons" type="submit" id="gal_fstsavebtn" style="float: right; margin-right: 20px; margin-left: 10px;">Save</button></th>
                                     <th style="float:right;"><button class="adm_buttons" type="submit" id="gal_fstdelbtn" style="float: right">Delete</button></th>
                                   </tr>
                                  </table>
                              </div>
                          </form>
        </div>
                <?php

                $query = $db->query("SELECT * FROM piccontent where upload_frm_num = '21' AND type = 'pic' order by checked = '1' DESC, currdate desc, currtime desc;");/*itt az swl querybe lehetne szűrni a pipált doloklegyenek elől a többi pedig dátum szerint*/
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $imageURL = $row["name"];
                        $id = $row["Id"];
                        $checked = $row["checked"];
                        if($checked > 0){
                            $status = "checked";
                        }else{
                            $status = "";
                        }
                ?>
                <form method="post" name="fstform" id="fstform" style="padding-top: 10px;">
                  <div style="width: 300px; height: 200px; position: relative; object-fit: contain; margin: auto; display: inline-block; padding-left: 2.5%;">
                        <input id="checkstyle" type="checkbox" name="fstframe[]" value="<?php echo $id; ?>" style="position: absolute; width: 20px; height: 20px; margin-top: 5px; margin-left: 5px;" <?php echo $status;?> />
                       <?php echo '<img style="width: 300px; height: 200px;" src="'.$imageURL.'"/>';?>
                 </div>
                   <?php }
                    }else{ ?>
                        <p>No image(s) found...</p>
                    <?php } ?>
                </form>
    </div>



<p id="focimek" style="padding-top: 20px;">Házról</p>
    <div id="frames2">

        <div id="intro" class="tabcontent" >    <!--//style="position: static; -->
                         <form method="post" enctype="multipart/form-data">
                             <div id="frames_sty">
                                 <table style="width:100%;">
                                   <tr>
                                     <th style="float:left;"><input id="secopen" type="button" class="adm_buttons" onclick="document.getElementById('get_sec_frame_files').click()" value="Choose file(s)"/></th>
                                     <!-- lent a name = files[] volt, vissza köll írni!!!!-->
                                     <th style="float:left;"><input id="get_sec_frame_files" style="display:none;" method="post" type="file" name="files[]" multiple="multiple"/></th>
                                     <th style="float:left;"><label id="seccountlabel" class="adm_buttons" style=" display: none; color:white; font-size: 15px; height:5%; width: 5%; position:relative;" value="0">0</label></th>
                                     <th style="float:left;"><input id="secupload" method="post" class="adm_buttons" type="submit" name="glry_sec_slideshow" value="Upload"/></th> <!-- name="bev_fst_slideshow"-->
                                     <th style="float:left; padding-left: 5%;"><input class="adm_buttons" type="button" onclick="unchkall()" name="unchk" value="Uncheck all"/></th>
                                     <th style="float:right;"><button class="adm_buttons" type="submit" id="gal_secsavebtn" style="float: right; margin-right: 20px; margin-left: 10px;">Save</button></th>
                                     <th style="float:right;"><button class="adm_buttons" type="submit" id="gal_secdelbtn" style="float: right">Delete</button></th>
                                   </tr>
                                  </table>
                              </div>
                          </form>
        </div>
                <?php
                // Get images from the database
                $query = $db->query("SELECT * FROM piccontent where upload_frm_num = '22' AND type = 'pic' order by checked = '1' DESC, currdate desc, currtime desc;");/*itt az swl querybe lehetne szűrni a pipált doloklegyenek elől a többi pedig dátum szerint*/
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $imageURL = $row["name"]; /*image helyett name volt*/
                        $id = $row["Id"];
                        $checked = $row["checked"];
                        if($checked > 0){
                            $status = "checked";
                        }else{
                            $status = "";
                        }
                ?>
                <form method="post" name="fstform" id="fstform" style="padding-top: 10px;">
                  <div style="width: 300px; height: 200px; position: relative; object-fit: contain; margin: auto; display: inline-block; padding-left: 2.5%;">
                        <input id="checkstyle" type="checkbox" name="secframe[]" value="<?php echo $id; ?>" style="position: absolute; width: 20px; height: 20px; margin-top: 5px; margin-left: 5px;" <?php echo $status;?> />
                       <?php echo '<img style="width: 300px; height: 200px;" src="'.$imageURL.'"/>';?>
                 </div>
                   <?php }
                    }else{ ?>
                        <p>No image(s) found...</p>
                    <?php } ?>
                </form>
    </div>

<p id="focimek">Terasz:</p>
    <div id="frames">

        <div id="intro" class="tabcontent" >    <!--//style="position: static; -->
                         <form method="post" enctype="multipart/form-data">
                             <div id="frames_sty">
                                 <table style="width:100%;">
                                   <tr>
                                     <th style="float:left;"><input id="fstopen" type="button" class="adm_buttons" onclick="document.getElementById('get_thr_frame_files').click()" value="Choose file(s)"/></th>
                                     <!-- lent a name = files[] volt, vissza köll írni!!!!-->
                                     <th style="float:left;"><input id="get_thr_frame_files" style="display:none;" method="post" type="file" name="files[]" multiple="multiple"/></th>
                                     <th style="float:left;"><label id="thrcountlabel" class="adm_buttons" style=" display: none; color:white; font-size: 15px; height:5%; width: 5%; position:relative;" value="0">0</label></th>
                                     <th style="float:left;"><input id="fstupload" method="post" class="adm_buttons" type="submit" name="glry_thr_slideshow" value="Upload"/></th> <!-- name="bev_fst_slideshow"-->
                                     <th style="float:left; padding-left: 5%;"><input class="adm_buttons" type="button" onclick="unchkall()" name="unchk" value="Uncheck all"/></th>
                                     <th style="float:right;"><button class="adm_buttons" type="submit" id="gal_thrsavebtn" style="float: right; margin-right: 20px; margin-left: 10px;">Save</button></th>
                                     <th style="float:right;"><button class="adm_buttons" type="submit" id="gal_thrdelbtn" style="float: right">Delete</button></th>
                                   </tr>
                                  </table>
                              </div>
                          </form>
        </div>
                <?php
                // Get images from the database
                $query = $db->query("SELECT * FROM piccontent where upload_frm_num = '23' AND type = 'pic' order by checked = '1' DESC, currdate desc, currtime desc;");/*itt az swl querybe lehetne szűrni a pipált doloklegyenek elől a többi pedig dátum szerint*/
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $imageURL = $row["name"]; /*image helyett name volt*/
                        $id = $row["Id"];
                        $checked = $row["checked"];
                        if($checked > 0){
                            $status = "checked";
                        }else{
                            $status = "";
                        }
                ?>
                <form method="post" name="fstform" id="fstform" style="padding-top: 10px;">
                  <div style="width: 300px; height: 200px; position: relative; object-fit: contain; margin: auto; display: inline-block; padding-left: 2.5%;">
                        <input id="checkstyle" type="checkbox" name="thrframe[]" value="<?php echo $id; ?>" style="position: absolute; width: 20px; height: 20px; margin-top: 5px; margin-left: 5px;" <?php echo $status;?> />
                       <?php echo '<img style="width: 300px; height: 200px;" src="'.$imageURL.'"/>';?>
                 </div>
                   <?php }
                    }else{ ?>
                        <p>No image(s) found...</p>
                    <?php } ?>
                </form>
    </div>



<p id="focimek" style="padding-top: 20px;">Wellness</p>
    <div id="frames2">

        <div id="intro" class="tabcontent" >
                         <form method="post" enctype="multipart/form-data">
                             <div id="frames_sty">
                                 <table style="width:100%;">
                                   <tr>
                                     <th style="float:left;"><input id="secopen" type="button" class="adm_buttons" onclick="document.getElementById('get_frth_frame_files').click()" value="Choose file(s)"/></th>
                                     <!-- lent a name = files[] volt, vissza köll írni!!!!-->
                                     <th style="float:left;"><input id="get_frth_frame_files" style="display:none;" method="post" type="file" name="files[]" multiple="multiple"/></th>
                                     <th style="float:left;"><label id="frthcountlabel" class="adm_buttons" style=" display: none; color:white; font-size: 15px; height:5%; width: 5%; position:relative;" value="0">0</label></th>
                                     <th style="float:left;"><input id="secupload" method="post" class="adm_buttons" type="submit" name="glry_frth_slideshow" value="Upload"/></th> <!-- name="bev_fst_slideshow"-->
                                     <th style="float:left; padding-left: 5%;"><input class="adm_buttons" type="button" onclick="unchkall()" name="unchk" value="Uncheck all"/></th>
                                     <th style="float:right;"><button class="adm_buttons" type="submit" id="gal_frthsavebtn" style="float: right; margin-right: 20px; margin-left: 10px;">Save</button></th>
                                     <th style="float:right;"><button class="adm_buttons" type="submit" id="gal_frthdelbtn" style="float: right">Delete</button></th>
                                   </tr>
                                  </table>
                              </div>
                          </form>
        </div>
                <?php
                // Get images from the database
                $query = $db->query("SELECT * FROM piccontent where upload_frm_num = '24' AND type = 'pic' order by checked = '1' DESC, currdate desc, currtime desc;");/*itt az swl querybe lehetne szűrni a pipált doloklegyenek elől a többi pedig dátum szerint*/
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $imageURL = $row["name"]; /*image helyett name volt*/
                        $id = $row["Id"];
                        $checked = $row["checked"];
                        if($checked > 0){
                            $status = "checked";
                        }else{
                            $status = "";
                        }
                ?>
                <form method="post" name="fstform" id="fstform" style="padding-top: 10px;">
                  <div style="width: 300px; height: 200px; position: relative; object-fit: contain; margin: auto; display: inline-block; padding-left: 2.5%;">
                        <input id="checkstyle" type="checkbox" name="frthframe[]" value="<?php echo $id; ?>" style="position: absolute; width: 20px; height: 20px; margin-top: 5px; margin-left: 5px;" <?php echo $status;?> />
                       <?php echo '<img style="width: 300px; height: 200px;" src="'.$imageURL.'"/>';?>
                 </div>
                   <?php }
                    }else{ ?>
                        <p>No image(s) found...</p>
                    <?php } ?>
                </form>
    </div>





</div>

<script>

document.getElementById('fstupload').addEventListener("click", function(){
   var hide = document.getElementById('countlabel');
   hide.style.display = "none";
})

</script>

<script>

$(document).ready(function(){
var lbl;
        $("input#get_fst_frame_files").change(function(){
                   var btn = $(this)[0].files;
                   if(btn.length > 0){
                   console.log(btn.length);
                    lbl = document.getElementById('countlabel');
                               lbl.innerText = btn.length;
                               lbl.style.display = "block";
                               }
                   else{
                   lbl.style.display = "none";
                   }

                   });
         $("input#get_sec_frame_files").change(function(){
                 var btn = $(this)[0].files;
                 if(btn.length > 0){
                 console.log(btn.length);
                  lbl = document.getElementById('seccountlabel');
                             lbl.innerText = btn.length;
                             lbl.style.display = "block";
                             }
                 else{
                 lbl.style.display = "none";
                 }

                 });
         $("input#get_thr_frame_files").change(function(){
                 var btn = $(this)[0].files;
                 if(btn.length > 0){
                 console.log(btn.length);
                  lbl = document.getElementById('thrcountlabel');
                             lbl.innerText = btn.length;
                             lbl.style.display = "block";
                             }
                 else{
                 lbl.style.display = "none";
                 }

                 });
         $("input#get_frth_frame_files").change(function(){
                 var btn = $(this)[0].files;
                 if(btn.length > 0){
                 console.log(btn.length);
                  lbl = document.getElementById('frthcountlabel');
                             lbl.innerText = btn.length;
                             lbl.style.display = "block";
                             }
                 else{
                 lbl.style.display = "none";
                 }

                 });
     });

</script>

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
                if(clkbtn == "gal_fstsavebtn" || clkbtn == "gal_fstdelbtn")
                {
                    checkboxes = document.getElementsByName('fstframe[]');
                    btname = clkbtn;
                    if(btname == "gal_fstdelbtn")
                    {
                    var answer = window.confirm("Would you like to delete?");
                    if (!answer) {
                        exit;
                    }

                    }
                }
                if(clkbtn == "gal_secsavebtn" || clkbtn == "gal_secdelbtn")
                {
                   checkboxes = document.getElementsByName('secframe[]');
                   btname = clkbtn;
                   if(btname == "gal_thrdelbtn")
                   {
                   var answer = window.confirm("Would you like to delete?");
                   if (!answer) {
                   exit;
                   }

                   }
                }

                if(clkbtn == "gal_thrsavebtn" || clkbtn == "gal_thrdelbtn")
                                {
                                   checkboxes = document.getElementsByName('thrframe[]');
                                   btname = clkbtn;
                                   if(btname == "gal_thrdelbtn")
                                   {
                                   var answer = window.confirm("Would you like to delete?");
                                   if (!answer) {
                                   exit;
                                   }

                                   }
                                }
                if(clkbtn == "gal_frthsavebtn" || clkbtn == "gal_frthdelbtn")
                                {
                                   checkboxes = document.getElementsByName('frthframe[]');
                                   btname = clkbtn;
                                   if(btname == "gal_frthdelbtn")
                                   {
                                   var answer = window.confirm("Would you like to delete?");
                                   if (!answer) {
                                   exit;
                                   }

                                      }
                                   }

                    //for (i, n=checkboxes.length;i<n;i++)
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
                        alert("Sikeres feltöltés");
                        }
                    });





                });
           // -----------------------------------

            });


function unchkall(){
var i=0;
var boxes = document.getElementById('fstform');
 for(i;i<boxes.length;i++)
 {
  if(boxes[i].type=='checkbox')
  {
   boxes[i].checked=false;
  }

}
}
</script>

<style>
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
    }
</style>


</body>
</html>

