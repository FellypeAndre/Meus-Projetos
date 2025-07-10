// ui/TaskViewModel.kt
package com.example.meugerenciadordetarefas.ui

import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import com.example.meugerenciadordetarefas.Task
import java.util.Calendar
import java.util.Date

// Classe para o resumo da categoria
data class CategorySummary(val name: String, val taskCount: Int)

class TaskViewModel : ViewModel() {

    // Lista privada e mutável de tarefas
    private val _tasks = MutableLiveData<MutableList<Task>>(mutableListOf())

    // Lista pública e imutável que a UI vai observar
    val tasks: LiveData<MutableList<Task>> get() = _tasks

    // LiveData para os resumos das categorias
    private val _categorySummaries = MutableLiveData<List<CategorySummary>>()
    val categorySummaries: LiveData<List<CategorySummary>> get() = _categorySummaries


    init {
        // Dados de exemplo para iniciar
        loadSampleTasks()
        updateCategorySummaries()
    }

    fun addTask(task: Task) {
        val currentTasks = _tasks.value ?: mutableListOf()
        currentTasks.add(0, task) // Adiciona no topo
        _tasks.value = currentTasks
        updateCategorySummaries()
    }

    fun deleteTask(task: Task) {
        val currentTasks = _tasks.value ?: mutableListOf()
        currentTasks.remove(task)
        _tasks.value = currentTasks
        updateCategorySummaries()
    }

    private fun updateCategorySummaries() {
        val summaries = _tasks.value
            ?.groupBy { it.category }
            ?.map { (category, tasks) -> CategorySummary(category, tasks.size) }
            ?: emptyList()
        _categorySummaries.value = summaries
    }

    private fun loadSampleTasks() {
        val calendar = Calendar.getInstance()

        // Tarefa em dia
        calendar.add(Calendar.DAY_OF_YEAR, 5)
        val task1 = Task(title = "Preparar apresentação", description = "Finalizar slides para a reunião de sexta", category = "Trabalho", dueDate = calendar.time)

        // Tarefa atrasada
        calendar.time = Date() // Resetar para hoje
        calendar.add(Calendar.DAY_OF_YEAR, -2)
        val task2 = Task(title = "Comprar mantimentos", description = "Leite, pão, ovos", category = "Casa", dueDate = calendar.time)

        _tasks.value = mutableListOf(task1, task2)
    }
}