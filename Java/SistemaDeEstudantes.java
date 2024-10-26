import java.util.Scanner;

class Estudante {
    private String id;
    private Double nota;

    public Estudante(String id) {
        this.id = id;
        this.nota = null; 
    }

    public String getId() {
        return id;
    }

    public Double getNota() {
        return nota;
    }

    public void setNota(Double nota) {
        this.nota = nota;
    }

    @Override
    public String toString() {
        return "ID: " + id + ", Nota: " + (nota != null ? nota : "Nota não cadastrada");
    }
}


class PilhaEstudantes {
    private Estudante[] estudantes;
    private int topo;
    private int capacidadeMaxima;

    public PilhaEstudantes(int tamanho) {
        this.capacidadeMaxima = tamanho;
        this.estudantes = new Estudante[capacidadeMaxima];
        this.topo = -1;
    }

    public boolean isCheia() {
        return topo == capacidadeMaxima - 1;
    }

    public boolean isVazia() {
        return topo == -1;
    }

    public void empilhar(Estudante estudante) {
        if (!isCheia()) {
            estudantes[++topo] = estudante;
        } else {
            System.out.println("Pilha cheia. Não é possível adicionar mais estudantes.");
        }
    }

    public Estudante desempilhar() {
        if (!isVazia()) {
            return estudantes[topo--];
        }
        System.out.println("Pilha vazia. Não há estudantes para remover.");
        return null;
    }

    public Estudante topo() {
        if (!isVazia()) {
            return estudantes[topo];
        }
        return null;
    }

    public boolean contem(String id) {
        for (int i = 0; i <= topo; i++) {
            if (estudantes[i].getId().equals(id)) {
                return true;
            }
        }
        return false;
    }

    public Estudante obterEstudante(String id) {
        for (int i = 0; i <= topo; i++) {
            if (estudantes[i].getId().equals(id)) {
                return estudantes[i];
            }
        }
        return null;
    }

    public void listarEstudantes() {
        if (isVazia()) {
            System.out.println("Não há estudantes cadastrados.");
            return;
        }
        for (int i = 0; i <= topo; i++) {
            System.out.println(estudantes[i]);
        }
    }

    public double calcularMedia() {
        double soma = 0;
        int count = 0;
        for (int i = 0; i <= topo; i++) {
            if (estudantes[i].getNota() != null) {
                soma += estudantes[i].getNota();
                count++;
            }
        }
        return count > 0 ? soma / count : 0;
    }
}

public class SistemaDeEstudantes {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        PilhaEstudantes pilha = new PilhaEstudantes(10); // Pilha com capacidade para 10 estudantes
        int opcao;

        do {
            System.out.println("\nMenu:");
            System.out.println("1 - Cadastrar estudante (somente ID)");
            System.out.println("2 - Cadastrar nota (para estudantes já cadastrados)");
            System.out.println("3 - Calcular média das notas dos estudantes");
            System.out.println("4 - Exibir todos os estudantes e respectivas notas");
            System.out.println("5 - Consultar se um estudante está cadastrado");
            System.out.println("6 - Excluir estudante");
            System.out.println("7 - Sair");
            System.out.print("Escolha uma opção: ");
            opcao = scanner.nextInt();
            scanner.nextLine(); // Limpar o buffer

            switch (opcao) {
                case 1:
                    System.out.print("Digite o ID do estudante: ");
                    String id = scanner.nextLine();
                    pilha.empilhar(new Estudante(id));
                    System.out.println("Estudante cadastrado com sucesso!");
                    break;

                case 2:
                    System.out.print("Digite o ID do estudante: ");
                    id = scanner.nextLine();
                    Estudante estudanteParaNota = pilha.obterEstudante(id);
                    if (estudanteParaNota != null) {
                        if (estudanteParaNota.getNota() == null) {
                            System.out.print("Digite a nota do estudante: ");
                            double nota = scanner.nextDouble();
                            estudanteParaNota.setNota(nota);
                            System.out.println("Nota cadastrada com sucesso!");
                        } else {
                            System.out.println("Nota já cadastrada para este estudante.");
                        }
                    } else {
                        System.out.println("Estudante não cadastrado.");
                    }
                    break;

                case 3:
                    double media = pilha.calcularMedia();
                    System.out.println("Média das notas dos estudantes: " + media);
                    break;

                case 4:
                    pilha.listarEstudantes();
                    break;

                case 5:
                    System.out.print("Digite o ID do estudante: ");
                    id = scanner.nextLine();
                    if (pilha.contem(id)) {
                        System.out.println("Estudante está cadastrado.");
                    } else {
                        System.out.println("Estudante não está cadastrado.");
                    }
                    break;

                case 6:
                    Estudante estudanteRemovido = pilha.desempilhar();
                    if (estudanteRemovido != null) {
                        System.out.println("Estudante removido: " + estudanteRemovido);
                    }
                    break;

                case 7:
                    System.out.println("Saindo...");
                    break;

                default:
                    System.out.println("Opção inválida. Tente novamente.");
            }
        } while (opcao != 7);

        scanner.close();
    }
}