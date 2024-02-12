<?php

namespace App\Livewire\Logado\Usuario\Parceiros;

use App\Models\Parceria;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Alterar extends Component
{
    use WithFileUploads;

    public $parceria;
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

    public function mount($id)
    {
        $this->parceria = Parceria::findOrFail($id);
        $this->user_id = Auth::user()->id;
        $this->parAprovado = $this->parceria->parAprovado;
        $this->parFinalizado = 0;
        $this->parNome = $this->parceria->parNome;
        $this->parDataCadastro = $this->parceria->parDataCadastro;
        $this->parEmail = $this->parceria->parEmail;
        $this->parTelefone = $this->parceria->parTelefone;
        $this->parEndereco = $this->parceria->parEndereco;
        $this->parImagem = $this->parceria->parImagem;
        $this->parDescricao = $this->parceria->parDescricao;
        $this->parMensagem = $this->parceria->parMensagem;
    }

    public function render()
    {
        return view('livewire.logado.usuario.parceiros.alterar');
    }

    public function alterar()
    {
        $validated = $this->validate([
            'parNome' => ['required', 'string', 'max:191'],
            'parDataCadastro' => ['required'],
            'parEmail' => ['required', 'string', 'lowercase', 'email', 'max:191'],
            'parEndereco' => ['required', 'string', 'max:191'],
            'parTelefone' => ['required', 'string', 'max:15'],
            'parDescricao' => ['required', 'string', 'max:600'],
            'parMensagem' => ['required', 'string', 'max:191'],
        ]);

        if ($this->parImagem instanceof \Illuminate\Http\UploadedFile) {
            $validated['parImagem'] = $this->parImagem->store('public/uploads/parceiros');

            $nomeImagem = pathinfo($validated['parImagem'], PATHINFO_FILENAME);
            $extensao = $this->parImagem->extension();
            $novoNome = $nomeImagem . '_' . md5(uniqid()) . '.' . $extensao;
            Storage::move($validated['parImagem'], 'public/uploads/parceiros/' . $novoNome);
            $validated['parImagem'] = $novoNome;
        }

        $this->parceria->update($validated);

        session()->flash('update_success', 'Parceria atualizada com sucesso!');
        return redirect(route('lista.parceiros'));
    }

}
