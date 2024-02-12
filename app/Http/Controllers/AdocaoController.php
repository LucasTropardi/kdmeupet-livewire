<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adocao;
use App\Models\Cor;
use App\Models\Especie;
use App\Models\Mensagem;
use App\Models\Raca;
use App\Models\Tamanho;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdocaoController extends Controller
{
    public function criar()
    {
        $especies  = Especie::pluck('esNome', 'id');
        $racas     = Raca::pluck('racaNome', 'id');
        $cores     = Cor::pluck('cor', 'id');
        $tamanhos  = Tamanho::pluck('tamanho', 'id');

        $hoje = date('d/m/Y');

        return view('blade.logado.usuario.adocoes.cadastrar', [
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
            'especie_id'     => 'required|integer',
            'raca_id'        => 'required|integer',
            'cor_id'         => 'required|integer',
            'tamanho_id'     => 'required|integer',
            'adNome'         => 'required|string|max:191',
            'adIdade'        => 'required|string|max:191',
            'adDescricao'    => 'required|string|max:600',
            'adImagem'       => 'required|image|mimes:jpeg,png,jpg|max:4096',
            'adContato'      => 'required|string|max:200',
            'adDataCadastro' => 'required',
            'adEndereco'     => 'required|string|max:191',
        ]);

        $imagem = $request->file('adImagem');
        $nomeImagem = 'adocao_' . md5(uniqid(rand(), true)) . '.' . $imagem->getClientOriginalExtension();
        $caminho = $imagem->storeAs('public/uploads/adocoes', $nomeImagem);
        $nomeDaFoto = basename($caminho);

        // Use o método create para criar um novo registro
        $adocao = Adocao::create([
            'user_id'        => Auth::user()->id,
            'especie_id'     => $request->especie_id,
            'raca_id'        => $request->raca_id,
            'cor_id'         => $request->cor_id,
            'tamanho_id'     => $request->tamanho_id,
            'adNome'         => $request->adNome,
            'adIdade'        => $request->adIdade,
            'adDescricao'    => trim($request->adDescricao),
            'adImagem'       => $nomeDaFoto,
            'adContato'      => $request->adContato,
            'adDataCadastro' => $request->adDataCadastro,
            'adEndereco'     => $request->adEndereco,
            'adFinalizado'   => 0,
        ]);

        if ($adocao) {
            session()->flash('new_success', 'Animal cadastrado com sucesso!');
            return redirect(route('lista.adocoes'));
        }
    }

    public function editar(Adocao $adocao)
    {
        $especies       = Especie::pluck('esNome', 'id');
        $racas          = Raca::pluck('racaNome', 'id');
        $cores          = Cor::pluck('cor', 'id');
        $tamanhos       = Tamanho::pluck('tamanho', 'id');

        return view('blade.logado.usuario.adocoes.alterar', [
            'adocao'         => $adocao,
            'especies'       => $especies,
            'racas'          => $racas,
            'cores'          => $cores,
            'tamanhos'       => $tamanhos,
        ]);
    }

    public function alterar(Request $request, Adocao $adocao)
    {
        $request->validate([
            'especie_id'   => 'required|integer',
            'raca_id'      => 'required|integer',
            'cor_id'       => 'required|integer',
            'tamanho_id'   => 'required|integer',
            'adNome'       => 'required|string|max:191',
            'adIdade'      => 'required|string|max:191',
            'adEndereco'   => 'required|string|max:191',
            'adDescricao'  => 'required|string|max:600',
            'adContato'    => 'required|string|max:191',
        ]);

        $camposAtualizar = [
            'situacao_id' => $request->situacao_id,
            'especie_id'  => $request->especie_id,
            'raca_id'     => $request->raca_id,
            'cor_id'      => $request->cor_id,
            'tamanho_id'  => $request->tamanho_id,
            'adNome'      => $request->adNome,
            'adIdade'     => $request->adIdade,
            'adEndereco'  => $request->adEndereco,
            'adDescricao' => $request->adDescricao,
            'adContato'   => $request->adContato,
        ];

        if ($request->hasFile('adImagem')) {
            $request->validate([
                'adImagem' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imagem = $request->file('adImagem');
            $nomeImagem = 'adocao_' . md5(uniqid(rand(), true)) . '.' . $imagem->getClientOriginalExtension();
            $caminho = $imagem->storeAs('public/uploads/adocoes', $nomeImagem);
            $nomeDaFoto = basename($caminho);

            $camposAtualizar['adImagem'] = $nomeDaFoto;
        }

        if ($request->adDataCadastro != $adocao->adDataCadastro) {
            $request->validate([
                'adDataCadastro' => 'required',
            ]);

            $camposAtualizar['adDataCadastro'] = $request->adDataCadastro;
        }

        if ($adocao->update($camposAtualizar)) {
            session()->flash('update_success', 'Animal atualizado com sucesso!');
            return redirect(route('lista.adocoes'));
        }

    }
}
