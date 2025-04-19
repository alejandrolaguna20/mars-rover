<template>
    <div class="bg-[#0f131c] rounded-md shadow-md border border-[#1a2333]">
        <div class="p-4 border-b border-[#1a2333]">
            <h2 class="text-base font-medium text-white">Command Center</h2>
            <p class="text-xs text-slate-400 mt-0.5">Send instructions to rover</p>
        </div>
        <div class="p-4">
            <label class="block text-sm text-white mb-2">Command Sequence</label>
            <div class="relative">
                <input :value="commandSequence" @input="$emit('update:commandSequence', $event.target.value)"
                    class="w-full p-3 rounded bg-[#1a2333] border border-[#2a3546] text-white focus:border-blue-500 focus:outline-none text-sm"
                    placeholder="e.g. FFRRFFFRL" maxlength="50" />
                <button @click="$emit('clear')"
                    class="absolute right-3 top-3 text-slate-400 hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <p class="text-xs text-slate-400 mt-2">Use F (forward), L (left), R (right)</p>
        </div>

        <div class="grid grid-cols-3 gap-3 px-4 mb-4">
            <button v-for="cmd in ['F', 'L', 'R']" :key="cmd" @click="$emit('add-command', cmd)"
                class="py-2.5 bg-[#1a2333] hover:bg-[#23304a] text-white font-medium rounded border border-[#2a3546] transition-all text-sm">
                {{ cmd === 'F' ? 'Forward' : cmd === 'L' ? 'Left' : 'Right' }}
            </button>
        </div>

        <div class="px-4 pb-4">
            <button @click="$emit('send')"
                class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded transition-all text-sm flex items-center justify-center"
                :disabled="!commandSequence" :class="{ 'opacity-50 cursor-not-allowed': !commandSequence }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                </svg>
                Send Commands
            </button>
        </div>

        <div v-if="error" class="mx-4 mb-4 p-3 bg-[#331a1a] border border-[#402020] rounded text-xs text-red-300">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 text-red-400 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
                {{ error }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CommandCenter',
    props: {
        commandSequence: String,
        error: String
    },
    emits: ['update:commandSequence', 'clear', 'add-command', 'send']
}
</script>
