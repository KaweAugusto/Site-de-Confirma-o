import json
import os
from flask import Flask, render_template, request, redirect, url_for

app = Flask(__name__)

ARQUIVO_JSON = 'convidados.json'


def obter_convidados():
    # Se o arquivo não existir, ele cria com a sua lista completa
    if not os.path.exists(ARQUIVO_JSON):
        lista_inicial = {
            "chely": {"nome_original": "Chely", "confirmado": False},
            "valentina": {"nome_original": "Valentina", "confirmado": False},
            "cleonice": {"nome_original": "Cleonice", "confirmado": False},
            "alexsandra": {"nome_original": "Alexsandra", "confirmado": False},
            "leonan": {"nome_original": "Leonan", "confirmado": False},
            "vera": {"nome_original": "Vera", "confirmado": False},
            "isabela": {"nome_original": "Isabela", "confirmado": False},
            "carlos jr": {"nome_original": "Carlos Jr", "confirmado": False},
            "giulliano": {"nome_original": "Giulliano", "confirmado": False},
            "elizabeth": {"nome_original": "Elizabeth", "confirmado": False},
            "carlos": {"nome_original": "Carlos", "confirmado": False},
            "leonardo": {"nome_original": "Leonardo", "confirmado": False},
            "erica": {"nome_original": "Erica", "confirmado": False},
            "pedro": {"nome_original": "Pedro", "confirmado": False},
            "kelly": {"nome_original": "Kelly", "confirmado": False},
            "thiago": {"nome_original": "Thiago", "confirmado": False},
            "laura": {"nome_original": "Laura", "confirmado": False},
            "vivian": {"nome_original": "Vivian", "confirmado": False},
            "diogo": {"nome_original": "Diogo", "confirmado": False},
            "humberto": {"nome_original": "Humberto", "confirmado": False},
            "tata": {"nome_original": "Tata", "confirmado": False},
            "anderson": {"nome_original": "Anderson", "confirmado": False},
            "eloana": {"nome_original": "Eloana", "confirmado": False},
            "joão pedro": {"nome_original": "João Pedro", "confirmado": False},
            "luisa": {"nome_original": "Luisa", "confirmado": False},
            "bruno": {"nome_original": "Bruno", "confirmado": False},
            "eliane": {"nome_original": "Eliane", "confirmado": False},
            "ronaldo": {"nome_original": "Ronaldo", "confirmado": False},
            "maria eduarda": {"nome_original": "Maria Eduarda", "confirmado": False},
            "ana carla": {"nome_original": "Ana Carla", "confirmado": False},
            "edson": {"nome_original": "Edson", "confirmado": False},
            "julia": {"nome_original": "Julia", "confirmado": False},
            "danyella": {"nome_original": "Danyella", "confirmado": False},
            "anabella": {"nome_original": "Anabella", "confirmado": False},
            "giulia": {"nome_original": "Giulia", "confirmado": False},
            "maria clara": {"nome_original": "Maria Clara", "confirmado": False},
            "matheus": {"nome_original": "Matheus", "confirmado": False},
            "ana julia": {"nome_original": "Ana Julia", "confirmado": False},
            "juliana": {"nome_original": "Juliana", "confirmado": False},
            "frederico": {"nome_original": "Frederico", "confirmado": False},
            "julianne": {"nome_original": "Julianne", "confirmado": False},
            "eduardo": {"nome_original": "Eduardo", "confirmado": False},
            "gustavo": {"nome_original": "Gustavo", "confirmado": False},
            "beatriz": {"nome_original": "Beatriz", "confirmado": False},
            "maia": {"nome_original": "Maia", "confirmado": False},
            "maria": {"nome_original": "Maria", "confirmado": False},
            "lucas": {"nome_original": "Lucas", "confirmado": False},
            "luana": {"nome_original": "Luana", "confirmado": False},
            "karina": {"nome_original": "Karina", "confirmado": False},
            "danielle": {"nome_original": "Danielle", "confirmado": False},
            "kauã": {"nome_original": "Kauã", "confirmado": False},
            "kawe": {"nome_original": "Kawe", "confirmado": False},
            "giovanna": {"nome_original": "Giovanna", "confirmado": False}
        }
        salvar_convidados(lista_inicial)
        return lista_inicial
    else:
        # Se o arquivo já existe, ele lê as confirmações salvas
        with open(ARQUIVO_JSON, 'r', encoding='utf-8') as f:
            return json.load(f)


def salvar_convidados(dados):
    with open(ARQUIVO_JSON, 'w', encoding='utf-8') as f:
        json.dump(dados, f, ensure_ascii=False, indent=4)


@app.route("/", methods=["GET", "POST"])
def index():
    mensagem = None
    status = None
    convidados = obter_convidados()

    if request.method == "POST":
        nome_digitado = request.form.get("nome", "").strip().lower()

        if nome_digitado in convidados:
            if convidados[nome_digitado]["confirmado"]:
                mensagem = "Você já confirmou sua presença."
                status = "aviso"
            else:
                convidados[nome_digitado]["confirmado"] = True
                salvar_convidados(convidados)  # Salva a confirmação no arquivo
                mensagem = "Sua Presença Está Confirmada! Esperamos por você"
                status = "sucesso"
        else:
            mensagem = "Convidado Não Encontrado.<br>Verifique a Escrita Conforme o Convite."
            status = "erro"

    return render_template("index.html", mensagem=mensagem, status=status)


@app.route("/adm")
def adm():
    convidados = obter_convidados()
    total = len(convidados)
    confirmados = sum(1 for c in convidados.values() if c["confirmado"])
    pendentes = total - confirmados

    return render_template("adm.html", lista_convidados=convidados.values(), total=total, confirmados=confirmados,
                           pendentes=pendentes)


@app.route("/reset")
def reset():
    convidados = obter_convidados()
    for chave in convidados:
        convidados[chave]["confirmado"] = False
    salvar_convidados(convidados)  # Salva o reset no arquivo
    return redirect(url_for('adm'))


if __name__ == "__main__":
    app.run(debug=True)