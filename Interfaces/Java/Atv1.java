import java.util.Scanner;
public class Atv1{
	public static void main(String[] args){
	    Scanner scanner = new Scanner(System.in);
    
        int[] limite = new int[20];
        
        for(int i=0; i < 20; i++){
            System.out.print("Valor: ");
            limite[i] = scanner.nextInt();
            
        }
        
        System.out.println("Sequecia de valores até 20: ");
        for(int i=0; i<10; i++){
            System.out.print(limite[i]+" ");
            
        }
       
    }
}