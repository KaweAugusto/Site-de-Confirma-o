import sys
import os

# Define o caminho absoluto da pasta atual
PROJECT_DIR = os.path.dirname(os.path.abspath(__file__))
if PROJECT_DIR not in sys.path:
    sys.path.insert(0, PROJECT_DIR)

# Importa a aplicação principal do Flask
from app import app as application