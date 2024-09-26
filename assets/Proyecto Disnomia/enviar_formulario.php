<?php
// Configuración de correo electrónico
$destinatario = "disnomiatatt@gmail.com";
$asunto = "Mensaje de contacto de tu web";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Recuperar los datos del formulario
  $nombre = $_POST["nombre"];
  $email = $_POST["email"];
  $mensaje = $_POST["mensaje"];

  // Validar los datos
  if (empty($nombre) || empty($email) || empty($mensaje)) {
    echo "Por favor, complete todos los campos.";
    exit;
  }

  // Enviar el correo electrónico
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "X-Mailer: PHP/" . phpversion();

  $cuerpo = "Nombre: $nombre\r\n";
  $cuerpo .= "Correo electrónico: $email\r\n";
  $cuerpo .= "Mensaje: $mensaje\r\n";

  mail($destinatario, $asunto, $cuerpo, $headers);

  // Mostrar un mensaje de confirmación
  echo "Gracias por enviar su mensaje. Nos pondremos en contacto con usted pronto.";
} else {
  // Si no se ha enviado el formulario, mostrar un mensaje de error
  echo "Error al enviar el formulario. Por favor, inténtelo de nuevo.";
}
?>