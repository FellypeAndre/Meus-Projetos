class Compra:
    def _init_(self,numero,produto,parcela,valor_total=0,desc=0):
        self.numero = numero
        self.produto = produto
        self.valor_total = valor_total
        self.desc = desc
        self.parcela = parcela
        
    def get_total(self):
        icms = sum(produtos)*0.17
        frete = sum(produtos)*0.05
        self.valor_total= sum(produtos) + icms + frete
        return self.valor_total

    def pgto_avista(self):
        self.desc = self.valor_total-(self.valor_total*5 / 100)
        return self.desc
    
    def troco(self):
        din = float(input("Dinheiro: "))
        troco = din - p1.pgto_avista() 
        return troco
    
    def extrato(self):
        v = 1
        for i in range(len(produtos)):
            
            print("{}° Produto  {:->20}  ".format(v,produtos[i]))
            v=v+1
        
    def get_parcela(self):    
        op = int(input("Digite (1)Avista - Desconto ou (2)Parcelado: "))    
        if op == 1:
            print(f"Valor total com desconto: R${p1.pgto_avista():.2f}")  
            print(f"troco: {p1.troco():.2f}\n") 
            extrato = int(input("Digite (1)Imprimir Extrato (2)Finalizar: "))  
            print("\n")    


            if extrato == 1:
                p1.extrato()
                print("Valor: ",sum(produtos))
                print("Valor Total com imposto: ",p1.get_total(),"\n")
                print("Volte Sempre😁")

            elif extrato == 2:
                print("Compra Encerrada\n Volte Sempre😁")

        elif op == 2:
            try:
                if self.valor_total >= 50:
                    print(f"Parcelamos em até 5x")
                    op2 = int(input("Deseja quantas parcelas: "))
                    if op2 == 2:
                        self.parcela = self.valor_total / 2
                        print(f"Parcela de 2x de {self.parcela}")
                        return self.parcela
                    elif op2 ==3:
                        self.parcela = self.valor_total / 3
                        print(f"Parcela de 3x de {self.parcela}")
                        return self.parcela
                    elif op2 ==4:
                        self.parcela = self.valor_total / 4
                        print(f"Parcela de 4x de {self.parcela}")
                        return self.parcela
                    elif op2 ==5:
                        self.parcela = self.valor_total / 5
                        print(f"Parcela de 5x de {self.parcela}")
                        return self.parcela
                elif self.valor_total <50:
                    print("Apenas Avista!")

            except(ValueError,NameError,EOFError):
                print("Tente Novamente\n")

valor_total = 0
produto=0
produtos=[]

print("{:=^50}".format("Digite 0 pra encerrar"))
while True:
    try:
        produto = float(input("Valor do produto: "))
    
        if produto > 0:
            produtos.append(produto)
        else:
            break
    except(ValueError,NameError):
        print("Tente Novamente")

p1 = Compra()
print("Valor: ",sum(produtos))
print("Valor Total com imposto: ",p1.get_total(),"\n")
p1.get_parcela()