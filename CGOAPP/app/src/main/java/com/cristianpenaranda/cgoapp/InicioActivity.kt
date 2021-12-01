package com.cristianpenaranda.cgoapp

import android.content.Intent
import android.os.Bundle
import android.preference.PreferenceManager
import android.view.View
import android.widget.TextView
import com.google.android.material.navigation.NavigationView
import androidx.navigation.findNavController
import androidx.navigation.ui.AppBarConfiguration
import androidx.navigation.ui.navigateUp
import androidx.navigation.ui.setupActionBarWithNavController
import androidx.navigation.ui.setupWithNavController
import androidx.drawerlayout.widget.DrawerLayout
import androidx.appcompat.app.AppCompatActivity
import com.cristianpenaranda.cgoapp.databinding.ActivityInicioBinding
import kotlinx.android.synthetic.main.nav_header_inicio.*
import kotlinx.android.synthetic.main.nav_header_inicio.view.*

class InicioActivity : AppCompatActivity() {

    private lateinit var appBarConfiguration: AppBarConfiguration
    private lateinit var binding: ActivityInicioBinding

    override fun onCreate(savedInstanceState: Bundle?) {

        super.onCreate(savedInstanceState)

        binding = ActivityInicioBinding.inflate(layoutInflater)
        setContentView(binding.root)

        setSupportActionBar(binding.appBarInicio.toolbar)

        val drawerLayout: DrawerLayout = binding.drawerLayout
        val navView: NavigationView = binding.navView
        val navController = findNavController(R.id.nav_host_fragment_content_inicio)
        // Passing each menu ID as a set of Ids because each
        // menu should be considered as top level destinations.
        appBarConfiguration = AppBarConfiguration(
            setOf(
                R.id.nav_home, R.id.nav_gallery, R.id.nav_slideshow
            ), drawerLayout
        )
        setupActionBarWithNavController(navController, appBarConfiguration)
        navView.setupWithNavController(navController)
    }

    override fun onStart() {
        super.onStart()
        val prefs = PreferenceManager.getDefaultSharedPreferences(this)
        var dato = prefs.getString("terminal_prefs", "vacio")
        var regional = prefs.getString("regional_prefs", "vacio")
        var vistaHeader : View = binding.navView.getHeaderView(0)
        var terminal_vista : TextView = vistaHeader.findViewById(R.id.txtTerminalPanel)
        var regional_vista : TextView = vistaHeader.findViewById(R.id.txtRegionalPanel)
        terminal_vista.text = dato
        regional_vista.text = regional
    }

    override fun onSupportNavigateUp(): Boolean {
        val navController = findNavController(R.id.nav_host_fragment_content_inicio)
        return navController.navigateUp(appBarConfiguration) || super.onSupportNavigateUp()

    }


    //EVITAR RETROCEDER AL SPLASH_SCREEN
    override fun onBackPressed() {
        var intent = Intent()
        intent = Intent(Intent.ACTION_MAIN)
        intent.addCategory(Intent.CATEGORY_HOME)
        intent.flags = Intent.FLAG_ACTIVITY_NEW_TASK
        startActivity(intent)
    }
}