<?php
//创建websocket服务器对象，监听0.0.0.0:9502端口
    $server = new swoole_websocket_server("0.0.0.0", 2347);

    $server->on('open', function (swoole_websocket_server $server, $request) {
    //    echo "server: handshake success with fd{$request->fd}\n";
    });

    $server->on('message', function (swoole_websocket_server $server, $frame) {
    //    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";

    $data = $frame->data;
    $pattern = '/[艹|操|淫|荡|奸]/u';
    $data =preg_replace($pattern,'*',$data);
    foreach ($server->connections as $fd) {
    //        echo PHP_EOL . '  i is  ' . $k . '  data  is ' . $data;
    $server->push($fd, $data);
    }

    //    $server->push($frame->fd, $frame->data);
    });
    //
    $server->on('close', function ($server, $fd) {
    //    echo "client {$fd} closed\n";
    });

    $server->start();

