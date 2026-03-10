<?php

header('Content-Type: application/json');
set_time_limit(30);

$url = "https://monitoramento.digiboard.com.br/zabbix/api_jsonrpc.php";

$token = "f3b9aef308176c9a34df8475b7d04d49fbc9015ab2a6c6675ed7478cb576ac8a";


$servidores = [

    "10736", // SRVLDD2020
    "10832", // SRVDGB088 - DB SISTEMAS
    // FALTA DEPOIS COLOCO
    // FALTA DEPOIS COLOCO
    "10864", // INSTITUTO JC
    "10655", // SRVDGB003 - NGINX CTD
    "10750", // SRVDGB029 - 147.1.160.40
    "10749", // SRVDGB023 - PDA 147.0.0.130
    "10760", // SRVDGB008 - 147.1.0.116
    "10743", // SRVDGB026 - SCRPSERVER-CELULAR 147.1.0.149
    "10742", // SRVDGB025
    "10751" //  SRVDGB028 - SFCSWEB2 

];



$data = [

    "jsonrpc" => "2.0",
    "method" => "item.get",
    "params" => [
        "output" => ["lastvalue", "key_", "hostid", "itemid"],
        "hostids" => $servidores,
        "search" => [
            "key_" => [
                "system.cpu.util",
                "system.cpu.load[all,avg1]",
                "vfs.fs.size", // Busca ampla para pegar o pused de qualquer disco
                "vm.memory",   // Busca ampla para pegar util ou pused
                "system.swap"  // Busca ampla para swap
            ]

        ],

        "searchByAny" => true
    ],
    "id" => 1
];



$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $token"

]);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));


curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if ($response === false) {
    echo json_encode(["erro" => curl_error($ch)]);
    exit;
}


$jsonResponse = json_decode($response, true);
if (isset($jsonResponse['error'])) {
    http_response_code(401);
    echo json_encode(["erro" => "Zabbix API Error", "detalhes" => $jsonResponse['error']]);
    exit;
}

echo $response;
exit;