import java.util.Scanner;
public class Main {
    public static void main(String[] args) {
        int l1[] = new int[21], i;
        int l2[] = new int[21];
        int soma[] = new int[21];
        Scanner sc = new Scanner(System.in);
        

        System.out.println("Informe os numeros da primeira sequencia:");
        for(i = 0; i < 20; i++){
            l1[i] = sc.nextInt();
        }

        System.out.println("Informe os numeros da segunda sequencia:");
        for(i = 0; i < 20; i++){
            l2[i] = sc.nextInt();
        }
        
        for(i = 0; i < 20; i++){
            soma[i] = l1[i] + l2[i];
        }
        
        System.out.print("Resultado soma:");
        for(i = 0; i < 20; i++){
            System.out.print(soma[i] + " ");
        }
        
        sc.close();