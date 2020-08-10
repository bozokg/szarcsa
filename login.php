<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Kisszárcsa Admin login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Kisszárcsa vendégház</title>
    <style type="text/css">
    .input-group{
    padding-top: 1%;
    }
    </style>
</head>
<body>


<header >
    <div style="background: #555; color: #f1f1f1; text-align: center; width: 100%">
    <h1>Kisszárcsa</h1>
    </div>
</header>
<div style="margin: auto; position: absolute; display: block; margin-left: 40%;">
<div class="header">
    <h2>Login</h2>
</div>
<form method="post" action="login.php">

    <?php echo display_error(); ?>

    <table>

    <tr>
        <td><label>Username</label></td>
        <td><input class="message_button" type="text" name="nevmezo" ></td>
    </tr>
    <tr>
        <td><label>Password</label></td>
        <td> <input class="message_button" type="password" name="jelszomezo"></td>
    </tr>

    </table>
    <div class="input-group">
            <button class="message_button" type="submit" class="btn" name="login_btn">Login</button>
        </div>

</form>
</div>
</body>
</html>
