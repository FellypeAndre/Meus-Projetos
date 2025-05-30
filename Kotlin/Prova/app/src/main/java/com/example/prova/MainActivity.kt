package com.example.prova

import android.content.Intent
import android.os.Bundle
import android.view.View
import android.widget.*
import androidx.appcompat.app.AppCompatActivity

class MainActivity : AppCompatActivity(), View.OnClickListener {

    private lateinit var valorTotal: EditText
    private lateinit var nPessoa: TextView
    private lateinit var inputOutro: EditText
    private lateinit var radio15: RadioButton
    private lateinit var radio20: RadioButton
    private lateinit var radioOutro: RadioButton
    private lateinit var btnMais: Button
    private lateinit var btnMenos: Button
    private lateinit var btnCalcular: Button
    private lateinit var btnLimpar: Button
    private lateinit var btnVerImposto: Button
    private lateinit var txtGorjeta: TextView
    private lateinit var txtTotalPagar: TextView
    private lateinit var txtPorPessoa: TextView

    private var qtdPessoas = 3

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        valorTotal = findViewById(R.id.valorTotal)
        nPessoa = findViewById(R.id.nPessoa)
        inputOutro = findViewById(R.id.inputOutro)
        radio15 = findViewById(R.id.radio15)
        radio20 = findViewById(R.id.radio20)
        radioOutro = findViewById(R.id.radioOutro)
        btnMais = findViewById(R.id.soma)
        btnMenos = findViewById(R.id.sub)
        btnCalcular = findViewById(R.id.calc)
        btnLimpar = findViewById(R.id.limpar)
        btnVerImposto = findViewById(R.id.verImposto)
        txtGorjeta = findViewById(R.id.vGorjeta)
        txtTotalPagar = findViewById(R.id.tPagar)
        txtPorPessoa = findViewById(R.id.totalPessoa)

        nPessoa.text = qtdPessoas.toString()

        btnMais.setOnClickListener(this)
        btnMenos.setOnClickListener(this)
        btnCalcular.setOnClickListener(this)
        btnLimpar.setOnClickListener(this)
        btnVerImposto.setOnClickListener(this)
    }

    override fun onClick(v: View?) {
        when (v?.id) {
            R.id.soma -> {
                qtdPessoas++
                nPessoa.text = qtdPessoas.toString()
            }
            R.id.sub -> {
                if (qtdPessoas > 1) {
                    qtdPessoas--
                    nPessoa.text = qtdPessoas.toString()
                }
            }
            R.id.calc -> calcularConta()
            R.id.limpar -> limparCampos()
            R.id.verImposto -> {
                val valor = valorTotal.text.toString().toDoubleOrNull() ?: 0.0
                val intent = Intent(this, ImpostosActivity::class.java)
                intent.putExtra("valorConta", valor)
                startActivity(intent)
            }
        }
    }

    private fun calcularConta() {
        val valor = valorTotal.text.toString().toDoubleOrNull()
        if (valor == null || valor <= 0) {
            Toast.makeText(this, "Digite um valor válido para a conta", Toast.LENGTH_SHORT).show()
            return
        }

        val porcentagem = when {
            radio15.isChecked -> 15.0
            radio20.isChecked -> 20.0
            radioOutro.isChecked -> inputOutro.text.toString().toDoubleOrNull() ?: -1.0
            else -> -1.0
        }

        if (porcentagem < 0) {
            Toast.makeText(this, "Informe uma porcentagem válida", Toast.LENGTH_SHORT).show()
            return
        }

        val gorjeta = valor * (porcentagem / 100)
        val total = valor + gorjeta
        val porPessoa = total / qtdPessoas

        txtGorjeta.text = "R$ %.2f".format(gorjeta)
        txtTotalPagar.text = "R$ %.2f".format(total)
        txtPorPessoa.text = "R$ %.2f".format(porPessoa)
    }

    private fun limparCampos() {
        valorTotal.setText("")
        inputOutro.setText("")
        radio15.isChecked = false
        radio20.isChecked = false
        radioOutro.isChecked = false
        txtGorjeta.text = ""
        txtTotalPagar.text = ""
        txtPorPessoa.text = ""
        qtdPessoas = 3
        nPessoa.text = qtdPessoas.toString()
    }
}
