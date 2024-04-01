public class Carro {
    private String marca;
    private int ano;

    // Construtor da classe Carro
    public Carro(String marca, int ano) {
        this.marca = marca;
        this.ano = ano;
    }

    // Método para imprimir os detalhes do carro
    public void imprimirDetalhes() {
        System.out.println("Marca: " + marca);
        System.out.println("Ano: " + ano);
    }

    public static void main(String[] args) {
        try {
            // Criando um objeto da classe Carro
            Carro meuCarro = new Carro("Toyota", 2020);
            
            // Imprimindo os detalhes do carro
            meuCarro.imprimirDetalhes();
        } catch (Exception e) {
            System.out.println("Ocorreu um erro: " + e.getMessage());
        }
    }
}
