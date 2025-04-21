<template>
    <div class="min-h-screen bg-[#0a0e17] flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="bg-[#0f131c] rounded-md shadow-lg border border-[#1a2333] overflow-hidden">

                <div class="p-6 border-b border-[#1a2333] text-center">
                    <div
                        class="w-16 h-16 bg-[#1a2333] rounded-full flex items-center justify-center mx-auto mb-4 border border-[#2a3546]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#3b82f6" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-white">Mission Control</h1>
                    <p class="text-sm text-slate-400 mt-1">Access rover command systems</p>
                </div>

                <div class="p-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-white mb-2">Agent ID</label>
                            <input v-model="name" type="text"
                                class="w-full p-3 rounded bg-[#1a2333] border border-[#2a3546] text-white focus:border-blue-500 focus:outline-none text-sm"
                                placeholder="Enter your agent identifier" />
                            <p v-if="errors.name" class="mt-1 text-xs text-red-400">{{ errors.name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-white mb-2">Access Code</label>
                            <input v-model="password" type="password"
                                class="w-full p-3 rounded bg-[#1a2333] border border-[#2a3546] text-white focus:border-blue-500 focus:outline-none text-sm"
                                placeholder="••••••••" />
                            <p v-if="errors.password" class="mt-1 text-xs text-red-400">{{ errors.password }}</p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button @click="handleLogin"
                            class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded transition-all text-sm flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                            Authenticate
                        </button>
                    </div>

                    <div class="mt-6 p-3 bg-[#1a2333]/50 border border-[#2a3546] rounded text-xs text-slate-400">
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4 mt-0.5 mr-2 text-blue-400 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            <span>New agents will be automatically registered in the system database upon first
                                authentication attempt.</span>
                        </div>
                    </div>
                </div>

                <div class="p-4 border-t border-[#1a2333] text-center text-xs text-slate-500">
                    <p>Mars Exploration Initiative • Sol 487</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { router } from '@inertiajs/vue3';

export default {
    name: 'LoginPage',
    data() {
        return {
            name: '',
            password: '',
            errors: {},
        }
    },
    methods: {
        handleLogin() {
            router.post('/login', {
                name: this.name,
                password: this.password,
            }, {
                onSuccess: () => router.visit('/'),
                onError: (errors) => {
                    this.errors = errors;
                },
                preserveState: true
            });
        }
    }
}
</script>

<style>
button,
input {
    transition: all 0.2s ease;
}

input:focus {
    box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
}
</style>
