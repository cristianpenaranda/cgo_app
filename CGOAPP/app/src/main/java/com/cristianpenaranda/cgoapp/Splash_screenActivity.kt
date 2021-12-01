package com.cristianpenaranda.cgoapp

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.preference.PreferenceManager
import android.widget.ArrayAdapter
import android.widget.Spinner
import android.widget.Toast

class Splash_screenActivity : AppCompatActivity() {
    private val key_prefs = "terminal_prefs"
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        val prefs = PreferenceManager.getDefaultSharedPreferences(this)
        val editor = prefs.edit()
        editor.putString("servidor_prefs","http://192.168.0.27/APIcgoapp/v1/index.php")
        editor.apply()
        cargarPreferencias()
    }

    //CARGAR PREFERENCIAS PARA SABER SI HAY TERMINAL YA REGISTRADA
    fun cargarPreferencias(){
        val prefs = PreferenceManager.getDefaultSharedPreferences(this)
        var dato = prefs.getString(key_prefs, "vacio")
        if(dato.equals("vacio")){
            startActivity(Intent(this, MainActivity::class.java))
        }else{
            startActivity(Intent(this, InicioActivity::class.java))
            Toast.makeText(applicationContext, "Bienvenido!", Toast.LENGTH_SHORT).show()
        }
    }
}