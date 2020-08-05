<!DOCTYPE html>
<?php
include('functions.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kisszárcsa vendégház</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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


<div style="width: 100%;">
<?php
$num = 0;
if(isset($_POST["21"])){
$num = 21;
}
if(isset($_POST["22"])){
$num = 22;
}
if(isset($_POST["23"])){
$num = 23;
}
if(isset($_POST["24"])){
$num = 24;
}

?>

<center><div style="width: 80%; height: 70%; left:10%; right:10%;margin: auto; object-fit: contain; overflow: hidden; padding:1px; position: absolute; display: none;" id="show">
    <button id="bck" class="message_button" style="z-index: 10; position:absolute; left: 20px; top: 20px; display: inherit;">Vissza</button>
    <img class="sldshow" style="width: 100%; height: 100%; object-fit: cover; overflow: hidden; display: inline-block;" />
    <a class="prev" style="display: inherit;" onclick="plusSlides(-1, 0)">&#10094;</a>
    <a class="next" style="display: inherit;" onclick="plusSlides(1, 0)">&#10095;</a>

</div></center>
<div class="slideshow-container">
<div id="playground" style="padding: 3% 0% 3% 0%; position:relative; display: block; width:100%; height: 100%;">

<?php
      $query = $db->query("SELECT * FROM piccontent where upload_frm_num = $num AND type = 'pic' and checked = '1';");/*itt az swl querybe lehetne szűrni a pipált doloklegyenek elől a többi pedig dátum szerint*/
      if($query->num_rows > 0){
         while($row = $query->fetch_assoc()){
            $imageURL = $row["name"];
            $id = $row["Id"];

            ?>

            <div style="width: 300px; height: 169px; position: relative;  margin: auto; display: inline-block; padding-left: 2.5%;"> <!-- class="mySlides2" -->
            <form method="post" name="fstform" id="fstform" style="padding-top: 10px; width:300px; height:169px;">
                         <?php print '<img style="width:100%; height:100%; object-fit:cover; position: absolute; border-radius: 5px;cursor:pointer;" class="pics" id="'.$id.'" src="'.$imageURL.'"/>'; ?>
                    </form>
                    </div>
                         <?php }
                            }else{ ?>
                            <p>No image(s) found...</p>
                         <?php } ?>

            </div>
</div>
</div>


<div>
    <td><button class="message_button" onclick="location.href='galery.html'">Vissza</button></td>
</div>

<footer style="background-color: #333; margin-top: auto; clear: both; position: absolute; bottom:0; width:100%">
    <table style="margin: auto; width:80%; padding: 1px 0px 1px 0px;">
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


<script>


$(document).ready(function(){
    var curr = "";
    int = 0;
    var allpc = document.getElementsByClassName(".pics");
            $(".pics").click(function(){
                var pc = document.getElementById("show");
                var getsrc = $(this).attr('src');
                var getid = $(this).attr('id');
                var bckbtn = document.getElementById("bck");
                $(".sldshow").attr('src',getsrc);
                $(".sldshow").attr('id',getid);
                pc.style.zIndex = "2";
                pc.style.display = "block";
                curr = $(this).attr('id');
            });
            $("#bck").click(function(){
                var pc = document.getElementById("show");
                pc.style.display = "none";
                $(".sldshow").attr('src',"");
            });

            $(".prev").click(function(){
                var allpc = document.getElementsByClassName("pics");
                    for(i=0; i<=allpc.length; i++){
                            if(i<1){
                                i == allpc.length;
                            }else{
                            if(allpc[i].id == curr){
                                var prevpc = document.getElementById(allpc[i-1].id).getAttribute('src');
                                curr = allpc[i-1].id;
                                $(".sldshow").attr('id',curr);
                                $(".sldshow").attr('src', prevpc);
                            }}}
            });
            $(".next").click(function(){
                 var allpc = document.getElementsByClassName("pics");
                    for(i=0; i<allpc.length; i++){
                      if(allpc[i].id == curr){
                              var nextpc = document.getElementById(allpc[i+1].id).getAttribute('src');
                              curr = allpc[i+1].id;
                              $(".sldshow").attr('id', curr);
                              $(".sldshow").attr('src', nextpc);
                              break;
                    }
                    if(allpc.lenght >i){ i == 0;}
                }
            });
});
</script>



<script>

/*


    var slideIndex = [1,1];
    var slideId = ["sldshow"];  //"mySlides2"
    showSlides(1, 0);
    //showSlides(1,1);

    function plusSlides(n, no) {
        showSlides(slideIndex[no] += n, no);
    }

    function showSlides(n, no) {
        var i;
        var x = document.getElementsByClassName(slideId[no]);
        if (n > x.length) {slideIndex[no] = 1}
        if (n < 1) {slideIndex[no] = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex[no]-1].style.display = "block";
    }
*/
</script>
<!--
<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides2");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 5000); // Change image every 2 seconds
    }
</script>
-->

</body>
</html>