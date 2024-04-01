#include <stdio.h>

int main(void) {
	int op;
	float op1, op2, res;
	
	printf("Escolha:\n(1) Adicao\n(2) Subtracao\n(3) Quociente\n(4) Multiplicacao\n");
	scanf("%d", &op);
	
	printf("Insira dois numeros: ");
	scanf("%f %f", &op1, &op2);	
	
	if (op == 1) {
		// Adi��o
		printf("Operacao escolhida: adicao\n");		
		res = op1 + op2;		
	}	
	if (op == 2) {
		// Subtra��o
		printf("Operacao escolhida: subtracao\n");		
		res = op1 - op2;		
	}
	if (op == 3) {
		// Quociente
		printf("Operacao escolhida: quociente da divisao\n");		
		res = op1 / op2;		
	}
	if (op == 4) {
		// Produto
		printf("Operacao escolhida: multiplicacao\n");		
		res = op1 * op2;		
	}	
	printf("Valores informados: %.1f e %.1f\n", op1, op2);
	printf("Resultado: %.2f\n", res);
	
	return 0;
}