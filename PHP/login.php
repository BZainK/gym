<?php
/*LOGIN*/
@include '../PHP/config.php';

session_start();

if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   /*$cpass = md5($_POST['cpassword']);*/

   $select = "SELECT * FROM usuarios WHERE email = '$email' && password = '$pass'";
   $result = mysqli_query($conn, $select);
   if(mysqli_num_rows($result) > 0){
        header('location:../PHP/perfil.php'); /*Enviarlo a perfil*/
   }else{
      $error[] = '¡Email o Password Incorrectos!';
   }

};

?>

<?php
@include 'config.php';
if(isset($_POST['submit2'])){
   $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $select = " SELECT * FROM usuarios WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($conn, $select);
   if(mysqli_num_rows($result) > 0){
      $error[] = 'El usuario ya existe...!';
   }else{
        $insert = "INSERT INTO usuarios(nombre, email, password)     VALUES('$nombre','$email','$pass')";
        mysqli_query($conn, $insert);
        header('location:../PHP/login.php');
      }
   };
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Css/LoginSignInStyle.css">
    <!-- Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="../Images/gym4.jpg" alt="">
        <div class="text">
          <span class="text-1">No eres lo que logras<br> Eres lo que superas</span><br>
          <span class="text-2">IRONGYM</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="../Images/dieting.webp" alt=""> 
        <div class="text">
          <span class="text-1">Hazlo ahora,<br> porque a veces <br> mañana se convierte <br>en nunca</span><br>
          <span class="text-2">IRONGYM</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Iniciar Sesión</div>
              
              
          <form action="" method="post">
            <?php
              if(isset($error)){
                 foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                 };
              };
            ?>
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Ingrese su Email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password"  placeholder="Ingrese su contraseña" required>
              </div>
              <div class="text"><a href="#">¿Olvido  Contraseña?</a></div>
              <div class="button input-box">
                <input type="submit" name="submit" value="Iniciar">
              </div>
              <div class="text sign-up-text">¿No tienes una cuenta? <label for="flip">Registrarse</label></div>
            </div>
        </form>
              
              
      </div>
        <div class="signup-form">
          <div class="title">Registrarse</div>
            
            
        <form action="" method="post">
            <?php
              if(isset($error)){
                 foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                 };
              };
            ?>
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="nombre" placeholder="Ingrese su nombre" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Ingrese su Email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Ingrese su contraseña" required>
              </div>
              <div class="button input-box">
                <input type="submit" name="submit2" value="Registrarse">
              </div>
              <div class="text sign-up-text">¿Ya tiene una cuenta? <label for="flip">Iniciar Sesión</label></div>
            </div>
      </form>
            
            
    </div>
    </div>
    </div>
  </div>
</body>
</html>