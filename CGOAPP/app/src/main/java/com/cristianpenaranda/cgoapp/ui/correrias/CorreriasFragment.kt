package com.cristianpenaranda.cgoapp.ui.correrias

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.fragment.app.Fragment
import androidx.lifecycle.Observer
import androidx.lifecycle.ViewModelProvider
import com.cristianpenaranda.cgoapp.databinding.FragmentCorreriasBinding

class CorreriasFragment : Fragment() {

    private lateinit var correriasViewModel: CorreriasViewModel
    private var _binding: FragmentCorreriasBinding? = null

    // This property is only valid between onCreateView and
    // onDestroyView.
    private val binding get() = _binding!!

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        correriasViewModel =
            ViewModelProvider(this).get(CorreriasViewModel::class.java)

        _binding = FragmentCorreriasBinding.inflate(inflater, container, false)
        val root: View = binding.root

        val textView: TextView = binding.textGallery
        correriasViewModel.text.observe(viewLifecycleOwner, Observer {
            textView.text = it
        })
        return root
    }

    override fun onDestroyView() {
        super.onDestroyView()
        _binding = null
    }
}