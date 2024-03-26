/* Implemente um programa que solicite ao usu�rio
dois n�meros inteiros e, exiba sa�da:
a) A soma entre os dois n�meros
b) A diferen�a entre os dois n�meros
c) O produto entre os dois n�meros
d) O quociente da divis�o entre os dois n�meros
*/
#include <stdio.h>

int main(void) {
	int n1, n2, resultado;
	
	printf("Insira um numero: ");
	scanf("%d", &n1); // leia(n1)
	
	printf("Insira outro numero: ");
	scanf("%d", &n2); // leia(n2)
	
	resultado = n1 + n2;
	printf("O valor da soma e: %d\n", resultado);
	
	resultado = n1 - n2;
	printf("O valor da diferenca e: %d\n", resultado);
	
	resultado = n1 * n2;
	printf("O valor do produto e: %d\n", resultado);
	
	resultado = n1 / n2;
	printf("O valor do quociente e: %d\n", resultado);
	
	return 0;
}