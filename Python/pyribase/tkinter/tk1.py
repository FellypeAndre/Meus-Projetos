from tkinter import *
import tkinter
import sqlite3

#Craindo o banco de dado

conexao = sqlite3.connect('cliente276.db')

#criando o cursor
cursor = conexao.cursor()

#criando a tabela

cursor.execute(''' CREATE TABLE IF NOT EXISTS cliente(
    nome TEXT,
    email TEXT,
    telefone TEXT)''')

conexao.commit()
conexao.close()

janela = tkinter.Tk()

janela.title("Fabrica 276")
janela.geometry("330x350")

def cadastro():
    conexao = sqlite3.connect('cliente276.db')
    cursor = conexao.cursor()

    #inserir os dados
    cursor.execute(''' insert into cliente(nome, email, telefone) VALUES(:nome,:email, :telefone)''',
                   {
                       'nome':input_nome.get(),
                       'email':input_email.get(),
                       'telefone':input_telefone.get()
                   })
    conexao.commit()
    conexao.close()
    #Limpando dados
    input_nome.delete(0,tkinter.END)
    input_email.delete(0,tkinter.END)
    input_telefone.delete(0,tkinter.END)
    
#Nome dos campos
label_nome = tkinter.Label(janela,text="Nome")
label_nome.grid(row=0,column=0, padx=10, pady=10)

label_email = tkinter.Label(janela,text="Email")
label_email.grid(row=1,column=0, padx=10, pady=10)

label_telefone = tkinter.Label(janela,text="Telefone")
label_telefone.grid(row=2,column=0, padx=10, pady=10)

#caixa de Entrada inputs

input_nome = tkinter.Entry(janela, width=35)
input_nome.grid(row=0,column=1, padx=10, pady=10)

input_email = tkinter.Entry(janela,width=35)
input_email.grid(row=1,column=1, padx=10, pady=10)

input_telefone = tkinter.Entry(janela,width=35)

input_telefone.grid(row=2,column=1, padx=10, pady=10)


#botoes

botao_cadastrar = tkinter.Button(janela,text="Cadastrar",command=cadastro,width=30)
botao_cadastrar.grid(row=3,column=0, padx=10,columnspan=2, pady=10)



janela.mainloop()
