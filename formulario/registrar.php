<?php
include 'cn.php';
//recibir los datos y almacenarlos en variables
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$telefono = $_POST["telefono"];
//consulta para insetar a bd
$insertar = "INSERT INTO usuarios (nombre, apellido, correo, usuario, clave, telefono) VALUES ('$nombre','$apellido','$correo','$usuario','$clave','$telefono')";
//validar y verificar usuario
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios where usuario = '$usuario'");
if(mysqli_num_rows($verificar_usuario) > 0){
  echo '<script>
      alert("El usuario ya está registrado");
      window.history.go(-1);
  </script>';
  exit;
}
//validar y verificar correo
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios where correo = '$correo'");
if(mysqli_num_rows($verificar_correo) > 0){
  echo '<script>
      alert("El correo ya está registrado");
      window.history.go(-1);
  </script>';
  exit;
}
//ejecutar consulta
$resultado = mysqli_query($conexion, $insertar);
if(!$resultado){
  echo '<script>
      alert("Error al registrarse");
      window.history.go(-1);
  </script>';
}else {
  echo '<script>
      alert("Usuario ha sido registrado exitosamente");
      window.history.go(-1);
  </script>';
}
// cerrar conexion
mysqli_close($conexion);
?>
