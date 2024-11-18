// ---------------------atividade em Dupla Andre e Yuri-------------------------

public class SomaListas{

    static class Nodo {
        int valor;
        Nodo proximo;

        Nodo(int valor) {
            this.valor = valor;
            this.proximo = null;
        }
    }

    static class Lista {
        Nodo cabeca;

        void adicionarNoFinal(int valor) {
            if (cabeca == null) {
                cabeca = new Nodo(valor);
            } else {
                Nodo atual = cabeca;
                while (atual.proximo != null) {
                    atual = atual.proximo;
                }
                atual.proximo = new Nodo(valor);
            }
        }

        int tamanho() {
            int tamanho = 0;
            Nodo atual = cabeca;
            while (atual != null) {
                tamanho++;
                atual = atual.proximo;
            }
            return tamanho;
        }

        void imprimir() {
            Nodo atual = cabeca;
            while (atual != null) {
                System.out.print(atual.valor);
                atual = atual.proximo;
            }
        }
    }

    public static Lista stringParaLista(String str) {
        Lista lista = new Lista();
        for (int i = 0; i < str.length(); i++) {
            lista.adicionarNoFinal(Character.getNumericValue(str.charAt(i)));
        }
        return lista;
    }

    public static Lista somar(Lista lista1, Lista lista2) {
        Lista resultado = new Lista();
        Nodo nodo1 = lista1.cabeca;
        Nodo nodo2 = lista2.cabeca;

        int carry = 0;

        while (nodo1 != null || nodo2 != null || carry > 0) {
            int valor1 = (nodo1 != null) ? nodo1.valor : 0;
            int valor2 = (nodo2 != null) ? nodo2.valor : 0;

            int soma = valor1 + valor2 + carry;
            carry = soma / 10;
            resultado.adicionarNoFinal(soma % 10);

            if (nodo1 != null) nodo1 = nodo1.proximo;
            if (nodo2 != null) nodo2 = nodo2.proximo;
        }

        return resultado;
    }

    public static Lista inverter(Lista lista) {
        Lista invertida = new Lista();
        Nodo atual = lista.cabeca;
        while (atual != null) {
            Nodo novoNodo = new Nodo(atual.valor);
            novoNodo.proximo = invertida.cabeca;
            invertida.cabeca = novoNodo;
            atual = atual.proximo;
        }
        return invertida;
    }

    public static void main(String[] args) {
        
      
        String numero1 = "10230120431024012031023010201040120301";
        String numero2 = "012030123010240123010230120310230120310204120301203102";

        Lista lista1 = inverter(stringParaLista(numero1));
        Lista lista2 = inverter(stringParaLista(numero2));

        Lista resultado = somar(lista1, lista2);

        resultado = inverter(resultado);
        
        System.out.println(numero1 + "\n+\n" + numero2);

        System.out.println("Resultado da soma:");
        resultado.imprimir();
    }
}
