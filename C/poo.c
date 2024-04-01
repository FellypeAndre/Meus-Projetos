//Aprendendo POO
#include <stdio.h>
#include <stdlib.h>

// Definindo a classe Carro
typedef struct {
    char marca[20];
    int ano;
} Carro;

// Método para imprimir os detalhes do carro
void imprimirDetalhes(Carro *carro) {
    printf("Marca: %s\n", carro->marca);
    printf("Ano: %d\n", carro->ano);
}

int main() {
    // Criando um objeto da classe Carro
    Carro *meuCarro = malloc(sizeof(Carro));
    
    // Atribuindo valores aos atributos do carro
    strcpy(meuCarro->marca, "Toyota");
    meuCarro->ano = 2020;
    
    // Imprimindo os detalhes do carro
    imprimirDetalhes(meuCarro);
    
    // Liberando a memória alocada
    free(meuCarro);
    
    return 0;
}
