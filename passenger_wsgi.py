import sys
import os

# Adiciona a pasta atual ao caminho do sistema
sys.path.insert(0, os.path.dirname(__file__))

from app import app as application