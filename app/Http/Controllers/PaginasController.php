<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function inicio()
	{
		return view('modulos.inicio');
	}

	public function reportes()
	{
		return view('modulos.reportes');
	}
}
