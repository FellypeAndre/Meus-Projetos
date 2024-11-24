import java.util.ArrayList;
import java.util.Scanner;


class Equipamento {
    private String nome;
    private String fabricante;
    private double preco;

    
    public Equipamento() {}

    public Equipamento(String nome, String fabricante, double preco) {
        this.nome = nome;
        this.fabricante = fabricante;
        this.preco = preco;
    }

   
    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getFabricante() {
        return fabricante;
    }

    public void setFabricante(String fabricante) {
        this.fabricante = fabricante;
    }

    public double getPreco() {
        return preco;
    }

    public void setPreco(double preco) {
        this.preco = preco;
    }

    
    @Override
    public String toString() {
        return "Equipamento [nome=" + nome + ", fabricante=" + fabricante + ", preco=" + preco + "]";
    }
}


class Furadeira extends Equipamento {
    private int potencia;
    private int velocidade;

   
    public Furadeira(int potencia, int velocidade, String nome, String fabricante, double preco) {
        super(nome, fabricante, preco);
        this.potencia = potencia;
        this.velocidade = velocidade;
    }

   
    public int getPotencia() {
        return potencia;
    }

    public void setPotencia(int potencia) {
        this.potencia = potencia;
    }

    public int getVelocidade() {
        return velocidade;
    }

    public void setVelocidade(int velocidade) {
        this.velocidade = velocidade;
    }

    
    @Override
    public String toString() {
        return "Furadeira [potencia=" + potencia + ", velocidade=" + velocidade + ", " + super.toString() + "]";
    }
}

class Bomba extends Equipamento {
    private int vazao;
    private double profundidade;

    // Construtor
    public Bomba(int vazao, double profundidade, String nome, String fabricante, double preco) {
        super(nome, fabricante, preco);
        this.vazao = vazao;
        this.profundidade = profundidade;
    }

    public int getVazao() {
        return vazao;
    }

    public void setVazao(int vazao) {
        this.vazao = vazao;
    }

    public double getProfundidade() {
        return profundidade;
    }

    public void setProfundidade(double profundidade) {
        this.profundidade = profundidade;
    }
    @Override
    public String toString() {
        return "Bomba [vazao=" + vazao + ", profundidade=" + profundidade + ", " + super.toString() + "]";
    }
}

class Loja {
    private String nome;
    private int quantidadeFuncionarios;
    private ArrayList<Equipamento> produtos;

    
    public Loja(String nome, int quantidadeFuncionarios) {
        this.nome = nome;
        this.quantidadeFuncionarios = quantidadeFuncionarios;
        this.produtos = new ArrayList<>();
    }
    
    public void listar() {
        if (produtos.isEmpty()) {
            System.out.println("Nenhum produto cadastrado.");
        } else {
            for (Equipamento produto : produtos) {
                System.out.println(produto);
            }
        }
    }

    
    public void listarFuradeiras() {
        boolean encontrado = false;
        for (Equipamento produto : produtos) {
            if (produto instanceof Furadeira) {
                System.out.println(produto);
                encontrado = true;
            }
        }
        if (!encontrado) {
            System.out.println("Nenhuma furadeira cadastrada.");
        }
    }

    
    public void listarBomba() {
        boolean encontrado = false;
        for (Equipamento produto : produtos) {
            if (produto instanceof Bomba) {
                System.out.println(produto);
                encontrado = true;
            }
        }
        if (!encontrado) {
            System.out.println("Nenhuma bomba cadastrada.");
        }
    }

    public void addFuradeira(Furadeira furadeira) {
        produtos.add(furadeira);
        System.out.println("Furadeira adicionada com sucesso!");
    }

    public void addBomba(Bomba bomba) {
        produtos.add(bomba);
        System.out.println("Bomba adicionada com sucesso!");
    }
    
    public void removeProduto(String nome) {
        for (Equipamento produto : produtos) {
            if (produto.getNome().equalsIgnoreCase(nome)) {
                produtos.remove(produto);
                System.out.println("Produto removido com sucesso!");
                return;
            }
        }
        System.out.println("Produto não encontrado.");
    }

    public int quantidadeProdutos() {
        return produtos.size();
    }

    public boolean buscaProduto(String nome) {
        for (Equipamento produto : produtos) {
            if (produto.getNome().equalsIgnoreCase(nome)) {
                System.out.println("Produto encontrado: " + produto);
                return true;
            }
        }
        System.out.println("Produto não encontrado.");
        return false;
    }
}


public class LP {
    public static void main(String[] args) {
        Loja loja = new Loja("Minha Loja", 5);
        Scanner scanner = new Scanner(System.in);
        int opcao;

        do {
            System.out.println("\n--- Menu Loja ---");
            System.out.println("1- Cadastrar Furadeira");
            System.out.println("2- Cadastrar Bomba");
            System.out.println("3- Listar todos os produtos");
            System.out.println("4- Listar todas as furadeiras");
            System.out.println("5- Listar todas as bombas");
            System.out.println("6- Remover produto pelo nome");
            System.out.println("7- Quantidade de produtos");
            System.out.println("8- Buscar produto pelo nome");
            System.out.println("0- Sair");
            System.out.print("Escolha uma opção: ");
            opcao = scanner.nextInt();
            scanner.nextLine(); // Consumir a quebra de linha

            switch (opcao) {
                case 1:
                    System.out.print("Nome da Furadeira: ");
                    String nomeFuradeira = scanner.nextLine();
                    System.out.print("Fabricante: ");
                    String fabricanteFuradeira = scanner.nextLine();
                    System.out.print("Preço: ");
                    double precoFuradeira = scanner.nextDouble();
                    System.out.print("Potência: ");
                    int potencia = scanner.nextInt();
                    System.out.print("Velocidade: ");
                    int velocidade = scanner.nextInt();
                    loja.addFuradeira(new Furadeira(potencia, velocidade, nomeFuradeira, fabricanteFuradeira, precoFuradeira));
                    break;

                case 2:
                    System.out.print("Nome da Bomba: ");
                    String nomeBomba = scanner.nextLine();
                    System.out.print("Fabricante: ");
                    String fabricanteBomba = scanner.nextLine();
                    System.out.print("Preço: ");
                    double precoBomba = scanner.nextDouble();
                    System.out.print("Vazão: ");
                    int vazao = scanner.nextInt();
                    System.out.print("Profundidade: ");
                    double profundidade = scanner.nextDouble();
                    loja.addBomba(new Bomba(vazao, profundidade, nomeBomba, fabricanteBomba, precoBomba));
                    break;

                case 3:
                    loja.listar();
                    break;

                case 4:
                    loja.listarFuradeiras();
                    break;

                case 5:
                    loja.listarBomba();
                    break;

                case 6:
                    System.out.print("Nome do produto a ser removido: ");
                    String nomeRemover = scanner.nextLine();
                    loja.removeProduto(nomeRemover);
                    break;

                case 7:
                    System.out.println("Quantidade de produtos: " + loja.quantidadeProdutos());
                    break;

                case 8:
                    System.out.print("Nome do produto a ser buscado: ");
                    String nomeBuscar = scanner.nextLine();
                    loja.buscaProduto(nomeBuscar);
                    break;

                case 0:
                    System.out.println("Saindo do sistema...");
                    break;

                default:
                    System.out.println("Opção inválida. Tente novamente.");
            }
        } while (opcao != 0);

        scanner.close();
    }
}
