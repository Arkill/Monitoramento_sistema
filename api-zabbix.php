<?php

header('Content-Type: application/json');
set_time_limit(30);

$url = "https://monitoramento.digiboard.com.br/zabbix/api_jsonrpc.php";

$token = "45d10d2cea8640b120cd09a1f326e0a6";


$servidores = [

    "10760", // SRVDGB008
    "10749", // SRVDGB023
    "10750", // SRVDGB029
    "10655", // SRVDGB003
    "10775", // SRVDGB024
    "10887"  // SRVDGB082

];



$data = [

    "jsonrpc" => "2.0",
    "method" => "item.get",
    "params" => [
        "output" => ["lastvalue", "key_", "hostid"],
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