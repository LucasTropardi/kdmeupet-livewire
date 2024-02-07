<?php

namespace App\Livewire\Logado\Usuario\Animais;

use App\Models\Animal;
use App\Models\Especie;
use App\Models\Raca;
use App\Models\Situacao;
use App\Models\Cor;
use App\Models\Tamanho;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\ImageFile;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Cadastrar extends Component
{
    use WithFileUploads;

    public $especies;
    public $cores;
    public $tamanhos = [];
    public $racas = [];
    public $situacoes;
    public int $especie_id = 1;
    public int $user_id;
    public int $raca_id;
    public int $tamanho_id;
    public int $cor_id;
    public int $situacao_id;
    public string $anNome = '';
    public string $anDescricao = '';
    public string $anData = '';
    public string $anContato = '';
    public $tempAnFoto;
    public $anFoto;
    public float $latitude;
    public float $longitude;

    #[Layout('layouts.app')]
    public function mount()
    {
        $this->anData = date('Y-m-d');
        $this->user_id = Auth::user()->id;
        $this->situacoes = Situacao::all();
        $this->especies = Especie::all();
        $this->cores = Cor::all();
        $this->racas = Raca::all();
        $this->tamanhos = Tamanho::all();

        // Defina a área inicial do mapa para cobrir uma região específica
        $areaInicial = [-21.41908221945518, -50.07632303277206]; // Centro da área desejada
        $this->latitude = $areaInicial[0];
        $this->longitude = $areaInicial[1];

        // Inicialize as opções de raça e tamanho com base na primeira espécie
        $primeiraEspecie = $this->especies->first();
    }

    public function locationSelected($location)
    {
        $this->latitude = $location['lat'];
        $this->longitude = $location['lng'];
    }

    public function render(): View
    {
        $script = "window.tempAnFoto = '$this->tempAnFoto';";

        return view('livewire.logado.usuario.animais.cadastrar', [
            'racas' => Raca::where('especie_id', $this->especie_id)->get(),
            'tamanhos' => Tamanho::where('especie_id', $this->especie_id)->get(),
        ])->with('script', $script);
    }

    public function cadastrar()
    {
        $validated = $this->validate([
            'especie_id' => 'required',
            'raca_id' => 'required',
            'tamanho_id' => 'required',
            'cor_id' => 'required',
            'situacao_id' => 'required',
            'anNome' => 'required|string|max:255',
            'anDescricao' => 'required|string',
            'anData' => 'required|date',
            'anContato' => 'required|string|max:255',
            'anFoto' => 'image|mimes:jpeg,png,jpg|max:4096',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        if ($this->anFoto) {
            $nomeArquivo = md5($this->anFoto->getClientOriginalName() . microtime()) . '.' . $this->anFoto->getClientOriginalExtension();
            $caminho = $this->anFoto->storeAs('public/uploads/animais', $nomeArquivo);
            $validated['anFoto'] = $caminho; // Salva o caminho no banco
        }

        $animal = Animal::create($validated);

        if ($animal) {
            session()->flash('success', 'Animal cadastrado com sucesso!');
            return redirect()->to(route('lista.animais'));
        }
    }
}
