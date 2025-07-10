// Fica no arquivo Task.kt
package com.example.meugerenciadordetarefas

import java.util.Date

data class Task(
    val id: Long = System.currentTimeMillis(), // ID único baseado no tempo
    val title: String,
    val description: String,
    val category: String,
    val dueDate: Date // Data de vencimento para verificar o status
) {
    // Função auxiliar para verificar se a tarefa está atrasada
    fun isOverdue(): Boolean {
        // Se a data de vencimento for anterior à data/hora atual, está atrasada.
        return dueDate.before(Date())
    }
}