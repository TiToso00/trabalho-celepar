<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index()
    {
        $times = Time::all();
        return inertia('Times/Times', compact('times'));
    }

    public function show(Time $time)
    {
        return view('times.show', compact('time'));
    }

    public function create()
    {
        return inertia('Times/CreateTimes');
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string',
            'cidade' => 'required|string',
            'ano_fundacao' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        // Criação do novo time
        Time::create($request->all());

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('times.index')->with('success', 'Time criado com sucesso!');
    }

    public function edit(Time $time)
    {
        return view('times.form', compact('time'));
    }

    public function update(Request $request, Time $time)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string',
            'cidade' => 'required|string',
            'ano_fundacao' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        // Atualização do time
        $time->update($request->all());

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('times.index')->with('success', 'Time atualizado com sucesso!');
    }

}
