from database import Database
class Tarefa():
    def __init__(self)->None:
        self.nome = ""
        self.descricao = ""
        self.data_tarefa = ""
        self.db = Database()

    def cadastrar(self)->None:
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
                nome = input("Nome: ")
                desc = input("Descricao: ")
                data = input("Data: ")
                estado = input("Estado: ") 
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

if __name__ == "__main__":
    tr = Tarefa()
    tr.cadastrar()