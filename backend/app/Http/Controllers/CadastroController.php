<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CadastroController extends Controller
{
    public function store(Request $request)

    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique|max:255:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('form.cadastrar')->with('success', 'Cadastro realizado com sucesso!');
    }
}


