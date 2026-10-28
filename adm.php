<?php
$arquivo_json = 'convidados.json';
$convidados = file_exists($arquivo_json) ? json_decode(file_get_contents($arquivo_json), true) : [];

$total = count($convidados);
$confirmados = 0;
foreach ($convidados as $c) {
    if ($c['confirmado']) $confirmados++;
}
$pendentes = $total - $confirmados;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Administração - Noivado</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
            margin: 0;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            max-width: 700px;
            margin: 40px auto;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        h1 { color: #2c3e50; text-align: center; }

        /* Estilos do Dashboard (Caixinhas de contagem) */
        .dashboard {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            margin-top: 20px;
        }
        .card {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 30%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            border: 1px solid #eee;
        }
        .card h3 { margin: 0; font-size: 1.1em; color: #555; }
        .card p { margin: 10px 0 0; font-size: 2em; font-weight: bold; }
        .card.total p { color: #2980b9; } /* Azul */
        .card.confirmados p { color: #27ae60; } /* Verde */
        .card.pendentes p { color: #f39c12; } /* Amarelo/Laranja */

        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background-color: #4a5d23; color: white; }
        .ok { color: #27ae60; font-weight: bold; }
        .pendente { color: #e74c3c; font-weight: bold; }
        .botoes { display: flex; justify-content: space-between; margin-top: 30px; }
        .btn {
            text-align: center;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-voltar { background-color: #2c3e50; }
        .btn-voltar:hover { background-color: #1a252f; }
        .btn-reset { background-color: #c62828; }
        .btn-reset:hover { background-color: #8e1d1d; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Controle de Convidados</h1>

        <!-- Caixinhas com a contagem -->
        <div class="dashboard">
            <div class="card total">
                <h3>Total</h3>
                <p><?php echo $total; ?></p>
            </div>
            <div class="card confirmados">
                <h3>Confirmados</h3>
                <p><?php echo $confirmados; ?></p>
            </div>
            <div class="card pendentes">
                <h3>Faltam</h3>
                <p><?php echo $pendentes; ?></p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nome do Convidado</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($convidados as $c): ?>
                <tr>
                    <td><?php echo htmlspecialchars($c['nome_original']); ?></td>
                    <td>
                        <?php if ($c['confirmado']): ?>
                            <span class="ok">✔️ Confirmado</span>
                        <?php else: ?>
                            <span class="pendente">⏳ Pendente</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="botoes">
            <a href="index.php" class="btn btn-voltar">Voltar ao Site</a>
            <a href="reset.php" class="btn btn-reset" onclick="return confirm('Tem certeza que deseja resetar TODAS as confirmações de volta para Pendente?');">Zerar Tudo</a>
        </div>
    </div>
</body>
</html>
