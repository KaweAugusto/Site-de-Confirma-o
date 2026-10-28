import sys
import os

PROJECT_DIR = os.path.dirname(os.path.abspath(__file__))
if PROJECT_DIR not in sys.path:
    sys.path.insert(0, PROJECT_DIR)

try:
    from app import app as application
except Exception as e:
    # Se houver erro ao carregar o Flask, mostra o erro no ecrã em vez de dar 403
    def application(environ, start_response):
        status = '500 Internal Server Error'
        response_headers = [('Content-type', 'text/plain; charset=utf-8')]
        start_response(status, response_headers)
        return [f"Erro crítico ao iniciar a aplicação Flask: {str(e)}".encode('utf-8')]