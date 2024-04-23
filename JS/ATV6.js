function encontrarMaximo(matriz) {
    return Math.max(...matriz.flat());
}

console.log(encontrarMaximo([[1, 2, 3], [4, 5, 6], [7, 8, 9]])); 
