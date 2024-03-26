#include <stdio.h>

int main(void) {
	int numero;
	
	printf("Insira um numero: ");
	scanf("%d", &numero);
	
	if (numero == 0) {
		printf("%d e NULO\n", numero);
	}
	else { // ou � positivo ou � negativo				
		if (numero > 0) {
			printf("%d e POSITIVO\n", numero);
		}
		else {
			printf("%d e NEGATIVO\n", numero);
		}
	}		
	
	return 0;
}