<?php
include("./src/config.php");
include('./class/userClass.php');
$userClass = new userClass();

$errorMsgReg='';
$errorMsgLogin='';
/* Login Form */
if (!empty($_POST['loginSubmit'])) 
{
    $usernameEmail=$_POST['usernameEmail'];
    $password=$_POST['password'];
    if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
    {
        $uid=$userClass->userLogin($usernameEmail,$password);
        if($uid)
        {
            $url=BASE_URL.'../bnpro/menu.html';
            header("Location: $url"); // Page redirecting to home.php 
        }
        else
        {
            $errorMsgLogin="No tiene acceso. Por favor, consulte con el Administrador";
        }
    }
}

/* Signup Form */
if (!empty($_POST['signupSubmit'])) 
{
    $username=$_POST['usernameReg'];
    $email=$_POST['emailReg'];
    $password=$_POST['passwordReg'];
    $name=$_POST['nameReg'];
/* Regular expression check */
    $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
    $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-Z]{2,4})$~i', $email);
    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

    if($username_check && $email_check && $password_check && strlen(trim($name))>0) 
    {
        $uid=$userClass->userRegistration($username,$password,$email,$name);
        if($uid)
        {
            $url=BASE_URL.'../bnpro/bnpro.php';
            header("Location: $url"); // Page redirecting to home.php
        }
        else
        {
        $errorMsgReg="Usuario ya existe.";
        }
    }
}
?>

<h2>Bienvenido al Sistema BNPRO ADSO</h2>
<link href="css/login.css" media="screen" rel="stylesheet" type="text/css" />
<div id="login">
<h3>Login BNPRO</h3>
<form method="post" action="" name="login">
<label>Usuario ó Correo</label>
<input type="text" name="usernameEmail" autocomplete="off" />
<label>Clave</label>
<input type="password" name="password" autocomplete="off"/>
<div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
<input type="submit" class="button" name="loginSubmit" value="Acceso">
</form>
</div>

<div id="signup">
<h3>Reg. Nuevo Usuario ADSO</h3>
<form method="post" action="" name="signup">
<label>Nombre</label>
<input type="text" name="nameReg" autocomplete="off" />
<label>Correo</label>
<input type="text" name="emailReg" autocomplete="off" />
<label>Usuario</label>
<input type="text" name="usernameReg" autocomplete="off" />
<label>Clave</label>
<input type="password" name="passwordReg" autocomplete="off"/>
<div class="errorMsg"><?php echo $errorMsgReg; ?></div>
<input type="submit" class="button" name="signupSubmit" value="Enviar">
</form>
</div>