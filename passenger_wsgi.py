import sys
import os

# Adiciona a pasta atual ao caminho de execução do Python
sys.path.insert(0, os.path.dirname(__file__))

# Importa a aplicação Flask do seu arquivo app.py
from app import app as application