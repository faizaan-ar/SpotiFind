from flask import Flask
from backend import *

session = Flask(__name__)

@session.route('/')
def root():
    return session.send_static_file('index.html')

session.run(host='localhost', port=8888, debug=True)

