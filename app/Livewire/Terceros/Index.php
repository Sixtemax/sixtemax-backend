<?php

namespace App\Livewire\Terceros;

use Livewire\Component;
use App\Models\Tercero;

class Index extends Component
{
    public $nombre, $documento, $tipo_documento;

    public function save()
    {
        $this->validate([
            'nombre' => 'required',
            'documento' => 'required|unique:terceros,documento',
        ]);

        Tercero::create([
            'nombre' => $this->nombre,
            'documento' => $this->documento,
            'tipo_documento' => $this->tipo_documento,
            'empresa_id' => 1, // temporal mientras se establece login/empresa
        ]);

        $this->reset(['nombre', 'documento', 'tipo_documento']);
        session()->flash('success', 'Tercero creado correctamente.');
    }

    public function render()
    {
        return view('livewire.terceros.index', [
            'terceros' => Tercero::all()
        ]);
    }
}
