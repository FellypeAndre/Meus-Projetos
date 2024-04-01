#include <stdio.h>

int main(void) {
	int n, i, resultado = 0;

	printf("Insira o N: ");
	scanf("%d", &n);

	for (i = 1; i <= n; i = i + 1) {		
		resultado = resultado + i;
	}

	// i = 1;
	// while (i <= n) {
	// 	resultado = resultado + i;
	// 	i = i + 1;
	// }

	printf("A soma dos %d primeiros inteiros é: %d\n", n, resultado);
	
	return 0;
}