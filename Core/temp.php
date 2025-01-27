<?php
$host = '52.77.146.31';
$port = 6543;

$connection = @fsockopen($host, $port, $errno, $errstr, 5);

if (!$connection) {
    echo "PHP socket connection failed: $errstr ($errno)\n";
} else {
    echo "PHP socket connection succeeded: Connected to $host on port $port\n";
    fclose($connection);
}