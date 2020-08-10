<?php
session_start();

// connect to database
$db = mysqli_connect('localhost','kisszarcsa','fv4d3Sc','kisszarcsa');

// variable declaration
$username = "";
$email    = "";
$errors   = array();

function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['nevmezo']);
	$password = e($_POST['jelszomezo']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {

		 $myusername = $username;
            $mypassword = $password;

            $myusername = mysqli_real_escape_string($db, $myusername);


            $mypassword = mysqli_real_escape_string($db, $mypassword);

            $query = "SELECT * FROM adm WHERE admusr='$myusername' AND admpass='$mypassword';";

               $results = mysqli_query($db,$query);
                $count=mysqli_num_rows($results);

                if($count==1){
                echo $myusername;

                    $_SESSION['name']= $myusername;
                    header("location: admin.php");
                }
                else {

                    $msg = "Wrong Username or Password. Please retry";
                    echo "<script type='text/javascript'>alert('$msg');</script>";

                }
                ob_end_flush();
    }
            else {
            array_push($error, "valami nemoké még mindig");

            }
}



$num_form = 0;
if(isset($_POST['bev_fst_slideshow'])){
    $num_form = 1;
}
if(isset($_POST['bev_sec_slideshow'])){
     $num_form = 2;
 }
if(isset($_POST['glry_fst_slideshow'])){
    $num_form = 21;
}
if(isset($_POST['glry_sec_slideshow'])){
    $num_form = 22;
}
if(isset($_POST['glry_thr_slideshow'])){
    $num_form = 23;
}
if(isset($_POST['glry_frth_slideshow'])){
    $num_form = 24;
}



    $date = date("Y-m-d");
    $time = date("h:i");
    $targetDir = "pics/";
    $allowTypes = array('jpg','png','jpeg');

if(isset($_POST['bev_fst_slideshow']) || isset($_POST['bev_sec_slideshow']) || isset($_POST['glry_fst_slideshow'])
    || isset($_POST['glry_sec_slideshow']) || isset($_POST['glry_thr_slideshow']) || isset($_POST['glry_frth_slideshow'])){
    if(!empty($_FILES['files']['name'])){
        foreach($_FILES['files']['name'] as $key=>$val){
            $targetFilePath = $targetDir . basename($_FILES['files']['name'][$key]);
            $imgType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
            if(in_array($imgType, $allowTypes)){
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    $insert = ("INSERT INTO piccontent (type, name, upload_frm_num, checked, currdate, currtime) VALUES ('pic', '$targetFilePath', '$num_form','FALSE', '$date', '$time');");

                        mysqli_query($db,$insert);
                        echo "<script type='text/javascript'>alert('A feltöltés sikeres volt!');</script>";

                }else{
                    echo "<script type='text/javascript'>alert('Nem sikerült a file feltöltés az adatbázisba!');</script>";
                }
            }else{
            echo var_dump($_FILES);

                echo "<script type='text/javascript'>alert('Rossz fileformátum!');</script>";
            }
        }

    }

}

if(isset($_POST['pckg_save'])){
     $targetDir = "pics/";
     $allowTypes = array('jpg','png','jpeg');
     $csmg_name = $_POST['csmg_name'];
     $csmg_text = $_POST['kedvsz'];
     $csmg_desc = $_POST['csmgleiras'];
     $csmg_cost = $_POST['ar'];

        if(!empty($_FILES['file']['name'])){
                $targetFilePath = $targetDir . basename($_FILES['file']['name']);
                $imgType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
                if(in_array($imgType, $allowTypes)){
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                        $db->query("INSERT INTO pckg (img, pckg_name, pckg_text, pckg_desc, pckg_cost, checked)"
                        ."VALUES ('$targetFilePath', '$csmg_name', '$csmg_text', '$csmg_desc','$csmg_cost', '0')");
                        echo "<script type='text/javascript'>alert('A feltöltés sikeres volt!');</script>";
                    }else{
                        echo "<script type='text/javascript'>alert('Nem sikerült a file feltöltés az adatbázisba!');</script>";
                    }
                }else{
                    echo "<script type='text/javascript'>alert('Rossz fileformátum!');</script>";
                }
    }
}


/*******************************************************************************************************************
// foglalópanelon chekkolás, hogy teltházas a nap vagy nem? valamint ha nem akkor átadni az értékeket a book.phpnak
*******************************************************************************************************************/

$checkedarr = "";
$finres = "";
$query = $db->query("SELECT * FROM book_calendar");
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $checkedarr .= $row['bookedate'].",";
                     }
                }
         $finres = rtrim($checkedarr,',');




if(isset($_POST['btname']) == "sendbtn"){
$vals = json_decode($_POST['jsvar']);
$colvals = explode(';', $vals);
$ins = "INSERT INTO book_frm(name, address, email, phone, arrive, getaway, adult, roomtype, pckgsugg,".
 "bookpay, sitepay, comments, bookorreg, child, cha1, cha2, cha3)".
 "VALUES ('$colvals[0]', '$colvals[1]', '$colvals[2]', '$colvals[3]', '$colvals[4]', '$colvals[5]', '$colvals[6]', '$colvals[7]',".
 "'$colvals[8]', '$colvals[9]', '$colvals[10]', '$colvals[11]', '$colvals[12]', '$colvals[13]', '$colvals[14]', '$colvals[15]', '$colvals[16]');";
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


?>