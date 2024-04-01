
import sqlite3

# Função para criar a tabela de colaboradores
def criar_tabela_colaboradores(conn):
    cursor = conn.cursor()
    cursor.execute('''CREATE TABLE IF NOT EXISTS colaboradores (
                      id INTEGER PRIMARY KEY AUTOINCREMENT,
                      nome TEXT)''')
    conn.commit()


# Função para criar a tabela de Agenda
def criar_tabela_agenda(conn):
    cursor = conn.cursor()
    cursor.execute('''CREATE TABLE IF NOT EXISTS agenda (
    id INTEGER PRIMARY KEY,
    nome_cliente TEXT,
    colaborador_id INTEGER,
    corte_id INTEGER,
    data DATE,
    FOREIGN KEY (colaborador_id) REFERENCES colaboradores(id),
    FOREIGN KEY (corte_id) REFERENCES tipos_corte(id));''')
    conn.commit()

# Função para criar a tabela de cortes
def criar_tabela_cortes(conn):
    cursor = conn.cursor()
    cursor.execute('''CREATE TABLE IF NOT EXISTS cortes (
                      id INTEGER PRIMARY KEY AUTOINCREMENT,
                      nome TEXT)''')
    conn.commit()

# Função para adicionar um colaborador
def adicionar_colaborador(conn, nome):
    cursor = conn.cursor()
    cursor.execute("INSERT INTO colaboradores (nome) VALUES (?)", (nome,))
    conn.commit()

# Função para adicionar um corte
def adicionar_corte(conn, nome):
    cursor = conn.cursor()
    cursor.execute("INSERT INTO cortes (nome) VALUES (?)", (nome,))
    conn.commit()

# Função para exibir a lista de colaboradores
def listar_colaboradores(conn):
    cursor = conn.cursor()
    cursor.execute("SELECT * FROM colaboradores")
    colaboradores = cursor.fetchall()
    for colaborador in colaboradores:
        print(f"{colaborador[0]} - {colaborador[1]}")

# Função para exibir a lista de cortes
def listar_cortes(conn):
    cursor = conn.cursor()
    cursor.execute("SELECT * FROM cortes")
    cortes = cursor.fetchall()
    for corte in cortes:
        print(f"{corte[0]} - {corte[1]}")

# Função para agendar um cliente
def agendar_cliente(conn, nome_cliente, colaborador_id, corte_id, data):
    cursor = conn.cursor()
    cursor.execute("INSERT INTO agenda (nome_cliente, colaborador_id, corte_id, data) VALUES (?, ?, ?, ?)",
                   (nome_cliente, colaborador_id, corte_id, data))
    conn.commit()
    print("Agendamento concluído!")

# Função para listar os agendamentos
def listar_agendamentos(conn):
    cursor = conn.cursor()
    cursor.execute("SELECT * FROM agenda")
    agendamentos = cursor.fetchall()
    for agendamento in agendamentos:
        print(f"id {agendamento[0]} - Cliente: {agendamento[1]}, Colaborador: {agendamento[2]}, Corte: {agendamento[3]}, Data: {agendamento[4]}")

# Função para apagar os agendamentos
def apagar_agendamentos(conn):
    cursor = conn.cursor()
    cursor.execute("DELETE FROM agenda")
    conn.commit()
    print("Agendamentos apagados com sucesso!")

# Função para deletar um colaborador
def deletar_colaborador(conn, colaborador_id):
    cursor = conn.cursor()
    cursor.execute("DELETE FROM colaboradores WHERE id=?", (colaborador_id,))
    conn.commit()
    print("Colaborador deletado com sucesso!")

# Função para deletar um corte
def deletar_corte(conn, corte_id):
    cursor = conn.cursor()
    cursor.execute("DELETE FROM cortes WHERE id=?", (corte_id,))
    conn.commit()
    print("Corte deletado com sucesso!")

# Função para deletar um agendamento
def deletar_agendamento(conn, agendamento_id):
    cursor = conn.cursor()
    cursor.execute("DELETE FROM agenda WHERE id=?", (agendamento_id,))
    conn.commit()
    print("Agendamento deletado com sucesso!")

# Função principal
def main():
    conn = sqlite3.connect("barbearia.db")

    # Criar as tabelas se não existirem
    criar_tabela_colaboradores(conn)
    criar_tabela_agenda(conn)
    criar_tabela_cortes(conn)

    while True:

        print("\nBarbearia do Braz\n")
        print("MENU PRINCIPAL")
        print("1. Adicionar Colaborador")
        print("2. Adicionar Corte")
        print("3. Listar Colaboradores")
        print("4. Listar Cortes")
        print("5. Agendar Cliente")
        print("6. Listar Agendamentos")
        print("7. Deletar Agendamentos")
        print("8. Deletar Colaborador")
        print("9. Deletar Corte")
        print("10. Apagar todos Agendamentos")
        print("0. Sair")

        escolha = input("Escolha uma opção: ")

        if escolha == "1":
            nome_colaborador = input("Digite o nome do colaborador: ")
            adicionar_colaborador(conn, nome_colaborador)
            print("Colaborador cadastrado com sucesso")
            
        elif escolha == "2":
            nome_corte = input("Digite o nome do corte: ")
            adicionar_corte(conn, nome_corte)
            print("Corte cadastrado com sucesso")

        elif escolha == "3":
            print("\nLista de Colaboradores: ")
            listar_colaboradores(conn)

        elif escolha == "4":
            print("\nLista de Cortes:")
            listar_cortes(conn)

        elif escolha == "5":
            nome_cliente = input("Digite o nome do cliente: ")
            listar_colaboradores(conn)
            colaborador_id = input("Escolha o ID do colaborador: ")
            listar_cortes(conn)
            corte_id = input("Escolha o ID do corte: ")
            data = input("Digite a data do agendamento (DD/MM/AAAA): ")
            agendar_cliente(conn, nome_cliente, colaborador_id, corte_id, data)

        elif escolha == "6":
            print("\nLista de Agendamentos:")
            listar_agendamentos(conn)

        elif escolha == "7":
            listar_agendamentos(conn)
            agendamento_id = input("Digite o ID do agendamento que deseja deletar: ")
            deletar_agendamento(conn, agendamento_id)
        
        elif escolha == "8":
            listar_colaboradores(conn)
            colaborador_id = input("Digite o ID do colaborador que deseja deletar: ")
            deletar_colaborador(conn, colaborador_id)

        elif escolha == "9":
            listar_cortes(conn)
            corte_id = input("Digite o ID do corte que deseja deletar: ")
            deletar_corte(conn, corte_id)

        elif escolha == "10":
            apagar_agendamentos(conn)
            
        elif escolha == "0":
            break
        else:
            print("Opção inválida. Tente novamente.")

    conn.close()

if __name__ == "__main__":
    main()


