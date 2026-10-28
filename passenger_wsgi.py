import sys
import os

INTERP = os.path.expanduser('~/virtualenv/public_html/bin/python')
if os.path.exists(INTERP) and sys.executable != INTERP:
    os.execl(INTERP, INTERP, *sys.argv)

sys.path.insert(0, os.path.dirname(__file__))

from app import app as application