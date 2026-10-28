<?php
// Porta de entrada universal para o hPanel da Hostinger que evita o erro 403
// Redireciona o tráfego da raiz para o ambiente WSGI/Python ou exibe a aplicação
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
header("Location: " . $url);
exit();
?>