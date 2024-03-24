import pyrebase 
from getpass import getpass

firebaseConfig = {
   "apiKey": "AIzaSyDXXdlUtTNNm6LrElyhfEpXrys9Ll1ilfA",
    "authDomain": "tarefa-fabrica.firebaseapp.com",
    "databaseURL": "https://tarefa-fabrica-default-rtdb.firebaseio.com",
    "projectId": "tarefa-fabrica",
    "storageBucket": "tarefa-fabrica.appspot.com",
    "messagingSenderId": "845715947400",
    "appId": "1:845715947400:web:2484a806f8d259cf9ec43d",
    "measurementId": "G-01LDQGDDQC"
  }

firebase = pyrebase.initialize_app(firebaseConfig)

autentication = firebase.auth()
email = input("\nDigite seu email: ")
senha = getpass("Digite sua senha: ")

new_user = autentication.create_user_with_email_and_password(email,senha)
print("\nUsuário Criado com sucesso")

# db = firebase.database()
# data2 = {
#     "Nome" : ""
# }