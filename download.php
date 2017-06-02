<?php
include "function.php";
//Jika cookie random_karakter yang di enkripsi ada
if(isset($_COOKIE[base64_encode('random_karakter')])){
$decode_url = decode_url($_SERVER['REQUEST_URI']);
$cookie = base64_decode($_COOKIE[base64_encode('random_karakter')]);
$random = $decode_url['random'];
$file = $decode_url['file'];
 if($cookie == $random){
 //Jika file ada maka ganti Header php sesuai type file
 if(file_exists($file)){
 header("Content-Type: application/zip");
 header("Content-Disposition: attachment; filename=".basename($file));
 header("Content-Length: ".filesize($file));
 readfile($file);
}
 else{
 //Jika file tidak ada
 echo "Maaf, file <b>$file</b> tidak tidak ditemukan, mungkin sudah dihapus! <a href='index.php'>index.php</a>";
 }
}
 else{
 echo "Random karakter ($random) salah, silahkan diproses ulang! <a href='index.php'>index.php</a>";
 }
}
 else{
 //Jika cookie tidak ada
 echo "Maaf, sesi download anda telah berakhir! Silahkan dicoba kembali <a href='index.php'>index.php</a>";
}
exit;
?>
