<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use Illuminate\Support\Facades\Auth;

class TurmaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isDono()) {
            $turmas = Turma::withCount('alunos')->get();
        } else {
            $turmas = Turma::where('escola_id', $user->escola_id)->withCount('alunos')->get();
        }

        return view('dashboard', compact('turmas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'periodo' => ['required', 'string'],
        ]);

        Turma::create([
            'nome' => $request->nome,
            'periodo' => $request->periodo,
            'escola_id' => Auth::user()->escola_id,
        ]);

        return redirect()->back()->with('sucesso', 'Turma cadastrada com sucesso!');
    }

    public function destroy($id)
    {
        $turma = Turma::findOrFail($id);

        if (!Auth::user()->isDono() && $turma->escola_id !== Auth::user()->escola_id) {
            abort(403, 'Ação não autorizada.');
        }

        $turma->delete();

        return redirect()->back()->with('sucesso', 'Turma removida com sucesso!');
    }

    public function getAlunos($id)
    {
        $turma = Turma::findOrFail($id);
        $alunos = $turma->alunos()->pluck('nome');
        return response()->json([
            'nome_turma' => $turma->nome,
            'alunos' => $alunos,
        ]);
    }

    public function show($id)
    {
        $turma = Turma::findOrFail($id);
        return response()->json($turma);
    }

    public function update(Request $request, $id)
    {
        $turma = Turma::findOrFail($id);
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'periodo' => ['required', 'string'],
        ]);
        $turma->update($data);
        return redirect()->back()->with('sucesso', 'Turma atualizada');
    }
}