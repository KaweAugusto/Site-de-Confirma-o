import sys
import os

# Define o caminho absoluto da pasta do projeto
PROJECT_DIR = os.path.dirname(os.path.abspath(__file__))
sys.path.insert(0, PROJECT_DIR)

# Configura o ambiente para encontrar a aplicação Flask
from app import app as application