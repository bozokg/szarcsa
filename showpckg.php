<!DOCTYPE html>
<?php
include('functions.php');
?>
<head>
    <meta charset="UTF-8">
    <title>Kisszárcsa vendégház</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
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
<div style="margin: auto; position:relative; width: 50%; padding: 10px; text-align: center;">

<table style="margin: auto; position:relative; width: 50%; padding: 10px; text-align: center;">

    <tr>
        <td><button class="message_button" onclick="location.href='csmga.php';">Vissza</button></td>
    </tr>
    <tr>
        <td><?php

            if($_GET['pckg']){
                            $ids = $_GET['pckg'];
                            $query = $db->query("SELECT * FROM pckg where id ='$ids'");
                            if($query->num_rows > 0){
                            $count = mysqli_num_rows($query);
                            while($row = $query->fetch_assoc()){

                             $pic = $row["img"];
                             $name = $row["pckg_name"];
                             $text = $row["pckg_text"];
                             $desc = $row["pckg_desc"];
                             $cost = $row["pckg_cost"];
                            ?>
                                <div class="hover01">
                                    <figure><img src="<?php echo $pic; ?>" style="object-fit: contain;"/></figure>
                                    <span>
                                        <h3><?php echo $name; ?></h3>
                                        <article><?php echo $desc ?></article>
                                        <article><?php echo $text; ?></article>
                                        <article><?php echo $cost ." FT+Áfa"; ?></article>

                                    </span>
                                </div>
                            <?php   }
                             }else{ ?>
                            <p>No content found...</p>
                            <?php }
                            }

            ?></td>
    </tr>
</table>



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

</body>
</html>