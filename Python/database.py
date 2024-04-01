from typing import Any
import mysql.connector

class Database():
    def __init__(self,banco="tasks") -> None:
        self.banco = banco
    def connect(self):
       self.conn = mysql.connector.connect(host='192.168.22.9',database=self.banco,user="fabrica",password="fabrica@2022")
       if self.conn.is_connected():
           self.cursor = self.conn.cursor()
           db_info = self.conn.cursor()
           print("Conectado ao servidor com sucesso",db_info)
       else:
           print("Não foi possível conectar com servidor")
    def close_connection(self):
        self.cursor.close()
        self.conn.close()
        print("Conexão cancela com sucesso")
    
    def insert(self,dados):
        self.connect()
        try:
            self.cursor.execute(f"INSERT INTO andre (nome,descricao,data_tarefa,estado_tarefa) VALUES(%s,%s,%s,%s)", (dados[0],dados[1],dados[2],dados[3]) )
            self.conn.commit()
        except Exception as err:
            print(err)
        finally:
            self.close_connection()
    
    def select(self):
        self.connect()
        try:
            self.cursor.execute("SELECT * FROM andre")
            for row in self.cursor:
                print(row)
        except Exception as err:
            print(err)
        finally:
            self.close_connection()
    def delete(self,id):
        self.connect()
        try:
            self.cursor.execute(f"DELETE FROM andre WHERE id={id}")
            self.conn.commit()
        except Exception as err:
            print(err)
        finally:
            self.close_connection()
    
    def truncate(self):
        self.connect()
        try:
            self.cursor.execute("TRUNCATE andre")
            self.conn.commit()
        except Exception as err:
            print(err)
        finally:
            self.close_connection()
    
    def update(self,task):
        self.connect()
        try:
            self.cursor.execute("UPDATE andre SET nome = %s, descricao = %s, data_tarefa = %s, estado_tarefa = %s WHERE id = %s", (task[0],task[1],task[2],task[3],task[4]))
            self.conn.commit()
        except Exception as err:
            print(err)
        finally:
            self.close_connection()
    
    def filter(self,texto):
        self.connect()
        try:
            self.cursor.execute(f"SELECT * FROM andre WHERE nome LIKE '%{texto}%'")
            result = self.cursor.fetchall()
            for task in result:
                print(task)
        except Exception as err:
            print(err)
        finally:
            self.close_connection()
    
if __name__ == "__main__":
    db = Database()
    db.connect()

    while True:
        print("1 - inserir\n2 - listar\n3 - Apagar tudo\n4 - atualizar\n5 - Deletar com id\n6 - Pesquisa\n0 - sair")
        op = input("Escolha: ")
        if op == "1":
            nome = input("Nome ")
            desc = input("Descricao ")
            data = input("Data ")
            estado = input("Estado ") 
            dados = (nome, desc, data, estado)
            db.insert(dados)
        elif op == "2":
            db.select()
        elif op == "3":
            db.truncate()
        elif op == "4":
            db.select()
            nome = input("Nome ")
            desc = input("Descricao ")
            data = input("Data ")
            estado = input("Estado ") 
            id = input("Digite id que deseja atualizar: ")
            task = (nome, desc, data, estado,id)
            db.update(task)
        elif op == "5":
            db.select()
            id = input("Digite id que deseja apagar: ")
            db.delete(id)
        
        elif op == "6":
            nome = input("Nome ")
            db.filter(nome)
        elif op == "0":
            break
        else:
            print("Valor incorreto")    
            
    db.close_connection()