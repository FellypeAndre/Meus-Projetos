#include <stdio.h>

int main(void) {
	float distancia, valorDolar, qtdeCombustivel, valorCombustivelDolar, valorTotalRS; // 11.5, 3.19
	
	printf("Insira a distancia a ser percorrida: ");
	scanf("%f", &distancia);
	
	printf("Insira o valor do dolar em reais: ");
	scanf("%f", &valorDolar);
	
	qtdeCombustivel = distancia / 11.5; // em litros
	valorCombustivelDolar = qtdeCombustivel * 3.19; // valor em dolares
	valorTotalRS = valorCombustivelDolar * valorDolar;
	
	printf("Valor total em reais: %.2f\n", valorTotalRS);
	
	return 0;
}