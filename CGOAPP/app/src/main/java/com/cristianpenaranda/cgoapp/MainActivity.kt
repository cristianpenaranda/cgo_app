package com.cristianpenaranda.cgoapp

import android.app.ProgressDialog
import android.content.Intent
import android.os.Bundle
import android.os.Handler
import android.preference.PreferenceManager
import android.view.View
import android.widget.*
import androidx.appcompat.app.AppCompatActivity
import com.android.volley.AuthFailureError
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import kotlinx.android.synthetic.main.nav_header_inicio.*
import org.json.JSONArray
import org.json.JSONException
import org.json.JSONObject


class MainActivity : AppCompatActivity() {

    lateinit var combo_regionales : Spinner
    var servidor_prefs : String = ""
    var regional : String = ""
    var terminal : String = ""
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        val prefs = PreferenceManager.getDefaultSharedPreferences(this)
        val dato = prefs.getString("servidor_prefs","http://localhost/APIcgoapp/v1/index.php")
        servidor_prefs = dato.toString()
        cargarRegionales()
        registrarTerminal()
    }

    //REGISTRAR TERMINAL
    fun registrarTerminal(){
        val btnRegistro = findViewById<Button>(R.id.btn_registrarTerminal)
        btnRegistro.setOnClickListener{
            terminal = "CENS"+findViewById<EditText>(R.id.terminal_login).text.toString()
            if(terminal == "CENS"){
                Toast.makeText(this, "Debe ingresar el número de la terminal", Toast.LENGTH_SHORT).show()
            }else if(regional == "SELECCIONAR REGIONAL"){
                Toast.makeText(this, "Debe seleccionar la regional a la cual está asignado", Toast.LENGTH_SHORT).show()
            }else{
                registrarTerminalServicio()
            }
        }
    }

   //SERVICIO REMOTO REGISTRAL TERMINAL
    fun registrarTerminalServicio(){
       val progressDialog = ProgressDialog(this)
       progressDialog.setMessage("Registrando...")
       progressDialog.setCancelable(false)
       progressDialog.show()
       val url = servidor_prefs
       val queue = Volley.newRequestQueue(this)
       val stringRequest = object : StringRequest(Request.Method.POST, url,
           Response.Listener<String>{ response ->
                try{
                    val obj = JSONObject(response)
                    var resp = obj.getString("message")
                    if(resp.equals("Terminal registrada exitosamente")){
                        progressDialog.dismiss()
                        guardarPreferences()
                        Toast.makeText(this, "REGISTRO EXITOSO\n"+terminal+" - "+regional, Toast.LENGTH_SHORT).show()
                        startActivity(Intent(this, InicioActivity::class.java))
                    }else{
                        progressDialog.dismiss()
                        Toast.makeText(this, ""+resp, Toast.LENGTH_SHORT).show()
                    }
                }catch(e: JSONException){
                    e.printStackTrace()
                }
           }, Response.ErrorListener {
               volleyError ->
               Toast.makeText(applicationContext, ""+volleyError.message, Toast.LENGTH_SHORT).show()}){
           @Throws(AuthFailureError::class)

           override fun getParams(): Map<String, String> {
               val params = HashMap<String, String>()
               params.put("terminal", terminal)
               params.put("regional", regional)
               return params
           }
       }
       queue.add(stringRequest)
    }

    //GUARDAR PREFERENCIAS
    fun guardarPreferences(){
        val prefs = PreferenceManager.getDefaultSharedPreferences(this)
        val editor = prefs.edit()
        editor.putString("terminal_prefs",terminal)
        editor.putString("regional_prefs",regional)
        editor.apply()
    }

    //CARGAR REGIONALES EN EL COMBO
    fun cargarRegionales(){
        combo_regionales = findViewById(R.id.listado_regionales_login) as Spinner
        val regionales = arrayOf("SELECCIONAR REGIONAL","CUCUTA","PAMPLONA","OCANA","TIBU","AGUACHICA")
        combo_regionales.adapter = ArrayAdapter<String>(this,android.R.layout.simple_list_item_1,regionales)
        combo_regionales.onItemSelectedListener = object : AdapterView.OnItemSelectedListener{
            override fun onItemSelected(parent: AdapterView<*>?,view: View?,position: Int,id: Long) {
                regional = combo_regionales.selectedItem.toString()
            }
            override fun onNothingSelected(parent: AdapterView<*>?) {}
        }
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