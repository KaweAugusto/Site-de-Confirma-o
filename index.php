<?php
$arquivo_json = 'convidados.json';

// Carrega os convidados
function obter_convidados($arquivo) {
    if (!file_exists($arquivo)) {
        $lista_inicial = [
            "chely" => ["nome_original" => "Chely", "confirmado" => false],
            "valentina" => ["nome_original" => "Valentina", "confirmado" => false],
            "cleonice" => ["nome_original" => "Cleonice", "confirmado" => false],
            "alexsandra" => ["nome_original" => "Alexsandra", "confirmado" => false],
            "leonan" => ["nome_original" => "Leonan", "confirmado" => false],
            "vera" => ["nome_original" => "Vera", "confirmado" => false],
            "isabela" => ["nome_original" => "Isabela", "confirmado" => false],
            "carlos jr" => ["nome_original" => "Carlos Jr", "confirmado" => false],
            "giulliano" => ["nome_original" => "Giulliano", "confirmado" => false],
            "elizabeth" => ["nome_original" => "Elizabeth", "confirmado" => false],
            "carlos" => ["nome_original" => "Carlos", "confirmado" => false],
            "leonardo" => ["nome_original" => "Leonardo", "confirmado" => false],
            "erica" => ["nome_original" => "Erica", "confirmado" => false],
            "pedro" => ["nome_original" => "Pedro", "confirmado" => false],
            "kelly" => ["nome_original" => "Kelly", "confirmado" => false],
            "thiago" => ["nome_original" => "Thiago", "confirmado" => false],
            "laura" => ["nome_original" => "Laura", "confirmado" => false],
            "vivian" => ["nome_original" => "Vivian", "confirmado" => false],
            "diogo" => ["nome_original" => "Diogo", "confirmado" => false],
            "humberto" => ["nome_original" => "Humberto", "confirmado" => false],
            "tata" => ["nome_original" => "Tata", "confirmado" => false],
            "anderson" => ["nome_original" => "Anderson", "confirmado" => false],
            "eloana" => ["nome_original" => "Eloana", "confirmado" => false],
            "joão pedro" => ["nome_original" => "João Pedro", "confirmado" => false],
            "luisa" => ["nome_original" => "Luisa", "confirmado" => false],
            "bruno" => ["nome_original" => "Bruno", "confirmado" => false],
            "eliane" => ["nome_original" => "Eliane", "confirmado" => false],
            "ronaldo" => ["nome_original" => "Ronaldo", "confirmado" => false],
            "maria eduarda" => ["nome_original" => "Maria Eduarda", "confirmado" => false],
            "ana carla" => ["nome_original" => "Ana Carla", "confirmado" => false],
            "edson" => ["nome_original" => "Edson", "confirmado" => false],
            "julia" => ["nome_original" => "Julia", "confirmado" => false],
            "danyella" => ["nome_original" => "Danyella", "confirmado" => false],
            "anabella" => ["nome_original" => "Anabella", "confirmado" => false],
            "giulia" => ["nome_original" => "Giulia", "confirmado" => false],
            "maria clara" => ["nome_original" => "Maria Clara", "confirmado" => false],
            "matheus" => ["nome_original" => "Matheus", "confirmado" => false],
            "ana julia" => ["nome_original" => "Ana Julia", "confirmado" => false],
            "juliana" => ["nome_original" => "Juliana", "confirmado" => false],
            "frederico" => ["nome_original" => "Frederico", "confirmado" => false],
            "juliane" => ["nome_original" => "Juliane", "confirmado" => false],
            "eduardo" => ["nome_original" => "Eduardo", "confirmado" => false],
            "gustavo" => ["nome_original" => "Gustavo", "confirmado" => false],
            "beatriz" => ["nome_original" => "Beatriz", "confirmado" => false],
            "maia" => ["nome_original" => "Maia", "confirmado" => false],
            "maria" => ["nome_original" => "Maria", "confirmado" => false],
            "lucas" => ["nome_original" => "Lucas", "confirmado" => false],
            "luana" => ["nome_original" => "Luana", "confirmado" => false],
            "karina" => ["nome_original" => "Karina", "confirmado" => false],
            "danielle" => ["nome_original" => "Danielle", "confirmado" => false],
            "kauã" => ["nome_original" => "Kauã", "confirmado" => false],
            "kawe" => ["nome_original" => "Kawe", "confirmado" => false],
            "giovanna" => ["nome_original" => "Giovanna", "confirmado" => false]
        ];
        file_put_contents($arquivo, json_encode($lista_inicial, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        return $lista_inicial;
    }
    return json_decode(file_get_contents($arquivo), true);
}

$convidados = obter_convidados($arquivo_json);
$mensagem = "";
$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_digitado = mb_strtolower(trim($_POST["nome"] ?? ''));
    
    if (isset($convidados[$nome_digitado])) {
        if ($convidados[$nome_digitado]["confirmado"]) {
            $mensagem = "Você já confirmou sua presença.";
            $status = "aviso";
        } else {
            $convidados[$nome_digitado]["confirmado"] = true;
            file_put_contents($arquivo_json, json_encode($convidados, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            $mensagem = "Sua Presença Está Confirmada! Esperamos por você";
            $status = "sucesso";
        }
    } else {
        $mensagem = "Convidado Não Encontrado.<br>Verifique a Escrita Conforme o Convite.";
        $status = "erro";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosso Noivado</title>
    <style>
        /* Importando as fontes */
        @font-face {
            font-family: 'Blosta Script';
            src: url("static/Blosta-Script.otf") format('opentype');
        }
        @font-face {
            font-family: 'Cormorant SC';
            src: url("static/CormorantSC-Regular.ttf") format('truetype');
        }

        /* Fundo padrão para Computador */
        body {
            font-family: 'Georgia', serif;
            text-align: center;
            background-image: url("static/fundo-flores.png.jpeg");
            background-size: cover;
            background-position: center bottom;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: #636B2F;
            color: #333;
            padding: 15px;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            padding: 35px 25px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 580px;
            box-sizing: border-box;
            backdrop-filter: blur(5px);
            margin: auto;
        }

        h1 {
            font-family: 'Blosta Script', cursive;
            color: #5a4a42;
            font-size: 3.5em;
            font-weight: normal;
            margin-bottom: 0px;
            margin-top: 5px;
            white-space: nowrap; 
        }

        .info {
            font-family: 'Cormorant SC', serif;
            margin-bottom: 25px;
            font-size: 1.3em;
            color: #666;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .info p { margin: 6px 0; }

        label {
            font-family: 'Cormorant SC', serif;
            display: block;
            margin-bottom: 12px;
            font-weight: bold;
            color: #5a4a42;
            font-size: 1.2em;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1em;
            box-sizing: border-box;
        }

        button {
            background-color: #4a5d23;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 1em;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
            box-sizing: border-box;
        }

        button:hover { background-color: #3a481c; }

        .sucesso { color: #2e7d32; font-size: 1.1em; font-weight: bold; margin: 15px 0; }
        .aviso { color: #f39c12; font-size: 1.1em; font-weight: bold; margin: 15px 0; }
        .erro { color: #c62828; font-weight: bold; margin-bottom: 15px; }

        .btn-voltar {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #4a5d23;
            font-weight: bold;
            border: 1px solid #4a5d23;
            padding: 10px 20px;
            border-radius: 6px;
            transition: 0.3s;
        }
        .btn-voltar:hover { background-color: #4a5d23; color: white; }

        /* Ajustes exclusivos para Telemóveis */
        @media (max-width: 600px) {
            body {
                background-image: url("static/fundo-celular.jpg");
                background-size: cover;
                background-position: center center;
            }
            h1 {
                font-size: 1.9em; /* Reduz o título para caber perfeitamente em uma linha no celular */
                margin-top: 0px;
                margin-bottom: 5px;
            }
            .container {
                padding: 18px 12px; /* Caixa branca mais compacta */
                max-width: 90%;
            }
            .info {
                font-size: 0.9em; /* Textos de data, hora e local menores */
                margin-bottom: 12px;
                padding-bottom: 8px;
            }
            label {
                font-size: 0.95em; /* Texto do campo de nome menor */
                margin-bottom: 6px;
            }
            input[type="text"] {
                padding: 8px;
                margin-bottom: 10px;
                font-size: 0.95em;
            }
            button {
                padding: 9px;
                font-size: 0.95em;
            }
        }
    </style>
</head>
<body>
    <div class="container">

        <!-- Título mantido no celular, mas redimensionado para uma linha -->
        <h1>Giovanna & Kawe</h1>

        <div class="info">
            <p><strong>Data:</strong> 15 de Maio de 2027</p>
            <p><strong>Hora:</strong> 15:30</p>
            <p><strong>Local:</strong> Rua Edgard Werneck, 1115 - Pechincha</p>
            <p><strong>Confirme até o dia 08 de Maio de 2027</strong></p>
        </div>

        <?php if ($status == 'sucesso'): ?>
            <p class="sucesso"><?php echo $mensagem; ?></p>
            <a href="index.php" class="btn-voltar">Confirmar Outro Convidado</a>

        <?php elseif ($status == 'aviso'): ?>
            <p class="aviso"><?php echo $mensagem; ?></p>
            <a href="index.php" class="btn-voltar">Voltar</a>

        <?php else: ?>
            <?php if ($status == 'erro'): ?>
                <p class="erro"><?php echo $mensagem; ?></p>
            <?php endif; ?>

            <form method="POST">
                <label for="nome">Confirme Seu Nome De Acordo Com o Convite!</label>
                <input type="text" id="nome" name="nome" placeholder="" required autocomplete="off">
                <button type="submit">Confirmar Presença</button>
            </form>
        <?php endif; ?>

    </div>
</body>
</html>
