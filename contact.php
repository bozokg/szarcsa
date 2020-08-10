<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Kisszárcsa vendégház</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
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

<div style="text-align: left;">
    <center>
    <p>Kedves Vendégünk!</p>
    <p>Címünk: 2484 Agárd Kazinczy utca 19.</p>
    <p>Email: info@kisszarcsa.hu</p>
    <p>Telefon: 06209451797</p>
    <p>Lépjen velünk kapcsolatba, küldjön üzenetet!</p>
        </center>

</div>
<div style="padding: 20px; widht: 80%;" enctype='multipart/form-data'>

    <form class="contact_form" method="post" id="contact_frm">
            <input style="height: 20px" type="text" class="font_size"  name="name" id="name" placeholder="Név" required/>
            </br>
        <input style="height: 20px" type="email" class="font_size" name="name" id="email" placeholder="Email cím" required/>
        </br>
        <textarea name="szoveg" id="szoveg" class="font_size" rows="5"
                  placeholder="Üzenet szövege..." required></textarea>
                  <center><div style="padding-top: 5px;" class="g-recaptcha" data-sitekey="6Lcqm_UUAAAAAKMqyQeL_rfDG__7GlD5q6drz6b_"></div></center>
        <input class="message_button" type="submit" id="sendcontbtn" method="post" value="Üzenet elküldése" />

    </form>

</div>


<div class="mappoz">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3712.194059018967!2d18.611596197863644!3d47.18845532309054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x640c41e756f4f01b!2zS2lzIFN6w6FyY3NhIFZlbmTDqWdow6F6!5e1!3m2!1shu!2shu!4v1558351901951!5m2!1shu!2shu" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
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

</div>
<script>

    //$('#sendcontbtn').click(function(e){


        $('#contact_frm').on('submit', function(){
alert("Köszönjük! Üzenetét elküldtük!");
        var contname = document.getElementById("name");
        var contemail = document.getElementById("email");
        var context = document.getElementById("szoveg");
        var datas = contname.value + ";" + contemail.value + ";" + context.value;

        $.ajax({
            type: "POST",
            url: "update.php",
            data:{datas:datas},
            success:function(data){

            },
        });
   //     });

    });

</script>

</body>
</html>