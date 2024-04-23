function verificarPalindromo(palavra) {
    const reversed = palavra.split('').reverse().join('');
    return palavra === reversed ? 'É um palíndromo' : 'Não é um palíndromo';
}

console.log(verificarPalindromo("radar")); // Exemplo de uso
