package com.cristianpenaranda.cgoapp.ui.correrias

import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel

class CorreriasViewModel : ViewModel() {

    private val _text = MutableLiveData<String>().apply {
        value = "This is correrias Fragment"
    }
    val text: LiveData<String> = _text
}