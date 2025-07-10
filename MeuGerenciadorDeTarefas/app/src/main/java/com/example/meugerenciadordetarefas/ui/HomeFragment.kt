// ui/HomeFragment.kt
package com.example.meugerenciadordetarefas.ui

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.appcompat.app.AlertDialog
import androidx.appcompat.widget.SearchView
import androidx.fragment.app.Fragment
import androidx.fragment.app.activityViewModels
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.example.meugerenciadordetarefas.R
import com.example.meugerenciadordetarefas.Task

class HomeFragment : Fragment() {

    private val sharedViewModel: TaskViewModel by activityViewModels()
    private lateinit var taskAdapter: TaskAdapter
    private var fullTaskList = listOf<Task>()


    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        return inflater.inflate(R.layout.fragment_home, container, false)
    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)

        val recyclerView: RecyclerView = view.findViewById(R.id.recycler_view_tasks)
        val searchView: SearchView = view.findViewById(R.id.search_view_home)

        setupRecyclerView(recyclerView)
        setupObservers()
        setupSearchView(searchView)
    }

    private fun setupRecyclerView(recyclerView: RecyclerView) {
        taskAdapter = TaskAdapter { task ->
            showDeleteConfirmationDialog(task)
        }
        recyclerView.adapter = taskAdapter
        recyclerView.layoutManager = LinearLayoutManager(requireContext())
    }

    private fun setupObservers() {
        sharedViewModel.tasks.observe(viewLifecycleOwner) { tasks ->
            tasks?.let {
                fullTaskList = it
                taskAdapter.submitList(it)
            }
        }
    }

    private fun showDeleteConfirmationDialog(task: Task) {
        AlertDialog.Builder(requireContext())
            .setTitle("Excluir Tarefa")
            .setMessage("Você tem certeza que deseja excluir esta tarefa?")
            .setPositiveButton("Sim") { _, _ ->
                sharedViewModel.deleteTask(task)
            }
            .setNegativeButton("Não", null)
            .show()
    }

    private fun setupSearchView(searchView: SearchView) {
        searchView.setOnQueryTextListener(object : SearchView.OnQueryTextListener {
            override fun onQueryTextSubmit(query: String?): Boolean {
                return false
            }

            override fun onQueryTextChange(newText: String?): Boolean {
                filterTasks(newText)
                return true
            }
        })
    }

    private fun filterTasks(query: String?) {
        val filteredList = if (query.isNullOrBlank()) {
            fullTaskList
        } else {
            fullTaskList.filter {
                it.title.contains(query, ignoreCase = true) ||
                        it.description.contains(query, ignoreCase = true) ||
                        it.category.contains(query, ignoreCase = true)
            }
        }
        taskAdapter.submitList(filteredList)
    }
}