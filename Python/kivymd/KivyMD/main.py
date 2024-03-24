import pyrebase
from kivy.lang import Builder
from kivy.properties import ObjectProperty

from kivymd.app import MDApp
from kivymd.uix.scrollview import MDScrollView


from kivy.lang import Builder
from kivy.properties import ObjectProperty
from kivymd.app import MDApp
from kivymd.uix.scrollview import MDScrollView
import pyrebase
from kivy.lang import Builder
from kivymd.uix.button import MDRaisedButton
from kivy.factory import Factory

from kivy.uix.boxlayout import BoxLayout
from kivy.uix.image import Image
from kivy.properties import BooleanProperty
from kivymd.uix.list import TwoLineAvatarIconListItem
from kivy.uix.checkbox import CheckBox

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

KV = '''
<ContentNavigationDrawer>

    MDList:

        OneLineListItem:
            text: "Screen 1"
            on_press:
                root.nav_drawer.set_state("close")
                root.screen_manager.current = "scr 1"

        OneLineListItem:
            text: "Screen 2"
            on_press:
                root.nav_drawer.set_state("close")
                root.screen_manager.current = "scr 2"
        
        OneLineListItem:
            text: "Screen 3"
            on_press:
                root.nav_drawer.set_state("close")
                root.screen_manager.current = "scr 3"


MDScreen:

    MDTopAppBar:
        pos_hint: {"top": 1}
        elevation: 4
        title: "TK DRAKEN"
        left_action_items: [["menu", lambda x: nav_drawer.set_state("open")]]

    MDNavigationLayout:

        MDScreenManager:
            id: screen_manager

            MDScreen:
                name: "scr 1"

                MDLabel:
                    halign: "center"
                    text: "Tela de Cadastro"
                    pos_hint: {"center_x": .5, "center_y": .7}
                    size_hint_x: .5

                MDTextField:
                    id: nome
                    haling: "center"
                    hint_text: "Nome"
                    pos_hint: {"center_x": .5, "center_y": .6}
                    size_hint_x: .5

                MDTextField:
                    id:email
                    haling: "center"
                    hint_text: "Email"
                    pos_hint: {"center_x": .5, "center_y": .5}
                    size_hint_x: .5
                
                MDTextField:
                    id: senha
                    haling: "center"
                    hint_text: "Senha"
                    pos_hint: {"center_x": .5, "center_y": .4}
                    size_hint_x: .5
                
                MDRaisedButton:
                    on_press: app.listar(Lista_tarefa)
                    text: "Cancelar"
                    md_bg_color: "red"
                    pos_hint: {"center_x": .3, "center_y": .3}
                
                MDRaisedButton:
                    on_press: app.cadastrar(nome.text,email.text,senha.text)
                    text: "Enviar"
                    md_bg_color: "green"
                    pos_hint: {"center_x": .7, "center_y": .3}
                    size_hint_x: .1

            MDScreen:
                name: "scr 2"

                GridLayout:
                    cols: 1

                    MDTopAppBar:
                        title: "Tarefas"
                        elevation: 10
                        pos_hint: {"top": 1}
                        left_action_items: [["menu", lambda x: nav_drawer.set_state("open")]]
                        

                    ScrollView:
                        MDList:
                            id: tarefas_list

                MDRaisedButton:
                    text: "Listar Tarefas"
                    on_release: app.listar_tarefas()
                    pos_hint: {"center_x": .5, "center_y": .1}

            MDScreen:
                name: "scr 3"
                text: "Screen 3"
                text: "Screen 3"
                halign: "center"

        MDNavigationDrawer:
            id: nav_drawer
            radius: (0, 16, 16, 0)

            ContentNavigationDrawer:
                screen_manager: screen_manager
                nav_drawer: nav_drawer
'''


class ContentNavigationDrawer(MDScrollView):
    screen_manager = ObjectProperty()
    nav_drawer = ObjectProperty()

class TarefaListItem(TwoLineAvatarIconListItem):
    checkbox = ObjectProperty()

    def __init__(self, text, secondary_text, checkbox_active=False, **kwargs):
        super(TarefaListItem, self).__init__(text=text, secondary_text=secondary_text, **kwargs)
        self.checkbox = CheckBox(active=checkbox_active)
        self.add_widget(self.checkbox)

class Example(MDApp):
    def build(self):
        #['Red', 'Pink', 'Purple', 'DeepPurple', 'Indigo', 'Blue', 'LightBlue', 'Cyan', 'Teal', 'Green', 'LightGreen', 'Lime', 'Yellow', 'Amber', 'Orange', 'DeepOrange', 'Brown', 'Gray', 'BlueGray']
        self.theme_cls.primary_palette = "Cyan"
        self.theme_cls.theme_style = "Light"
        return Builder.load_string(KV)
    
    def cadastrar(self, nome, email, senha):
        db.child("Lista_tarefa").push({
            'nome': nome,
            'email': email,
            "senha": senha,
        })

    def listar_tarefas(self):
        tarefas_list = self.root.ids.tarefas_list
        tarefas_list.clear_widgets()

        tarefas = db.child("Lista_tarefa").get()
        if tarefas.each():
            for tarefa in tarefas.each():
                tarefa_nome = tarefa.val()['nome']
                tarefa_email = tarefa.val()['email']



                tarefa_label = TarefaListItem(
                    text=f"Nome: {tarefa_nome}",
                    secondary_text=f"Email: {tarefa_email}",
                    # terc_text=f"Senha: {tarefa_senha}"
                )
                tarefas_list.add_widget(tarefa_label)
        


Example().run()



