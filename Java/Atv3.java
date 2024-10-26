4import java.util.Scanner;
public class Atv3 {
    public static void main(String[] args){
        int n[] = new int[20], quantPositivos = 0, i;
        Scanner sc = new Scanner(System.in);

        System.out.println("Informe 20 numeros inteiros:");
        for (i = 1; i < 21; i++){
            System.out.println(i+"° numero inteiro:");
            n[i] = sc.nextInt();

            if (n[i] > 0 ) {
                quantPositivos++;
            }
        }

        System.out.println("Quantidade de numeros positivos: " + quantPositivos);

        if (quantPositivos > 0) {
            System.out.println("Os numeros positivos sao:");
            for (i = 0; i < 20; i++){
                if(n[i] > 0){
                    System.out.print(n[i] + " ");
                }
            }
            
        }
    }
}
