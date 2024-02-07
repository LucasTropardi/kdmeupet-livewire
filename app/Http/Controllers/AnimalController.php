<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Cor;
use App\Models\Especie;
use App\Models\Mensagem;
use App\Models\Raca;
use App\Models\Situacao;
use App\Models\Tamanho;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AnimalController extends Controller
{
    public function criar()
    {
        $situacoes = Situacao::pluck('situacao', 'id');
        $especies  = Especie::pluck('esNome', 'id');
        $racas     = Raca::pluck('racaNome', 'id');
        $cores     = Cor::pluck('cor', 'id');
        $tamanhos  = Tamanho::pluck('tamanho', 'id');

        $hoje = date('d/m/Y');

        return view('blade.logado.usuario.animais.cadastrar', [
            'situacoes' => $situacoes,
            'especies'  => $especies,
            'racas'     => $racas,
            'cores'     => $cores,
            'tamanhos'  => $tamanhos,
            'hoje'      => $hoje,
        ]);
    }

    public function cadastrar(Request $request)
    {
        $request->validate([
            'situacao_id'  => 'required|integer',
            'especie_id'   => 'required|integer',
            'raca_id'      => 'required|integer',
            'cor_id'       => 'required|integer',
            'tamanho_id'   => 'required|integer',
            'anNome'       => 'required|string|max:191',
            'anDescricao'  => 'required|string|max:191',
            'anFoto'       => 'required|image|mimes:jpeg,png,jpg|max:4096',
            'anContato'    => 'required|string|max:200',
            'anData'       => 'required',
            'anEndereco'   => 'nullable|string|max:255',
            'latitude'     => 'required|string|max:255',
            'longitude'    => 'required|string|max:255',
        ]);

        $imagem = $request->file('anFoto');
        $nomeImagem = 'animal_' . md5(uniqid(rand(), true)) . '.' . $imagem->getClientOriginalExtension();
        $caminho = $imagem->storeAs('public/uploads/animais', $nomeImagem);
        $nomeDaFoto = basename($caminho);

        $dataBruta = $request->anData;
        $dataBanco = Carbon::createFromFormat('d/m/Y', $dataBruta)->format('Y-m-d');

        // Use o método create para criar um novo registro
        $animal = Animal::create([
            'user_id'      => Auth::user()->id,
            'situacao_id'  => $request->situacao_id,
            'especie_id'   => $request->especie_id,
            'raca_id'      => $request->raca_id,
            'cor_id'       => $request->cor_id,
            'tamanho_id'   => $request->tamanho_id,
            'anNome'       => $request->anNome,
            'anDescricao'  => $request->anDescricao,
            'anFoto'       => $nomeDaFoto,
            'anContato'    => $request->anContato,
            'anData'       => $dataBanco,
            'anEndereco'   => $request->anEndereco,
            'latitude'     => $request->latitude,
            'longitude'    => $request->longitude,
            'anFinalizado' => 0,
        ]);

        if ($animal) {
            session()->flash('new_success', 'Animal cadastrado com sucesso!');
            return redirect(route('lista.animais'));
        }
    }

    public function ver(Animal $animal)
    {
        // $mensagens = Mensagem::where('animal_id', $animal->id)->orderBy('dataMensagem', 'desc')->paginate(5);
        // $countMsg = Mensagem::where('animal_id', $animal->id)->count();
        $dataCadastrada = Carbon::parse($animal->anData)->format('d/m/Y');
        return view('logado.usuario.animais.show', [
            'animal'         => $animal,
            'dataCadastrada' => $dataCadastrada,
            // 'mensagens'      => $mensagens,
            // 'countMsg'       => $countMsg,
        ]);
    }

    public function editar(Animal $animal)
    {
        $situacoes      = Situacao::pluck('situacao', 'id');
        $especies       = Especie::pluck('esNome', 'id');
        $racas          = Raca::pluck('racaNome', 'id');
        $cores          = Cor::pluck('cor', 'id');
        $tamanhos       = Tamanho::pluck('tamanho', 'id');
        $dataCadastrada = Carbon::parse($animal->anData)->format('d/m/Y');
        $hoje           = Carbon::today();

        return view('blade.logado.usuario.animais.alterar', [
            'animal'         => $animal,
            'situacoes'      => $situacoes,
            'especies'       => $especies,
            'racas'          => $racas,
            'cores'          => $cores,
            'tamanhos'       => $tamanhos,
            'dataCadastrada' => $dataCadastrada,
            'hoje'           => $hoje,
        ]);
    }

    public function alterar(Request $request, Animal $animal)
    {
        $request->validate([
            'user_id'      => 'required|integer',
            'situacao_id'  => 'required|integer',
            'especie_id'   => 'required|integer',
            'raca_id'      => 'required|integer',
            'cor_id'       => 'required|integer',
            'tamanho_id'   => 'required|integer',
            'anNome'       => 'required|string|max:255',
            'anDescricao'  => 'required|string|max:400',
            'anContato'    => 'required|string|max:200',
        ]);

        $camposAtualizar = [
            'situacao_id' => $request->situacao_id,
            'especie_id'  => $request->especie_id,
            'raca_id'     => $request->raca_id,
            'cor_id'      => $request->cor_id,
            'tamanho_id'  => $request->tamanho_id,
            'anNome'      => $request->anNome,
            'anDescricao' => $request->anDescricao,
            'anContato'   => $request->anContato,
        ];

        if ($request->hasFile('anFoto')) {
            $request->validate([
                'anFoto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imagem = $request->file('anFoto');
            $nomeImagem = 'animal_' . md5(uniqid(rand(), true)) . '.' . $imagem->getClientOriginalExtension();
            $caminho = $imagem->storeAs('public/uploads/animais', $nomeImagem);
            $nomeDaFoto = basename($caminho);

            $camposAtualizar['anFoto'] = $nomeDaFoto;
        }

        if ($request->anData != $animal->anData) {
            $request->validate([
                'anData' => 'required',
            ]);

            $dataBruta = $request->anData;
            $dataBanco = Carbon::createFromFormat('d/m/Y', $dataBruta)->format('Y-m-d');

            $camposAtualizar['anData'] = $dataBanco;
        }

        if ($request->latitude !== null && $request->longitude !== null) {
            $request->validate([
                'latitude'     => 'required|string|max:255',
                'longitude'    => 'required|string|max:255',
            ]);
            $camposAtualizar = [
                'latitude'  => $request->latitude,
                'longitude' => $request->longitude,
            ];
        }

        if ($animal->update($camposAtualizar)) {
            session()->flash('update_success', 'Animal atualizado com sucesso!');
            return redirect(route('lista.animais'));
        }

    }

    public function finalizar($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->update([
            'anFinalizado' => 1,
        ]);
        return redirect(Auth::user()->level === 'admin' ? route('animal-gerenciador.index') : route('animal.index'));
    }

    public function buscarRacas(Request $request)
    {
        $especieId = $request->input('especie_id');

        $racas = Raca::where('especie_id', $especieId)->get();

        return response()->json(['racas' => $racas]);
    }

    public function buscarTamanhos(Request $request)
    {
        $especieId = $request->input('especie_id');

        $tamanhos = Tamanho::where('especie_id', $especieId)->get();

        return response()->json(['tamanhos' => $tamanhos]);
    }
}
