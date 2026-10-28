<?php
// Insira a sua chave Pix aleatória ou os dados abaixo
$chave_pix = "00020101021126360014br.gov.bcb.pix0114+55219718145525204000053039865802BR5918GIOVANNA N MELURIA6013RIO DE JANEIR62070503***6304EC0F"; 
$nome_recebedor = "Giovanna & Kawe";
$cidade = "Rio de Janeiro";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Presentes - Nosso Noivado</title>
    <!-- Favicon com a flor -->
    <link rel="icon" type="image/png" href="static/favicon.png">
    <link rel="apple-touch-icon" href="static/favicon.png">

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

        /* Fundo padrão para Computador (igual ao index) */
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
            max-width: 500px;
            box-sizing: border-box;
            backdrop-filter: blur(5px);
            margin: auto;
        }

        h1 {
            font-family: 'Blosta Script', cursive;
            color: #5a4a42;
            font-size: 3.2em;
            font-weight: normal;
            margin-bottom: 5px;
            margin-top: 0px;
            white-space: nowrap; 
        }

        .info {
            font-family: 'Cormorant SC', serif;
            margin-bottom: 20px;
            font-size: 1.1em;
            color: #555;
            line-height: 1.6;
        }

        .info p {
            margin: 10px 0;
        }

        .qrcode-box {
            margin: 20px 0;
        }

        .qrcode-box img {
            width: 200px;
            height: 200px;
            border-radius: 10px;
            border: 2px solid #eee;
            padding: 5px;
            background: white;
        }

        .chave-box {
            background: #f9f9f9;
            border: 1px dashed #4a5d23;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            word-break: break-all;
            font-family: monospace;
            font-size: 0.95em;
            color: #333;
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
            font-family: 'Georgia', serif;
        }

        button:hover { background-color: #3a481c; }

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
            font-size: 0.95em;
        }
        .btn-voltar:hover { background-color: #4a5d23; color: white; }

        .mensagem-copiado {
            color: #2e7d32;
            font-size: 0.9em;
            margin-top: 8px;
            font-weight: bold;
            display: none;
        }

        /* Ajustes para Telemóveis */
        @media (max-width: 600px) {
            body {
                background-image: url("static/fundo-celular.jpg");
                background-size: cover;
                background-position: center center;
            }
            h1 {
                font-size: 1.8em; 
            }
            .container {
                padding: 20px 15px;
                max-width: 90%;
            }
            .info {
                font-size: 0.95em;
            }
            .qrcode-box img {
                width: 170px;
                height: 170px;
            }
        }
    </style>
</head>
<body>
    <div class="container">

        <h1>Presente</h1>

        <div class="info">
            <p>A sua presença já é o nosso maior presente! ❤️</p>
            <p>Mas, se ainda quiser nos presentear, ficaremos muito felizes em receber uma contribuição de qualquer valor, aquele que estiver no seu coração, para nos ajudar a realizar um sonho: viver a experiência da nossa primeira viagem de avião juntos! ✈️💕</p>
            <p>Desde já, agradecemos de coração por fazer parte desse momento tão especial e por nos ajudar a transformar esse sonho em realidade!</p>
        </div>

        <!-- QR Code gerado automaticamente pelo link da chave ou API do Pix -->
        <div class="qrcode-box">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=<?php echo urlencode($chave_pix); ?>" alt="QR Code Pix">
        </div>

        <div class="chave-box" id="texto-chave">
            <?php echo $chave_pix; ?>
        </div>

        <button onclick="copiarChave()">Copiar Chave Pix</button>
        <div id="aviso" class="mensagem-copiado">Chave copiada com sucesso!</div>

        <div>
            <a href="index.php" class="btn-voltar">Voltar ao Início</a>
        </div>

    </div>

    <script>
        function copiarChave() {
            const texto = document.getElementById("texto-chave").innerText;
            navigator.clipboard.writeText(texto).then(() => {
                const aviso = document.getElementById("aviso");
                aviso.style.display = "block";
                setTimeout(() => {
                    aviso.style.display = "none";
                }, 3000);
            });
        }
    </script>
</body>
</html>
