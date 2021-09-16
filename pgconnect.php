<?php
// $host        = "host=0.tcp.ngrok";
// $port        = "port=19109";
// $dbname      = "dbname=my_database";
// $credentials = "user=postgres password=1234";

// $connect = pg_connect("$host $port $dbname $credentials");
// if (!$connect) {
//     echo "Error : Unable to open database\n";
// }
// echo "test";

$conn = pg_connect("host=localhost dbname=my_database user=postgres password=1234");

if ($conn) {

// echo 'Connection attempt succeeded.';

} else {

echo 'Connection attempt failed.';

}
?>