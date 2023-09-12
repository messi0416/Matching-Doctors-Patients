<?php
$servers = array(
    array("smtp.gmail.com", 465),
    array("smtp.gmail.com", 587),
);

foreach ($servers as $server) {
    list($server, $port) = $server;
    echo "<h1>Attempting connect to <tt>$server:$port</tt></h1>\n";
    flush();
    $socket = fsockopen($server, $port, $errno, $errstr, 10);
    if(!$socket) {
      echo "<p>ERROR: $server:$portsmtp - $errstr ($errno)</p>\n";
    } else {
      echo "<p>SUCCESS: $server:$port - ok</p>\n";
    }
    flush();
}