package com.example.prova

import android.os.Bundle
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity

class ImpostosActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_impostos)

        val valorConta = intent.getDoubleExtra("valorConta", 0.0)

        val iss = valorConta * 0.05
        val icms = valorConta * 0.17
        val inss_fgts = valorConta * 0.15
        val totalImpostos = iss + icms + inss_fgts

        val textISS = findViewById<TextView>(R.id.textISS)
        val textICMS = findViewById<TextView>(R.id.textICMS)
        val textINSS_FGTS = findViewById<TextView>(R.id.textINSS_FGTS)
        val textTotal = findViewById<TextView>(R.id.textTotalImpostos)

        textISS.text = "ISS (5%): R$ %.2f".format(iss)
        textICMS.text = "ICMS (17%): R$ %.2f".format(icms)
        textINSS_FGTS.text = "INSS + FGTS (15%): R$ %.2f".format(inss_fgts)
        textTotal.text = "Total de Impostos: R$ %.2f".format(totalImpostos)
    }
}
