<?php
//创建websocket服务器对象，监听0.0.0.0:9502端口
$server = new swoole_websocket_server("0.0.0.0", 2347);

$server->on('open', function (swoole_websocket_server $server, $request) {
//    echo "server: handshake success with fd{$request->fd}\n";
    file_put_contents( __DIR__ .'/log.txt' , $request->fd);
});

$server->on('message', function (swoole_websocket_server $server, $frame) {
//    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";

    $data = $frame->data;
    $m = file_get_contents(__DIR__ . '/log.txt');
    for ($i = 1; $i <= $m; $i++) {
        echo PHP_EOL . '  i is  ' . $i . '  data  is ' . $data . '  m = ' . $m;
        $server->push($i, $data);
    }
    
//    $server->push($frame->fd, $frame->data);
});
//
//$server->on('close', function ($ser, $fd) {
//    echo "client {$fd} closed\n";
//});

$server->start();


