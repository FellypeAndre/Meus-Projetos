package com.example.meugerenciadordetarefas.ui

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.appcompat.widget.SearchView
import androidx.fragment.app.Fragment
import androidx.fragment.app.activityViewModels
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.example.meugerenciadordetarefas.R

class CategoriesFragment : Fragment() {

    private val sharedViewModel: TaskViewModel by activityViewModels()
    private lateinit var categoryAdapter: CategoryAdapter

    // Vamos guardar a lista completa aqui para não perdê-la ao filtrar
    private var fullCategoryList = listOf<CategorySummary>()

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        return inflater.inflate(R.layout.fragment_categories, container, false)
    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)

        val recyclerView: RecyclerView = view.findViewById(R.id.recycler_view_categories)
        val searchView: SearchView = view.findViewById(R.id.search_view_categories)

        setupRecyclerView(recyclerView)
        setupObservers()
        setupSearchView(searchView) // Nova função para configurar a busca
    }

    private fun setupRecyclerView(recyclerView: RecyclerView) {
        categoryAdapter = CategoryAdapter()
        recyclerView.adapter = categoryAdapter
        recyclerView.layoutManager = LinearLayoutManager(requireContext())
    }

    private fun setupObservers() {
        sharedViewModel.categorySummaries.observe(viewLifecycleOwner) { summaries ->
            summaries?.let {
                // Guarda a lista completa
                fullCategoryList = it
                // Envia a lista para o adaptador para exibição inicial
                categoryAdapter.submitList(it)
            }
        }
    }

    private fun setupSearchView(searchView: SearchView) {
        searchView.setOnQueryTextListener(object : SearchView.OnQueryTextListener {
            // Não precisamos usar este, mas ele deve ser implementado
            override fun onQueryTextSubmit(query: String?): Boolean {
                return false
            }

            // Este é chamado toda vez que o texto na busca muda
            override fun onQueryTextChange(newText: String?): Boolean {
                filterCategories(newText)
                return true
            }
        })
    }

    private fun filterCategories(query: String?) {
        // Se a busca estiver vazia, mostramos a lista completa
        val filteredList = if (query.isNullOrBlank()) {
            fullCategoryList
        } else {
            // Caso contrário, filtramos a lista completa
            fullCategoryList.filter { category ->
                // A busca não diferencia maiúsculas de minúsculas
                category.name.contains(query, ignoreCase = true)
            }
        }
        // Enviamos a lista filtrada para o adaptador atualizar a UI
        categoryAdapter.submitList(filteredList)
    }
}