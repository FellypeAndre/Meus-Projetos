import java.util.Scanner;
public class Atv2 {
    public static void main (String[] args) {
        int quantidade = 0, abaixo = 0, i;
        double nota[] = new double[10], somaDasNotas = 0.0, media;
        Scanner sc = new Scanner(System.in);

        System.out.println("Informe a nota da prova de 10 alunos:");

        for (i = 0; i < 10; i++){
            nota [i] = sc.nextDouble();
            somaDasNotas = somaDasNotas + nota[i];
        }

        media = somaDasNotas / 10.0;
        System.out.println("Media: " +  media);

        for (i = 0; i < 10; i++){
            if (nota[i] >= media) {
                quantidade++;
            }else{
                abaixo++;
            }
        }
        System.out.println(quantidade + " estudantes que obtiveram nota de prova acima da media da turma");
        System.out.println(abaixo + " estudantes que obtiveram nota de prova abaixo da media da turma");
    }
    
}