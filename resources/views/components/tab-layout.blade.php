<div
    x-data="{
        tabs: [],
        openTab(tab) {
            if (!this.tabs.find(t => t.component === tab.component)) {
                this.tabs.push(tab);
            }
        },
        closeTab(index) {
            this.tabs.splice(index, 1);
        }
    }"
    x-init="
        $watch('tabs.length', value => console.log('Tabs:', value));
        $el.addEventListener('open-tab', e => openTab(e.detail));
    "
>
    <template x-if="tabs.length > 0">
        <div>
            <ul class="flex border-b mb-4">
                <template x-for="(tab, index) in tabs" :key="index">
                    <li class="mr-2">
                        <button
                            @click="active = index"
                            x-bind:class="{
                                'bg-blue-500 text-white': active === index,
                                'bg-gray-200 text-black': active !== index
                            }"
                            class="px-4 py-2 rounded-t"
                            x-text="tab.title"
                        ></button>
                        <button @click="closeTab(index)" class="text-red-500 ml-1">x</button>
                    </li>
                </template>
            </ul>

            <div class="border p-4 rounded bg-white shadow">
                <template x-for="(tab, index) in tabs" :key="index">
                    <div x-show="active === index">
                        <livewire :is="tab.component" />
                    </div>
                </template>
            </div>
        </div>
    </template>

    <template x-if="tabs.length === 0">
        <div class="text-gray-500">Haz clic en un módulo del menú para comenzar.</div>
    </template>
</div>
