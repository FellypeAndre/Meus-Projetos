function celsiusParaFahrenheit(celsius) {
    return celsius * 9 / 5 + 32;
}

function fahrenheitParaCelsius(fahrenheit) {
    return (fahrenheit - 32) * 5 / 9;
}

console.log(celsiusParaFahrenheit(30)); 
console.log(fahrenheitParaCelsius(86)); 
