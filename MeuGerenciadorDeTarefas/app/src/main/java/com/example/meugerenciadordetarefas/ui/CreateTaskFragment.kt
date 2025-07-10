// ui/CreateTaskFragment.kt
package com.example.meugerenciadordetarefas.ui

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.fragment.app.Fragment
import androidx.fragment.app.activityViewModels
import androidx.navigation.fragment.findNavController
import com.example.meugerenciadordetarefas.R
import com.example.meugerenciadordetarefas.Task
import java.util.Date
import java.util.Calendar

class CreateTaskFragment : Fragment() {

    private val sharedViewModel: TaskViewModel by activityViewModels()

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        return inflater.inflate(R.layout.fragment_create_task, container, false)
    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)

        val titleEt: EditText = view.findViewById(R.id.et_title)
        val descEt: EditText = view.findViewById(R.id.et_description)
        val categoryEt: EditText = view.findViewById(R.id.et_category)
        val saveButton: Button = view.findViewById(R.id.btn_save_task)

        saveButton.setOnClickListener {
            val title = titleEt.text.toString()
            val description = descEt.text.toString()
            val category = categoryEt.text.toString()

            if (title.isBlank() || description.isBlank() || category.isBlank()) {
                Toast.makeText(requireContext(), "Preencha todos os campos", Toast.LENGTH_SHORT).show()
                return@setOnClickListener
            }

            // Simples: data de vencimento para daqui a 7 dias
            val calendar = Calendar.getInstance()
            calendar.add(Calendar.DAY_OF_YEAR, 7)

            val newTask = Task(
                title = title,
                description = description,
                category = category,
                dueDate = calendar.time
            )

            sharedViewModel.addTask(newTask)
            Toast.makeText(requireContext(), "Tarefa salva!", Toast.LENGTH_SHORT).show()
            findNavController().navigateUp() // Volta para a tela anterior
        }
    }
}