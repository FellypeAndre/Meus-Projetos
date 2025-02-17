<?php

// app/Models/Produto.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    // Caso o nome da tabela no banco não seja o plural do nome do modelo, defina explicitamente:
    protected $table = 'produtos'; // Substitua pelo nome da sua tabela

    // Se precisar, defina os campos que podem ser preenchidos
    protected $fillable = ['nome', 'descricao', 'preco', 'quantidade']; 
}

?>
