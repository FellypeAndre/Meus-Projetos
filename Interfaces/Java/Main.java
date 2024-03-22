import java.util.Scanner;
public class Main{
	public static void main(String[] args){
    Scanner sc = new Scanner(System.in);
    	
    	int idade;
        
        
        try{
            System.out.print("Idade: ");
            idade = sc.nextInt();
          if(idade >= 18){
              System.out.println("Parabens cria ja podes ser preso ");
          }else{
              System.out.println("E rapa vaza");
          }
        }
        catch(Exception e){
        	System.out.println("n foi");
        }
       
    }
}
