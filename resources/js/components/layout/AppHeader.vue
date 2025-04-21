<template>
    <header class="max-w-6xl mx-auto mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div
                    class="w-14 h-14 bg-[#1a2333] rounded-md flex items-center justify-center mr-4 border-l border-t border-[#2a3546] shadow-md">
                    <img src="https://brand.esa.int/files/2025/01/ESA_Patch_2025-1024x1024.png" alt="Mission logo"
                        class="w-8 h-8" />
                </div>
                <div>
                    <h1 class="text-2xl font-medium text-white">Mars Rover Mission Control</h1>
                    <p class="text-slate-400 text-xs mt-1 tracking-wider">ESA-20 • JEZERO CRATER • SOL 487 • MTC:
                        14:27:36</p>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right hidden md:block">
                    <p class="text-xs text-slate-400">MISSION SPECIALIST</p>
                    <p class="text-sm text-white">{{ name }} - [ESA-042]</p>
                </div>

                <div class="relative">
                    <button @click="toggleDropdown"
                        class="h-9 w-9 rounded-full bg-[#1a2333] border border-[#2a3546] flex items-center justify-center hover:bg-[#23304a] transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 text-slate-400">
                            <path
                                d="M11.7 2.805a.75.75 0 01.6 0A60.65 60.65 0 0122.83 8.72a.75.75 0 01-.231 1.337 49.949 49.949 0 00-9.902 3.912l-.003.002-.34.18a.75.75 0 01-.707 0A50.009 50.009 0 007.5 12.174v-.224c0-.131.067-.248.172-.311a54.614 54.614 0 014.653-2.52.75.75 0 00-.65-1.352 56.129 56.129 0 00-4.78 2.589 1.858 1.858 0 00-.859 1.228 49.803 49.803 0 00-4.634-1.527.75.75 0 01-.231-1.337A60.653 60.653 0 0111.7 2.805z" />
                            <path
                                d="M13.06 15.473a48.45 48.45 0 017.666-3.282c.134 1.414.22 2.843.255 4.285a.75.75 0 01-.46.71 47.878 47.878 0 00-8.105 4.342.75.75 0 01-.832 0 47.877 47.877 0 00-8.104-4.342.75.75 0 01-.461-.71c.035-1.442.121-2.87.255-4.286A48.4 48.4 0 016 13.18v1.27a1.5 1.5 0 00-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.661a6.729 6.729 0 00.551-1.608 1.5 1.5 0 00.14-2.67v-.645a48.549 48.549 0 013.44 1.668 2.25 2.25 0 002.12 0z" />
                            <path
                                d="M4.462 19.462c.42-.419.753-.89 1-1.394.453.213.902.434 1.347.661a6.743 6.743 0 01-1.286 1.794.75.75 0 11-1.06-1.06z" />
                        </svg>
                    </button>

                    <div v-show="dropdownOpen" @click.away="dropdownOpen = false"
                        class="absolute right-0 mt-2 w-48 bg-[#0f131c] rounded-md shadow-lg border border-[#1a2333] z-10">
                        <div class="py-1">
                            <button @click="logout"
                                class="block w-full text-left px-4 py-2 text-sm text-slate-300 hover:bg-[#1a2333] hover:text-white flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                </svg>
                                Logout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <tab-navigation :tabs="tabs" :activeTab="activeTab" @tab-changed="$emit('tab-changed', $event)" />
    </header>
</template>

<script>
import TabNavigation from './TabNavigation.vue';
import { router } from '@inertiajs/vue3';

export default {
    name: 'AppHeader',
    components: {
        TabNavigation
    },
    props: {
        tabs: Array,
        activeTab: String,
        name: String,
    },
    emits: ['tab-changed'],
    data() {
        return {
            dropdownOpen: false
        }
    },
    methods: {
        toggleDropdown() {
            this.dropdownOpen = !this.dropdownOpen;
        },
        logout(): void {
            router.post('/logout', {}, {
                onSuccess: () => router.visit('/login'),
                onError: () => alert('Logout failed'),
                preserveState: false
            })
            this.dropdownOpen = false
        }
    }
}
</script>
