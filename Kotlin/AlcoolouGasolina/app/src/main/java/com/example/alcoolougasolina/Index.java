package com.example.alcoolougasolina;

import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;

import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;

public class Index extends AppCompatActivity {

    private EditText editAlcool;
    private EditText editGasolina;
    private TextView resultado;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        EdgeToEdge.enable(this);
        setContentView(R.layout.activity_index);
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main), (v, insets) -> {
            Insets systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom);
            return insets;
        });

        editAlcool = findViewById(R.id.editAlcool);
        editGasolina = findViewById(R.id.editGasolina);
        resultado = findViewById(R.id.resultado);

    }

    public void calcularPreco(View view){

        Double precoAcool = Double.parseDouble(editAlcool.getText().toString());
        Double precoGasolina = Double.parseDouble(editGasolina.getText().toString());
        Double calc = precoAcool/precoGasolina;
        // Faz calculo ( precoAlcool / precoGasolina)

        if (calc >= 0.7){
            resultado.setText("Utilizar a gasolina");
        }else{
            resultado.setText("Melhor o alcool");
        }

    }

}