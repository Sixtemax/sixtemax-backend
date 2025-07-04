<div>
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="save" class="mb-4">
        <div class="mb-2">
            <input type="text" wire:model="nombre" class="form-control" placeholder="Nombre">
        </div>
        <div class="mb-2">
            <input type="text" wire:model="documento" class="form-control" placeholder="Documento">
        </div>
        <div class="mb-2">
            <select wire:model="tipo_documento" class="form-select">
                <option value="">Tipo de Documento</option>
                <option value="CC">CC</option>
                <option value="NIT">NIT</option>
            </select>
        </div>
        <button class="btn btn-primary">Guardar</button>
    </form>

    <h5>Lista de Terceros</h5>
    <ul class="list-group">
        @forelse($terceros as $tercero)
            <li class="list-group-item">{{ $tercero->nombre }} - {{ $tercero->documento }}</li>
        @empty
            <li class="list-group-item text-muted">Sin registros.</li>
        @endforelse
    </ul>
</div>
