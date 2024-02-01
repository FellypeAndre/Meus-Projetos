from kivymd.app import MDApp
from kivymd.uix.screen import MDScreen
from kivymd.uix.boxlayout import MDBoxLayout
from kivymd.uix.list import TwoLineListItem
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
db = firebase.database()

class TabelaApp(MDApp):
    def build(self):
        screen = MDScreen()

        # Obtém os dados do Firebase
        dados = db.child("dados").get().val()

        # Cria uma lista para exibir os dados
        lista = MDBoxLayout(orientation="vertical", padding=10, spacing=10)

        for chave, valor in dados.items():
            item = TwoLineListItem(text=chave, secondary_text=valor)
            lista.add_widget(item)

        screen.add_widget(lista)
        return screen

if __name__ == '__main__':
    TabelaApp().run()