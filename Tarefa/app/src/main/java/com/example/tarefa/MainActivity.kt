package com.example.tarefa

import android.os.Bundle
import android.view.MenuItem
import android.view.View
import android.view.View.OnClickListener
import android.widget.Button
import androidx.appcompat.app.AppCompatActivity
import androidx.fragment.app.Fragment
import com.google.android.material.bottomnavigation.BottomNavigationView

class MainActivity : AppCompatActivity(), OnClickListener, BottomNavigationView.OnNavigationItemSelectedListener  {
//    private lateinit var buttonForm: Button
//    private lateinit var buttonHome: Button
//    private lateinit var buttonBusca: Button

    private lateinit var homeFragment: HomeFragment
    private lateinit var buscaFragment: BuscaFragment
    private lateinit var formFragment: FormFragment

    private lateinit var bottomNavigationView: BottomNavigationView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
//        buttonHome = findViewById(R.id.button_home)
//        buttonHome.setOnClickListener(this)
//
//
//        buttonForm = findViewById(R.id.button_form)
//        buttonForm.setOnClickListener(this)
//
//        buttonBusca = findViewById(R.id.button_busca)
//        buttonBusca.setOnClickListener(this)

        homeFragment = HomeFragment()
        formFragment = FormFragment()
        buscaFragment = BuscaFragment()

        bottomNavigationView = findViewById(R.id.bottom_navigation)
        bottomNavigationView.setOnNavigationItemSelectedListener(this)

        setFragment(homeFragment)

    }

    private fun setFragment(fragment: Fragment){
        val fragmentTransaction = supportFragmentManager.beginTransaction()
        fragmentTransaction.replace(R.id.frame_fragments, fragment)
        fragmentTransaction.commit()
    }

    override fun onClick(v: View) {
//        when (v.id){
//            R.id.button_home -> {
//                setFragment(homeFragment)
//
//            }
//            R.id.button_form -> {
//                setFragment(formFragment)
//
//            }
//            R.id.button_busca -> {
//                setFragment(buscaFragment)
//
//            }
//        }
    }

    override fun onNavigationItemSelected(item: MenuItem): Boolean {
       when (item.itemId){
           R.id.menu_home -> {
               setFragment(homeFragment)

           }
           R.id.menu_form -> {
               setFragment(formFragment)

           }
           R.id.menu_busca -> {
               setFragment(buscaFragment)

           }

       }
        return true

    }


}

