<?php
$socket = @stream_socket_server('tcp://127.0.0.1:8888', $errno, $errstr, STREAM_SERVER_BIND | STREAM_SERVER_LISTEN);
if ($socket) {
    echo "Socket creation successful on port 8888\n";
    fclose($socket);
} else {
    echo "Socket creation failed: $errstr (Error: $errno)\n";
}
?>
