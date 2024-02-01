import pyrebase

config = {
    "apiKey": "AIzaSyDXXdlUtTNNm6LrElyhfEpXrys9Ll1ilfA",
    "authDomain": "tarefa-fabrica.firebaseapp.com",
    "databaseURL": "https://tarefa-fabrica-default-rtdb.firebaseio.com",
    "projectId": "tarefa-fabrica",
    "storageBucket": "tarefa-fabrica.appspot.com",
    "messagingSenderId": "845715947400",
    "appId": "1:845715947400:web:6ef648f24af8c1769ec43d",
    "measurementId": "G-DZLEWSPZMP"
}


firebase = pyrebase.initialize_app(config)

autenticacao = firebase.auth()
from getpass import getpass

email = input("\n Digite seu email:")
senha = getpass("\n Digite sua senha: ")

new_user = autenticacao.create_user_with_email_and_password(email,senha)
print("Usuário criado com sucesso!")

db = firebase.database()