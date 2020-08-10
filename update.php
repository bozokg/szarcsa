<?php
include('functions.php');
if(isset($_SESSION['name']) && isset($_POST['btname'])){
if(isset($_POST["checked"]))
{
$checked=$_POST["checked"];
$chcktrim = rtrim($checked,',');
 $impchk = implode(",", (array)$chcktrim);
    $value = mysqli_real_escape_string($db, $impchk);
    //echo $value;
}



    if($_POST['btname'] =="fstsavebtn"){
        if($value == NULL){

            $db->query("UPDATE piccontent SET checked = 0 where upload_frm_num = 1");
        }
        else{

            $db->query("UPDATE piccontent SET checked = 1 where Id IN($value) and upload_frm_num = 1");
            $db->query("UPDATE piccontent SET checked = 0 where Id NOT IN($value) and upload_frm_num = 1");
        }
     }
     if($_POST['btname'] == "fstdelbtn"){
       if($value > NULL){
        $db->query("DELETE FROM piccontent WHERE Id IN($value) and upload_frm_num = 1");
        }
     }

     if($_POST['btname'] =="secsavebtn"){
             if($value == NULL){
                 $db->query("UPDATE piccontent SET checked = 0 upload_frm_num = 2");
             }
             else{
                 $db->query("UPDATE piccontent SET checked = 1 where Id IN($value) and upload_frm_num = 2");
                 $db->query("UPDATE piccontent SET checked = 0 where Id NOT IN($value) and upload_frm_num = 2");
             }
          }
          if($_POST['btname'] == "secdelbtn"){
            if($value > NULL){
             $db->query("DELETE FROM piccontent WHERE Id IN($value) and upload_frm_num = 2");
             }
          }

/*Innentől a galerya update gombok: */
      if($_POST['btname'] =="gal_fstsavebtn"){
                  if($value == NULL){
                      $db->query("UPDATE piccontent SET checked = 0 upload_frm_num = 21");
                  }
                  else{
                      $db->query("UPDATE piccontent SET checked = 1 where Id IN($value) and upload_frm_num = 21");
                      $db->query("UPDATE piccontent SET checked = 0 where Id NOT IN($value) and upload_frm_num = 21");
                  }
               }
               if($_POST['btname'] == "gal_fstdelbtn"){
                 if($value > NULL){
                  $db->query("DELETE FROM piccontent WHERE Id IN($value) and upload_frm_num = 21");
                  }
               }
         if($_POST['btname'] =="gal_secsavebtn"){
                   if($value == NULL){
                       $db->query("UPDATE piccontent SET checked = 0 upload_frm_num = 22");
                   }
                   else{
                       $db->query("UPDATE piccontent SET checked = 1 where Id IN($value) and upload_frm_num = 22");
                       $db->query("UPDATE piccontent SET checked = 0 where Id NOT IN($value) and upload_frm_num = 22");
                   }
                }
                if($_POST['btname'] == "gal_secdelbtn"){
                  if($value > NULL){
                   $db->query("DELETE FROM piccontent WHERE Id IN($value) and upload_frm_num = 22");
                   }
                }

      if($_POST['btname'] =="gal_thrsavebtn"){
                        if($value == NULL){
                            $db->query("UPDATE piccontent SET checked = 0 upload_frm_num = 23");
                        }
                        else{
                            $db->query("UPDATE piccontent SET checked = 1 where Id IN($value) and upload_frm_num = 23");
                            $db->query("UPDATE piccontent SET checked = 0 where Id NOT IN($value) and upload_frm_num = 23");
                        }
                     }
                     if($_POST['btname'] == "gal_thrdelbtn"){
                       if($value > NULL){
                        $db->query("DELETE FROM piccontent WHERE Id IN($value) and upload_frm_num = 23");
                        }
                     }
               if($_POST['btname'] =="gal_frthsavebtn"){
                         if($value == NULL){
                             $db->query("UPDATE piccontent SET checked = 0 upload_frm_num = 24");
                         }
                         else{
                             $db->query("UPDATE piccontent SET checked = 1 where Id IN($value) and upload_frm_num = 24");
                             $db->query("UPDATE piccontent SET checked = 0 where Id NOT IN($value) and upload_frm_num = 24");
                         }
                      }
                      if($_POST['btname'] == "gal_frthdelbtn"){
                        if($value > NULL){
                         $db->query("DELETE FROM piccontent WHERE Id IN($value) and upload_frm_num = 24");
                         }
                      }






     if($_POST['btname'] == "csmgsavebtn"){
                     if($value == NULL){
                         $db->query("UPDATE pckg SET checked = 0 where id not null");
                     }
                     else{
                         $db->query("UPDATE pckg SET checked = 1 where id IN($value)");
                         $db->query("UPDATE pckg SET checked = 0 where id NOT IN($value)");
                     }
                  }
                  if($_POST['btname'] == "csmgdelbtn"){
                    if($value > NULL){
                     $db->query("DELETE FROM pckg WHERE id IN($value)");
                     }
                  }

     if($_POST['btname'] == "upd_cost"){
         if(isset($_POST["datas"])){
         $querydetcost = $_POST["datas"];
          $db->query("$querydetcost");
         }
    }




if($_POST['btname'] == "save_calendar"){

$pass_arr = $_POST["arr"];
foreach($pass_arr as $valarr){
$cuts = substr($valarr,0,7);
}
      mysqli_query($db, "DELETE FROM book_calendar WHERE bookedate like '$cuts%';");
foreach($pass_arr as $value){
    if($value != NULL ) //&& $value != $rowcont
        {
        $query = $db->query("SELECT * FROM book_calendar where bookedate like '$value';");
            if($query->num_rows == 0){
                $db->query("INSERT INTO book_calendar(bookedate) VALUES ('$value');");

            }
            }
}
}


}
/*
if($_POST['btname'] == "sendbtn"){
$vals = json_decode($_POST['jsvar']);
$colvals = explode(';', $vals);
$ins = "INSERT INTO book_frm(name, address, email, phone, arrive, getaway, adult, roomtype, pckgsugg, bookpay, sitepay, comments, bookorreg, child, cha1, cha2, cha3) VALUES ('$colvals[0]', '$colvals[1]', '$colvals[2]', '$colvals[3]', '$colvals[4]', '$colvals[5]', '$colvals[6]', '$colvals[7]', '$colvals[8]', '$colvals[9]', '$colvals[10]', '$colvals[11]', '$colvals[12]', '$colvals[13]', '$colvals[14]', '$colvals[15]', '$colvals[16]');";
$send = mail("kisszarcsavendeghaz@gmail.com", "$colvals[12], $colvals[0]",
"Név: $colvals[0]\r\n".
"Cím: $colvals[1]\r\n".
"Email cím: $colvals[2]\r\n".
"Telefonszám: $colvals[3]\r\n\r\n".
"Érkezési idő: $colvals[4]\r\n".
"Távozási idő: $colvals[5]\r\n\r\n".
"Szobatipus: $colvals[7]\r\n".
"Csomagajánlat: $colvals[8]\r\n".
"Foglaló módja: $colvals[9]\r\n".
"Helyszíni fizetés: $colvals[10]\r\n\r\n".
"Felnőtt: $colvals[6] fő\r\n".
"Gyerek: $colvals[13] fő\r\n".
"Gyerekek életkora: $colvals[14], $colvals[15], $colvals[16] éves(ek)\r\n\r\n".
"Komment: $colvals[11]");
mysqli_query($db,$ins);

}else{

}
*/
if(isset($_POST['datas']))
{
    $cntcdata = $_POST['datas'];
    $cntc = explode(';', $cntcdata);
    $up = "INSERT INTO contact_msg(name, email, text) VALUES ('$cntc[0]', '$cntc[1]', '$cntc[2]');";
    $send = mail("gabor.bozoki@gmail.com", "$cntc[0]", "Küldő email címe: $cntc[1]\r\nÜzenet szövege: \r\n$cntc[2]");
    mysqli_query($db,$up);
}



?>