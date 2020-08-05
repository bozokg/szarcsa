
<?php
include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kisszárcsa vendégház</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 1%;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #555;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 100%;
            width: 26px;
            left: 4px;
            bottom: 0 px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {

        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 26px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>
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


<div style="padding: 5% 0% 5% 0%;">
<table style="width: 50%; margin:auto; border: 1px inset brown; border-radius: 10px; transition: 0.7s; ">
    <tr>
        <th id="book_form" name="book_form">
        <div>
            <form method="post" id="form_id">
                <div style="width: 100%; height: 10%; position: relative;">
                    <table>
                        <tr>
                            <td><label><font size="5">Foglalás/Ajánlatkérés</font></label></td>
                            <td><center><img src="logo2.jpg" style="height: 60%; width: 60%; float: right; padding-left: 1px;"></center></td>
                        </tr>
                    </table>
                </div>
                <legend style="position: relative;"> Személyes adatok: </legend><br/>


<table style="position:relative; width: 90%; margin:auto;">

<tr>
    <td><label class="label_1">Név</label></td>
    <td><input type="text" name="nm" class="label_1 message_button" placeholder="Mekk..." required></td>
    <td style="padding-left: 5px;"><label >Lakcím</label></td>
    <td><input type="text" class="label_1 message_button" name="lakcim" id="lakcim" placeholder="Budapest, xyz utca"></td>
</tr>
<tr>
    <td><label>E-mail</label></td>
    <td><input  type="email" class="label_1 message_button" name="email" id="email"  placeholder="elek@..." required/></td>
    <td style="padding-left: 5px;"><label>Telefon</label></td>
    <td ><input  type="number"class="label_1 message_button" name="phone" id="phone"  placeholder="+36301234567" required/></td>
</tr>

</table >
                <br>
                <table style="padding: 5px 0px 5px 0px; width: 70%; margin: auto;">
                    <tbody style="padding: auto;" >
                    <tr>
                        <td style="width: 80px; height: 25px; float: left; position: relative; transition: 0.7s; border-radius: 10px;">
                            <div>
                                <input type="button" for="foglal" id="chooseleft" value="Foglalok" style="width: 80px; height: 25px; float: left; position: relative; background-color: #47DA8A; transition: 0.7s; border-radius: 10px;"/>
                            </div>
                        </td>
                        <td style="padding: 0% 5% 0% 5%; position: relative;">
                            <div>
                                <label class="switch">
                                    <input id="chosebtn" type="checkbox">
                                    <span class="slider round" id="slider" value="Foglalok"></span>
                                </label>
                            </div>
                        </td>
                        <td style="float:right; padding-left: 5%; position: relative; width: 170px; height: 25px;">
                            <div>
                                <input type="button" id="chooseright" value="Árajánlatot kérek" style="white-space: nowrap;float:right; padding-left: 5%; position: relative; width: 170px; height: 25px;transition: 0.7s; border-radius: 10px;"/>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <!-- eldöntendő chechboxok vége-->
                <!-- dáutm, érkezés, távozás-->
                <div style="width: 100%; position: relative; padding: 2% 0% 2% 0%;">
                    <table style="margin: auto; border: 1px ridge brown; border-radius: 10px; transition: 0.7s;">
                        <tr>
                            <th>
                                <label style="display: block;">Érkezés</label>
                                <input type="date" name="erkezes" id="erkezes" min="2020-01-01" max="2030-01-01" class="label_1 message_button" required/>
                            </th>
                            <th>
                                <label style="display: block;">Távozás</label>
                                <input type="date" name="tavoz" id="tavoz" min="2020-01-01" max="2030-01-01" class="label_1 message_button" required/>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <div class="dropdown">
                                    <label style="display: block;">Felnőtt</label>
                                    <select id = "adult" class="label_1 message_button">
                                        <option value = "1">1</option>
                                        <option value = "2">2</option>
                                        <option value = "3">3</option>
                                        <option value = "4">4</option>
                                    </select>
                                </div>
                            </th>
                            <th>
                                <label style="display: block;">Gyerek</label>
                                <select id="child" class="chld_data message_button" required/>
                                    <option value = "0" >0</option>
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
                                <select id = 'age' class="chld_data message_button" required/>
                                    <option></option>
                                </select>
                            </th>
                        </tr>

                    </table>

                </div>
                <div style=" padding: 2% 0% 2% 0%;">
                    <label style=" width: 50%;">Szobatipus:</label>
                    <select id = "room_type" class="label_1 message_button" required/>
                        <option value = "" selected disabled hidden>Kérem válasszon</option>
                        <option value = "Classic francia ágyas">Classic francia ágyas</option>
                        <option value = "Classic 2+1 ágyas">Classic 2+1 ágyas</option>
                        <option value = "Apartman">Apartman</option>
                    </select>
                </div>


                <div style=" padding: 2% 0% 2% 0%;">
                  <label style=" width: 50%;">Csomagajánlatok:</label>
                  <select id = "package_type" class="label_1 message_button" required/>
                     <option value = "" selected disabled hidden>Kérem válasszon</option>
                     <option value = "Ajánljon nekem a vendégház">Ajánljon nekem a vendégház</option>
                <?php

                     $query = $db->query("SELECT * FROM pckg where checked ='1'");
                if($query->num_rows > 0){
                $count = mysqli_num_rows($query)+ 1;
                while($row = $query->fetch_assoc()){
                $name = $row["pckg_name"];

                echo "<option value = ".$name.">".$name."</option>";
                ?>
                <?php   }
                 }else{ ?>
                <p>No image(s) found...</p>
                <?php } ?>
                </select>
                </div>

                <div style="padding: 2% 0% 2% 0%;">
                <label style="width: 50%;">Foglaló fizetésének módja: </label>
                    <select id = "foglalo" class="label_1 message_button" required/>
                        <option value = "" selected disabled hidden>Kérem válasszon</option>
                        <option value = "Banki átutalás">Banki átutalás</option>
                        <option value = "Szép kártya (OTP, K&H, MKB)">Szép kártya (OTP, K&H, MKB)</option>
                    </select>
                </div>
                <div style="padding: 2% 0% 2% 0%;">
                <label style="width: 50%;">Helyszíni fizetés módja:</label>
                <select id = "fizetes" class="label_1 message_button" required/>
                    <option value = "" selected disabled hidden>Kérem válasszon</option>
                    <option value = "Készpénz">Készpénz</option>
                    <option value = "Szép kártya (OTP, K&H, MKB)">Szép kártya (OTP, K&H, MKB)</option>
                </select>
                </div>

                <center><textarea name="szoveg" id="textarea" class="font_size" rows="5" style="" maxlength="250" placeholder="Ide írhatja megjegyzéseit,igényeit, egyéb kéréseit!"></textarea></center>
                <center><label>Hozzájárulok az adataim tárolásához a személyre szabottabb ajánlatokért </label><input id="approve" type="checkbox" required/></center>
                <center><div style="padding-top: 5px;" class="g-recaptcha" data-sitekey="6Lcqm_UUAAAAAKMqyQeL_rfDG__7GlD5q6drz6b_"></div></center>
                <input class= "message_button" type="submit" method="post" id="sendbtn" value="Elküld" />
            </form>

        </div></th>

    </tr>

</table>


</div>

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

<script>
var num =  document.getElementById('child');
function dropdownhandle(){

        var i=1;
        var allkids = num.value;
         var show = document.getElementById('ChildAgeSelect');
         var childnumshow = document.getElementById('chldnum');
         var field= document.getElementById("agechoose");

        field.innerHTML ="";
         childnumshow.innerHTML="";
         var break_row = document.createElement('br');
         if(allkids > 0)
         {
            show.style.display = "block";
             for(i=1;i<=allkids;i++)
             {
                 childnumshow.innerHTML += i+". gyerek<br>";
                 var createAgeList = document.createElement("select");
                           createAgeList.id = "select"+i;
                           createAgeList.setAttribute("class","chld_data");
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
         else
         {
         show.style.display = "none";
         }
}

$( "#child" ).change(function(){
        dropdownhandle();
    });

$(document).ready(function(){
    if(setch != null || setch > 0){
    dropdownhandle();
    for(i=1;i<=setch.value; i++){
        document.getElementById("select"+i).value = window.localStorage.getItem('select'+i);

        }
    }


});



</script>


<script>

    $(document).ready(function(){
                     $("input").click(function(){
                        var clkinp = $(this).attr('id');
                        var left = document.getElementById('chooseleft');
                        var right = document.getElementById('chooseright');
                        if(clkinp == "chosebtn"){
                           if(!document.getElementById('chosebtn').checked){

                               left.style.backgroundColor = "#47DA8A";
                               left.style.transition = "0.7s";
                               left.style.borderRadius = "10px";
                               left.style.backgroundSize = "50px 50px";
                               right.style.backgroundColor = "white";
                            }
                           else{

                               left.style.backgroundColor = "white";
                               right.style.backgroundColor = "#47DA8A";
                               right.style.transition = "0.7s";
                               right.style.borderRadius = "10px";
                           }
                        }
                        if(clkinp == "chooseleft"){
                             document.getElementById('chosebtn').checked = false;
                             left.style.backgroundColor = "#47DA8A";
                             left.style.transition = "0.7s";
                             left.style.borderRadius = "10px";
                             left.style.backgroundSize = "50px 50px";
                             right.style.backgroundColor = "white";
                        }
                        if(clkinp == "chooseright"){
                            document.getElementById('chosebtn').checked = true;
                            left.style.backgroundColor = "white";
                            right.style.backgroundColor = "#47DA8A";
                            right.style.transition = "0.7s";
                            right.style.borderRadius = "10px";
                        }
    				 });
    });
</script>




<script>
if(typeof(localStorage.getItem('adult'))!= 'undifined'){

    var geterk = window.localStorage.getItem('erkez');
    var gettav = window.localStorage.getItem('tavoz');
    var getad = window.localStorage.getItem('adult');
    var getch = window.localStorage.getItem('child');
    var seterk = document.getElementById("erkezes");

    seterk.value = geterk;
    var settav = document.getElementById("tavoz");
    settav.value = gettav;
    var setad = document.getElementById("adult");
    setad.value = getad;
    var setch = document.getElementById("child");
    setch.value = getch;

    window.localStorage.setItem('erkez', "");
    window.localStorage.setItem('tavoz', "");
    window.localStorage.setItem('adult', "");
    window.localStorage.setItem('child', "");
}

</script>

<script>





 $('#book_form').on('submit',function(){

                         var chlddatas = document.getElementsByClassName("chld_data");
                         var btname = $(this).attr('id');
                         var resclass = document.querySelectorAll(".label_1");
                         var txtarea = document.getElementById("textarea");
                         var stdate = document.getElementById("erkezes");
                         var endate = document.getElementById("tavoz");
                         if(parseInt(stdate.value.substr(7,)) < parseInt(endate.value.substr(7,))){
                                     alert("Az érkezés később van mint a távozás!");

                                }else{
                                 dateisreal = 1;
                                }

                         dbarr = (<?php print json_encode($finres);?>);
                         var resarr = dbarr.split(',');
                         var isitoke = 0;
                         var isitokt = 0;
                         var appok = 0;
                         var convarr = resarr.join(' ');
                         var approvedchck = document.getElementById("approve");

                             if(convarr.indexOf(stdate.value) > -1 ){
                             alert("A megadott érkezési időpont már foglalt!");

                             }else{
                             isitoke = 1;
                             }

                             if(convarr.indexOf(endate.value) > -1 ){
                             alert("A megadott távozási időpont már foglalt!");

                             }else{
                             isitokt = 1;
                             }

                 if(isitoke == 1 && isitokt == 1 && dateisreal==1 ){


                         var lorr = "";
                         var res = "";
                         var chldfill = [];
                         var alltg = [];
                         if(!document.getElementById("chosebtn").checked){
                             lorr = document.getElementById("chooseleft");
                         }else{
                             lorr = document.getElementById("chooseright");
                         }
                         for(i=1; i<resclass.length; i++){
                             res += resclass[i].value+";";
                             }
                         for(y=0; y<chlddatas.length; y++){
                            chldfill[y] = chlddatas[y].value;
                         }

                         for(x=chldfill.length; x<4; x++){
                            chldfill[x] = "0";
                         }
                        var rep = chldfill.join(';');
                        alltg = res+txtarea.value+";"+lorr.value+";"+rep;

                        var jsvar = JSON.stringify(alltg);


                        $.ajax({
                               type: "POST",
                               url: "functions.php",
                               data:{btname:btname,
                               jsvar:jsvar},
                               success:function(response){

                                location.href = "resp.html";
                                }

                             });

                        }else{
                        return false;
                        }

//}
                   });
</script>


</body>
</html>