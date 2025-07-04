<?php

namespace App\Livewire\Terceros;

use App\Models\Tercero;
use Livewire\Component;
use Livewire\WithPagination;

class TerceroForm extends Component
{
    use WithPagination;

    public $nombre, $documento, $tipo_documento = 'CC', $tipo = 'cliente',
           $email, $telefono, $direccion, $ciudad;

    public $showForm = false;
    public $search = '';

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'nombre' => 'required',
        'documento' => 'required|unique:terceros,documento',
    ];

    // Escucha cambios en el campo search
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
        $this->resetInputs();
    }

    public function save()
    {
        $this->validate();

        Tercero::create([
            'nombre' => $this->nombre,
            'documento' => $this->documento,
            'tipo_documento' => $this->tipo_documento,
            'tipo' => $this->tipo,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'ciudad' => $this->ciudad,
            'empresa_id' => 1, // Para pruebas
        ]);

        session()->flash('message', 'Tercero creado correctamente.');

        $this->resetInputs();
        $this->showForm = false;
        $this->resetPage();
    }

    public function resetInputs()
    {
        $this->reset(['nombre', 'documento', 'tipo_documento', 'tipo', 'email', 'telefono', 'direccion', 'ciudad']);
    }

    public function render()
    {
        $terceros = Tercero::query()
            ->where('empresa_id', 1)
            ->when($this->search, function ($query) {
                $keywords = explode(' ', trim($this->search));
                foreach ($keywords as $word) {
                    $query->where('nombre', 'LIKE', '%' . $word . '%');
                }
            })
            ->latest()
            ->paginate(5);

        return view('livewire.terceros.tercero-form', compact('terceros'));
    }
}
