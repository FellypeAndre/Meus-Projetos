// ui/TaskAdapter.kt
package com.example.meugerenciadordetarefas.ui

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.TextView
import androidx.core.content.ContextCompat
import androidx.recyclerview.widget.DiffUtil
import androidx.recyclerview.widget.ListAdapter
import androidx.recyclerview.widget.RecyclerView
import com.example.meugerenciadordetarefas.R
import com.example.meugerenciadordetarefas.Task

class TaskAdapter(private val onItemClicked: (Task) -> Unit) :
    ListAdapter<Task, TaskAdapter.TaskViewHolder>(TaskDiffCallback) {

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): TaskViewHolder {
        val view = LayoutInflater.from(parent.context).inflate(R.layout.item_task, parent, false)
        return TaskViewHolder(view)
    }

    override fun onBindViewHolder(holder: TaskViewHolder, position: Int) {
        val task = getItem(position)
        holder.bind(task)
        holder.itemView.setOnClickListener {
            onItemClicked(task)
        }
    }

    class TaskViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView) {
        private val title: TextView = itemView.findViewById(R.id.tv_task_title)
        private val description: TextView = itemView.findViewById(R.id.tv_task_description)
        private val category: TextView = itemView.findViewById(R.id.tv_task_category)
        private val statusIcon: ImageView = itemView.findViewById(R.id.iv_status_icon)

        fun bind(task: Task) {
            title.text = task.title
            description.text = task.description
            category.text = task.category

            if (task.isOverdue()) {
                statusIcon.setImageResource(R.drawable.ic_status_overdue)
                statusIcon.setColorFilter(ContextCompat.getColor(itemView.context, android.R.color.holo_red_dark))
            } else {
                statusIcon.setImageResource(R.drawable.ic_status_ontime)
                statusIcon.setColorFilter(ContextCompat.getColor(itemView.context, android.R.color.holo_green_dark))
            }
        }
    }
}

object TaskDiffCallback : DiffUtil.ItemCallback<Task>() {
    override fun areItemsTheSame(oldItem: Task, newItem: Task): Boolean {
        return oldItem.id == newItem.id
    }

    override fun areContentsTheSame(oldItem: Task, newItem: Task): Boolean {
        return oldItem == newItem
    }
}