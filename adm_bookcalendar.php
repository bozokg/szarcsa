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
    <th style="float: left;">Welcome To Admin Page <?php echo $_SESSION['name'] /*Echo the username */ ?></th>
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
<div style="width: 80%; position: relative; display: inline-block; float: right; padding-right: 2%;">

<table style="width: auto;">

<tr>
    <td style="float:left;"><div style="display: table; jutify-content: center; position: relative; width:auto;" >
            <div class="card" style="border: 1px solid; padding: 5px; margin: 5px">
                <h3 class="card-header" id="monthAndYear"></h3>
                <table class="table table-bordered table-responsive-sm" id="calendar">
                    <thead>
                    <tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>
                    </thead>

                    <tbody id="calendar-body">


                    </tbody>
                </table>

                <div class="form-inline">

                    <button class="btn btn-outline-primary col-sm-6 message_button" id="previous" onclick="previous()">Previous</button>

                    <button class="btn btn-outline-primary col-sm-6 message_button" id="next" onclick="next()">Next</button>
                </div>
                <br>
                <button type="submit" class="message_button" onclick="gatherall()" id="save_calendar" name="save_calendar" method="POST">Save</button>
            </div>
        </div></td>
    <td>
        <div>
        <?php

              $sql = "SELECT * FROM contact_msg";
              $result = mysqli_query($db, $sql);
              echo "<br>";
              echo "<table border='1'>";
              echo "<tr>";
              echo "<td><b>Név</b></td>";
              echo "<td><b>Email</b></td>";
              echo "<td><b>Komment</b></td>";
              echo "</tr>";
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  foreach ($row as $field => $value) {
                      echo "<td>" . $value . "</td>";
                  }
                  echo "</tr>";
              }
              echo "</table>";
        ?>
        </div>
    </td>
</tr>

</table>




<div style="width: 100%; height: 400px; display: inherit; position: relative; object-fit: contain; margin: 1px; padding-left: 3px; padding-right: 3px; overflow-y: scroll;">
<?php

      $sql = "SELECT * FROM book_frm";
      $result = mysqli_query($db, $sql);
      echo "<br>";
      echo "<table border='1'>";
      echo "<tr>";
      echo "<td><b>Név</b></td>";
      echo "<td><b>Cím</b></td>";
      echo "<td><b>Email</b></td>";
      echo "<td><b>Telefon</b></td>";
      echo "<td><b>Érkezés</b></td>";
      echo "<td><b>Távozás</b></td>";
      echo "<td><b>Felnőtt</b></td>";
      echo "<td><b>Szoba típus</b></td>";
      echo "<td><b>Csomag ajánlat</b></td>";
      echo "<td><b>Foglalás fizetés</b></td>";
      echo "<td><b>Helyszíni fizetés</b></td>";
      echo "<td><b>Komment</b></td>";
      echo "<td><b>Foglal/Ajánlatot kér</b></td>";
      echo "<td><b>Gyerek szám</b></td>";
      echo "<td><b>1. gyerek kor</b></td>";
      echo "<td><b>2. gyerek kor</b></td>";
      echo "<td><b>3. gyerek kor</b></td>";

      echo "</tr>";
      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          foreach ($row as $field => $value) {
              echo "<td>" . $value . "</td>";
          }
          echo "</tr>";
      }
      echo "</table>";
?>

</div>
</div>
</body>



<script>

today = new Date();
currentMonth = today.getMonth();
currentYear = today.getFullYear();

months = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);


function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}

function showCalendar(month, year) {

    let firstDay = (new Date(year, month)).getDay();

    tbl = document.getElementById("calendar-body"); // body of the calendar


    tbl.innerHTML = "";


    monthAndYear.innerHTML = months[month] + " " + year;
    currentYear.value = year;
    currentMonth.value = month;


    let date = 1;
    for (let i = 0; i < 6; i++) {

        let row = document.createElement("tr");

        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {
                cell = document.createElement("td");
                cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
            }
            else if (date > daysInMonth(month, year)) {
                break;
            }

            else {
                cell = document.createElement("td");
                cellText = document.createTextNode(date);

                var cell_btn = document.createElement("INPUT");
                cell_btn.setAttribute("type", "button");
                cell_btn.setAttribute("style","width: 20px;");
                cell_btn.setAttribute("value",date);
                cell_btn.setAttribute("id",year+"-"+months[month]+"-"+date);
                cell_btn.setAttribute("class", "clk_btn");

                //cell_btn.setAttribute("id", date);

                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {

                    cell_btn.style.color="blue";
                }

                cell_btn.appendChild(cellText);
                cell.appendChild(cell_btn);
                row.appendChild(cell);
                date++;
            }


        }

        tbl.appendChild(row);
    }

}


$('.clk_btn').click(function(){
    var clkd_btn = document.getElementById(this.id);
    if(clkd_btn.name == ""){
        clkd_btn.style.color="red";
        clkd_btn.setAttribute("name", "c");
    }else{
        clkd_btn.style.color="black";
        clkd_btn.setAttribute("name", "");
        }
});


function gatherall(){
var elems = document.querySelectorAll("input[type=button]");
var btname = "save_calendar";
var arr = new Array(elems.length);
for(i = 0; i<elems.length; i++){
    if(elems[i].name == "c"){
        arr[i] = elems[i].id;
    }
}

$.ajax({

      url:'update.php',
      method:'POST',
      data:{
         btname:btname,
         arr:arr
         },
         success:function(response){
            alert("Mentve!");
         }
      });

}






// check how many days in a month code from https://dzone.com/articles/determining-number-days-month
function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}

/*
Ezen lett módosítva:
https://medium.com/@nitinpatel_20236/challenge-of-building-a-calendar-with-pure-javascript-a86f1303267d
a naptár rész.

*/

</script>


<?php
$checkedarr = "";
$finres = "";
$query = $db->query("SELECT * FROM book_calendar");
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $checkedarr .= $row['bookedate'].",";
                     }
                }
         $finres = rtrim($checkedarr,',');
?>


<script type="text/javascript">

$(document).ready(function(){
var dbarr = "";
    dbarr = (<?php print json_encode($finres);?>);
    var resarr = dbarr.split(',');
    var findbtns = document.querySelectorAll("input[type=button]");

    for(i=0;i<findbtns.length; i++)
    {
        for(k=0;k<resarr.length; k++){
        if(findbtns[i].id === resarr[k]){
            findbtns[i].style.color="red";
            findbtns[i].setAttribute("name", "c");
        } /*else{
            findbtns[i].style.color="black";
            findbtns[i].setAttribute("name", "");
        }*/
        }
    }


});

</script>
</body>
</html>