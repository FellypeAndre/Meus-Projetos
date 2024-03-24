import java.util.Scanner;
public class Atv5{
    public static void main(String[] args) {
        int n[] = new int[10], i;
        Scanner sc = new Scanner(System.in);

        System.out.print("Informe 10 numeros inteiros:");
        for(i = 0; i < 10; i++){
            n[i] = sc.nextInt();
        }


        System.out.println("Lista Invertida");
        for(i = n.length - 1; i >= 0; i--){
            System.out.print(n[i] + " ");
        }
    }
}
