@extends('layout')

@section('title', 'Dashboard')

@section('content')
<div x-data="tabManager()" class="d-flex" style="height: 100vh;">
    <!-- Menú lateral -->
    <aside class="bg-dark text-white p-3" style="width: 220px;">
        <h4>Menú</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link text-white" @click.prevent="openTab('Terceros', 'terceros.tercero-form')">Terceros</a>
            </li>
            <!-- Otros módulos -->
        </ul>
    </aside>

    <!-- Área de pestañas -->
    <main class="flex-grow-1 p-3 overflow-auto">
        <!-- Títulos de pestañas -->
        <ul class="nav nav-tabs mb-3">
            <template x-for="(tab, index) in tabs" :key="tab.id">
                <li class="nav-item position-relative">
                    <a href="#" class="nav-link" :class="{'active': active === index}" @click.prevent="active = index" x-text="tab.name"></a>
                    <button type="button" class="btn-close position-absolute top-0 end-0 me-1 mt-1" @click.prevent="closeTab(index)" style="font-size: 0.6rem;"></button>
                </li>
            </template>
        </ul>

        <!-- Contenido de pestañas -->
        <div>
            <template x-for="(tab, index) in tabs" :key="tab.id">
                <div x-show="active === index" x-cloak>
                    <div x-html="tab.content"></div>
                </div>
            </template>
        </div>
    </main>
</div>

<script>
function tabManager() {
    return {
        tabs: [],
        active: 0,
        openTab(name, component) {
            const id = Date.now();
            const url = `/livewire/${component.replace(/\./g, '/')}`; // Ruta de la vista blade
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    this.tabs.push({ id, name, component, content: html });
                    this.active = this.tabs.length - 1;
                });
        },
        closeTab(index) {
            this.tabs.splice(index, 1);
            if (this.active >= this.tabs.length) {
                this.active = this.tabs.length - 1;
            }
        }
    }
}
</script>
@endsection
