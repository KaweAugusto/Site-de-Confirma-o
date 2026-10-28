<?php
// Redireciona o acesso raiz para evitar o bloqueio de diretório
$_SERVER['REQUEST_URI'] = '/';
include('app.py'); // Apenas se o servidor executar WSGI, senão usamos o bypass correto
?>