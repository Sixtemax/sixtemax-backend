<div class="bg-dark text-white p-3" style="width: 250px; height: 100vh;">
    <h4>Menú</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="#" class="nav-link text-white" @click.prevent="$dispatch('open-tab', { title: 'Terceros', url: '/terceros/pestaña' })">Terceros</a>
        </li>
        <li class="nav-item"><a href="#" class="nav-link text-white disabled">Productos</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white disabled">Ventas</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white disabled">Facturas</a></li>
        <!-- Agrega aquí el resto de las opciones aunque estén inactivas -->
    </ul>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('tabsHandler', () => ({
            tabs: [],
            activeTab: 0,
            init() {
                window.addEventListener('open-tab', event => {
                    const { title, url } = event.detail;
                    this.addTab(title, url);
                });
            },
            selectTab(index) {
                this.activeTab = index;
            },
            addTab(title, url) {
                fetch(url)
                    .then(res => res.text())
                    .then(html => {
                        this.tabs.push({ title, content: html });
                        this.activeTab = this.tabs.length - 1;
                        setTimeout(() => {
                            Livewire.restart();
                            Livewire.rescan();
                        }, 0);
                    });
            }
        }));
    });
</script>
