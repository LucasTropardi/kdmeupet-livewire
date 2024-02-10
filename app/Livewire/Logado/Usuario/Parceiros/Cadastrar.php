<?php

namespace App\Livewire\Logado\Usuario\Parceiros;

use App\Models\Parceria;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;

use Livewire\WithFileUploads;

class Cadastrar extends Component
{
    use WithFileUploads;

    public $hoje;
    public $user_id;
    public $parAprovado;
    public $parFinalizado;
    public $parNome;
    public $parDataCadastro;
    public $parEmail;
    public $parTelefone;
    public $parEndereco;
    public $parImagem;
    public $parDescricao;
    public $parMensagem;

    #[Layout('layouts.app')]

    public function mount()
    {
        $this->hoje = date('d/m/Y');
        $this->user_id = Auth::user()->id;
        $this->parAprovado = 0;
        $this->parFinalizado = 0;
    }

    public function render()
    {
        return view('livewire.logado.usuario.parceiros.cadastrar');
    }

    public function cadastrar(): void
    {
        $validated = $this->validate([
            'parDataCadastro' => ['required'],
            'user_id' => ['required'],
            'parNome' => ['required', 'string', 'max:191'],
            'parEmail' => ['required', 'string', 'lowercase', 'email', 'max:191'],
            'parEndereco' => ['required', 'string', 'max:191'],
            'parTelefone' => ['required', 'string', 'max:15'],
            'parImagem' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:4096'],
            'parMensagem' => ['required', 'string', 'max:191'],
            'parDescricao' => ['required', 'string', 'max:600'],
            'parAprovado' => ['required'],
            'parFinalizado' => ['required'],
        ]);

        // Salvar a imagem
        $imagem = $this->parImagem->store('public/uploads/parceiros');
        $nomeImagem = pathinfo($imagem, PATHINFO_FILENAME);
        $extensao = $this->parImagem->extension();
        $novoNome = $nomeImagem . '_' . md5(uniqid()) . '.' . $extensao;
        Storage::move($imagem, 'public/uploads/parceiros/' . $novoNome);
        $validated['parImagem'] = $novoNome;

        if (Parceria::create($validated)) {
            session()->flash('new_success', 'Parceria cadastrada com sucesso!');
            $this->redirect(route('lista.parceiros'));
        }
    }
}
