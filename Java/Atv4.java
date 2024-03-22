import java.util.Scanner;
public class Atv4 {
    public static void main(String[] args){
        int n[] = new int[15], quantImpares = 0, i;
        Scanner sc = new Scanner(System.in);

        System.out.println("Informe 15 numeros inteiros:");
        for (i = 0; i < 15; i++){
            n[i] = sc.nextInt();
        }
        for (i = 0; i < 15; i++){    
            if (n[i] % 2 == 1) {
                System.out.print(n[i] + " ");
                quantImpares++;
            }
        }
        System.out.print("\nQuantidade numeros impares: " + quantImpares);
    }
}
