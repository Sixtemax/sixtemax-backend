<div>
    @if (session()->has('message'))
        <div class="alert alert-success mt-2">{{ session('message') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Terceros</h4>
        <button wire:click="$toggle('showForm')" class="btn btn-{{ $showForm ? 'secondary' : 'success' }}">
            <i class="fas fa-{{ $showForm ? 'times' : 'plus' }}"></i>
            {{ $showForm ? 'Ocultar formulario' : 'Agregar Tercero' }}
        </button>
    </div>

    <!-- Buscador (solo visible cuando el formulario está oculto) -->
    @if (!$showForm)
        <div class="d-flex mb-3" style="max-width: 500px;">
            <input type="text" wire:model="search" class="form-control me-2" placeholder="Buscar tercero...">
        </div>
    @endif

    <!-- Formulario -->
    @if ($showForm)
        <form wire:submit.prevent="save" class="mb-4">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>Nombre</label>
                    <input type="text" wire:model="nombre" class="form-control">
                </div>

                <div class="col-md-6 mb-2">
                    <label>Documento</label>
                    <input type="text" wire:model="documento" class="form-control">
                </div>

                <div class="col-md-6 mb-2">
                    <label>Tipo Documento</label>
                    <select wire:model="tipo_documento" class="form-control">
                        <option value="CC">Cédula</option>
                        <option value="NIT">NIT</option>
                        <option value="CE">Cédula Ext.</option>
                    </select>
                </div>

                <div class="col-md-6 mb-2">
                    <label>Tipo</label>
                    <select wire:model="tipo" class="form-control">
                        <option value="cliente">Cliente</option>
                        <option value="proveedor">Proveedor</option>
                        <option value="ambos">Ambos</option>
                    </select>
                </div>

                <div class="col-md-6 mb-2">
                    <label>Email</label>
                    <input type="email" wire:model="email" class="form-control">
                </div>

                <div class="col-md-6 mb-2">
                    <label>Teléfono</label>
                    <input type="text" wire:model="telefono" class="form-control">
                </div>

                <div class="col-md-6 mb-2">
                    <label>Dirección</label>
                    <input type="text" wire:model="direccion" class="form-control">
                </div>

                <div class="col-md-6 mb-2">
                    <label>Ciudad</label>
                    <input type="text" wire:model="ciudad" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Guardar</button>
        </form>
    @endif

    <!-- Listado -->
    <h5>Lista de Terceros</h5>
    @if ($terceros->isEmpty())
        <p>No hay terceros registrados.</p>
    @else
        <ul class="list-group">
            @foreach ($terceros as $tercero)
                <li class="list-group-item">
                    <strong>{{ $tercero->nombre }}</strong> — {{ $tercero->documento }} ({{ $tercero->tipo }})
                </li>
            @endforeach
        </ul>

        <div class="mt-2">
            {{ $terceros->links() }}
        </div>
    @endif
</div>
