<!DOCTYPE html>
<?php
include('functions.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Kisszárcsa vendégház</title>
</head>
<body style="background-color: white;">

<header >
  <!--  <div class="headstyle">
    <h1>Kisszárcsa</h1>
    </div> -->
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
    <button onclick="topFunction()" id="totopbtn" class="totopbtn" title="Az oldal tetejére">▲</button>

</ul>

<div class="slideshow-container">
    <!--<div style="position: absolute; margin-top: 20%; padding-left: 25%; width: 40%; float:right; border-color: white; border: thin; color: white;"> -->
        <div style="float: right; position: absolute; display: inline-block; padding-left: 60%; padding-top: 5%; z-index: 1; ">
        <table class="bookpane" style=" float:right; display: inline; border: 1px solid; border-color: white; color: white; background:blue, 0.7;">
        <td style="padding-left: 25%;">Foglalás/Ajánlatkérés</td>
        <tr>

            <th>
                <label for="erkezes" style="display: block;">Érkezés</label>
                <input class="message_button" type="date" min="2020-01-01" max="2030-01-01"  name="erkezes" id="erkezes">
            </th>
                <th>
                    <label for="tavoz" style="display: block;">Távozás</label>
                    <input class="message_button" type="date" min="2020-01-01" max="2030-01-01" name="tavoz" id="tavoz">
                </th>
        </tr>

            <tr>
                <th>
                    <div class="dropdown">
                        <label style="display: block;" >Felnőtt</label>
                        <select id = "adult" class="message_button">
                            <option value = "1">1</option>
                            <option value = "2">2</option>
                            <option value = "3">3</option>
                            <option value = "4">4</option>
                        </select>
                    </div>
                </th>
                <th>
                            <label style="display: block;">Gyerek</label>
                            <select id = "child" class="message_button">
                                <option value = "0">0</option>
                                <option value = "1">1</option>
                                <option value = "2">2</option>
                                <option value = "3">3</option>
                            </select>
                </th>
            </tr>
            <tr id="ChildAgeSelect" style="display:none;">
                <th>
                <label id="chldnum"></label>
                </th>
                <th id="agechoose">
                    <select id = 'age'>
                    <option></option>
                    </select>
                </th>
            </tr>
        <tr>
            <td></td>
            <td colspan="2" style="display: inline; position: relative; float: right; width: auto"><button type="submit" class="message_button" onclick="comp()" name="book_btn" id="book_btn" class="book_btn"/>Foglalás/ajánlatkérés</button></td>
        </tr>
        </table>

    </div>
                     <?php
                     $query = $db->query("SELECT * FROM piccontent where upload_frm_num = '1' AND checked ='1' AND type = 'pic';");
                     if($query->num_rows > 0){
                         while($row = $query->fetch_assoc()){
                             $imageURL = $row["name"];
                     ?>
                     <div class="mySlides1" style="height: 40%; object-fir: contain;">
                              <img src="<?php echo $imageURL; ?>" style="max-height: 400px; object-fit: cover;"/>
                          </div>
                        <?php }
                         }else{ ?>
                             <p>No image(s) found...</p>
                         <?php } ?>

    <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
     <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
</div>

<div style="padding-top: 3%; padding-bottom: 3%; margin: auto; width: 240px;">
<img src="logo2.jpg" style="width: 240px; height: 150px;"/>
</div>


<div style="margin: auto; padding-top: 30px; padding-bottom: 50px; padding-left: auto; position: relative; width: 100%;">
<div class="hover01 columnroom">

    <div style="cursor: pointer;">
        <figure ><a href="rooms.html"><img src="pics/galery/pc1.jpg"/></a></figure>
        <span>
            <h3>Classic franciaágyas szoba  </h3>
            <p>1-2 fő részére</p>
        </span>
    </div>
    <div style="cursor: pointer;">
        <figure><a href="rooms.html"><img src="pics/galery/pc1.jpg" /></a></figure>
        <span>
            <h3>2+1 ágyas szoba</h3>
            <p>Franciaágy+ egyszemélyes ágy 3 fő részére</p>
        </span>
    </div>
    <div style="cursor: pointer;">
        <figure><a href="rooms.html"><img src="pics/galery/pc1.jpg" /></a></figure>
        <span>
            <h3>Superior Apartman</h3>
            <p>2+2 ágyas, tetőtér, akár 4 fő részére</p>
        </span>
    </div>
</div>
</div>

<div style="width: 60%; margin: auto; padding:15px;  background-color: lightblue;" >
    <h4 style="text-align: center;">Vendégházunkról</h4>
    <div style="text-align: justify;"> A Kis Szárcsa Vendégház 1996 óta hat szobával meghitt környezetben fogadja vendégeit. Házunk egész évben nyitva tart, időszakosan szezonális csomagajánlatokkal! Szobáink között megtalálható Franciaágyas, 2+1 ágyas ( francia+egyszemélyes ágy) valamint tetőtéri apartmanunk! Minden szobánk antik bútorokkal egyedileg berendezett, légkondícionált és vezeték nélküli internettel felszerelt! Vendégeinknek lehetősége van használni közös nappalinkat, a vendégkonyhát ( Hűtő,főzőlap,mikróhullámú sütő, evőeszközök, tányérok,poharak). Mini- wellness részlegünk is egész évben várja Önöket ( szauna, pezsgőkád, masszázszuhany) Szabadon használható felnőtt kerékpárokat is biztosítunk, amire foglalást felvenni nem tudunk! Szobáinkhoz svédasztalos reggelit biztosítunk, melyet jó idő esetén akár teraszunkon is fogyaszthatnak! Vendégházunk az agárdi termál fürdőtől 600 méterre, míg a Velencei- tótol 1200 méterre nyugodt csendes utcában helyezkedik el! Szeretettel várjuk Önt is házunkban!</div>
    <p style="text-align: right;">A Kis Szárcsa Vendégház csapata</p>
</div>


<div class="slideshow-container">
<div style="padding: 3% 0% 3% 0%; position:relative; display: block; width:100%; height: 100%;">


                    <?php
                     // Get images from the database
                     $query = $db->query("SELECT * FROM piccontent where upload_frm_num = '2' AND checked ='1' AND type = 'pic';");
                     if($query->num_rows > 0){
                         while($row = $query->fetch_assoc()){
                             $imageURL = $row["name"];

                     ?>
                     <div class="mySlides2">
                              <img src="<?php echo $imageURL; ?>" style="max-height: 400px; object-fit: cover;"/>
                          </div>
                        <?php }
                         }else{ ?>
                             <p>No image(s) found...</p>
                         <?php } ?>

            <a class="prev" onclick="plusSlides(-1, 1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1, 1)">&#10095;</a>

</div>
</div>
<!--
Videó rész
-->
<div class="indvideo">
<iframe width="100%" height="315" src="https://www.youtube.com/watch?v=jm8FmRzZf_c&t=5s" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<!--
automatic slideshow contents
-->

<!--
Footer
-->
<footer style="background-color: #333; margin:0; ">
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

<style>
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
    }
</style>


<script>
function dropdown(){
document.getElementsByClassName("menu_items").classList.toggle("show");

    var items = document.getElementById("menu_items");
    items.display == "block"
    //for(i=0; i<items.length; i++)

    //items[i].style.display = "block";
}
</script>

<script>

$(document).scroll(function(){
 var totop = document.getElementById("totopbtn");
    if (document.documentElement.scrollTop > 200) {
        totop.style.display = "block";
      } else {
        totop.style.display = "none";
      }
});
function topFunction() {
    document.documentElement.scrollTop = 0;

}

</script>

<script>
    var slideIndex = [1,1];
    var slideId = ["mySlides1", "mySlides2"];
    showSlides(1, 0);
    showSlides(1, 1);

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
</script>

<!-- a gyerek kiválasztásnál megjeleníti az életkor kiválasztás dropdown-t -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#child").change(function(){
    var num =  document.getElementById('child');
    var i=1;
    var allkids = num.value;
    var show = document.getElementById('ChildAgeSelect');
    var childnumshow = document.getElementById('chldnum');
    var field= document.getElementById("agechoose");
    field.innerHTML ="";
    childnumshow.innerHTML="";
    var break_row = document.createElement('br');
         if (allkids > 0){
            show.style.display = "block";
             for(i=1;i<=allkids;i++){
                 childnumshow.innerHTML += i+". gyerek<br>";
                 var createAgeList = document.createElement("select");
                          createAgeList.id = "select"+i;
                              for(var y=1; y<=16; y++){
                                    var option = document.createElement("option");
                                    option.value = y;
                                    option.text = y;
                                    createAgeList.appendChild(option);
                              }
                 field.appendChild(createAgeList);
                 field.appendChild(document.createElement("br"));
             }
         }
         else{
         show.style.display = "none";
         }
  });
});


</script>




<script>
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("myMenu");
    var sticky = header.offsetTop;


    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");

        } else {
            header.classList.remove("sticky");

        }
    }
</script>

<!--
automatic slideshow
-->
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
        setTimeout(carousel, 4000);
    }
</script>


<script type="text/javascript">
function comp(){
       var dateisreal = 0;
       var dbarr = "";
       dbarr = (<?php print json_encode($finres);?>);
       var resarr = dbarr.split(',');
       var erk = document.getElementById("erkezes");
       var tav = document.getElementById("tavoz");
       if(parseInt(erk.value.substr(7,)) < parseInt(tav.value.substr(7,))){
            alert("Az érkezés később van mint a távozás!");
       }else{
        dateisreal = 1;
         }

var arrive = new Date();
arrive = erk.value;
var gtw = new Date();
gtw = tav.value;

var isitoke = 0;
var isitokt = 0;
var convarr = resarr.join(' ');


var cnt = 0;
for(i = arrive; i<=gtw; i++){
cnt++;
}
alert("cnt: "+cnt);
if(cnt>0){
    alert("A megadott intervallum foglalt napot foglal magában!");
}
if(erk.value == ""){
    alert("Az érkezési mező üres.");
}
if(tav.value == ""){
    alert("A távozási mező üres.");
}

if(convarr.indexOf(erk.value) > -1){
    alert("A megadott érkezési időpont már foglalt! Kérem válasszon másikat!");
}else{
    isitoke = 1;
}

if(convarr.indexOf(tav.value) > -1){
    alert("A megadott távozási időpont már foglalt! Kérem válasszon másikat!");
}else{
    isitokt = 1;
}

if(isitoke == 1 && isitokt == 1 && dateisreal==1 && cnt == 0){
    var adult = document.getElementById("adult");
    var child = document.getElementById("child");
    var seterk = window.localStorage.setItem('erkez', erk.value);
    var settav = window.localStorage.setItem('tavoz', tav.value);
    var setad = window.localStorage.setItem('adult', adult.value);
    var setch = window.localStorage.setItem('child', child.value);
    for(i=1; i<=child.value; i++){
        window.localStorage.setItem('select'+i,document.getElementById("select"+i).value);
        //alert(window.localStorage.getItem('select'+i));
    }

    location.href = "book.php";
}


};


/*

A frame változtatós slideshow és az automatic slideshow innen jött:
https://www.w3schools.com/w3css/w3css_slideshow.asp


*/

</script>
</body>
</html>