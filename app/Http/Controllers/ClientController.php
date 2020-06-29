<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
  /**
   * Formulário de cadastro de cliente
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
    public function create() {
      return view('client.create');
    }

    /**
     * Ação para salvar os dados do cliente no banco
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request) {
      Client::create($request->all());
      return redirect('/home');
    }
}
