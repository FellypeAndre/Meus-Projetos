package com.example.meugerenciadordetarefas.ui

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.recyclerview.widget.DiffUtil
import androidx.recyclerview.widget.ListAdapter
import androidx.recyclerview.widget.RecyclerView
import com.example.meugerenciadordetarefas.R

// Usamos o CategorySummary que criamos dentro do TaskViewModel
class CategoryAdapter : ListAdapter<CategorySummary, CategoryAdapter.CategoryViewHolder>(CategoryDiffCallback) {

    class CategoryViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView) {
        private val categoryNameTextView: TextView = itemView.findViewById(R.id.tv_category_name)
        private val categoryCountTextView: TextView = itemView.findViewById(R.id.tv_category_count)

        fun bind(summary: CategorySummary) {
            categoryNameTextView.text = summary.name
            categoryCountTextView.text = summary.taskCount.toString()
        }
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): CategoryViewHolder {
        val view = LayoutInflater.from(parent.context)
            .inflate(R.layout.item_category, parent, false)
        return CategoryViewHolder(view)
    }

    override fun onBindViewHolder(holder: CategoryViewHolder, position: Int) {
        val category = getItem(position)
        holder.bind(category)
    }
}

object CategoryDiffCallback : DiffUtil.ItemCallback<CategorySummary>() {
    override fun areItemsTheSame(oldItem: CategorySummary, newItem: CategorySummary): Boolean {
        return oldItem.name == newItem.name
    }

    override fun areContentsTheSame(oldItem: CategorySummary, newItem: CategorySummary): Boolean {
        return oldItem == newItem
    }
}