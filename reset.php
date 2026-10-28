<?php
$arquivo_json = 'convidados.json';
if (file_exists($arquivo_json)) {
    $convidados = json_decode(file_get_contents($arquivo_json), true);
    foreach ($convidados as $chave => $dados) {
        $convidados[$chave]['confirmado'] = false;
    }
    file_put_contents($arquivo_json, json_encode($convidados, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
}
header("Location: adm.php");
exit();
