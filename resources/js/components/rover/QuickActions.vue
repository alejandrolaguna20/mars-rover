<template>
    <div class="bg-[#0f131c] rounded-md shadow-md border border-[#1a2333]">
        <div class="p-4 border-b border-[#1a2333]">
            <h2 class="text-base font-medium text-white">Quick Actions</h2>
            <p class="text-xs text-slate-400 mt-0.5">Common rover operations</p>
        </div>
        <div class="p-4 grid grid-cols-2 gap-3">
            <button v-for="action in actions" :key="action.id"
                class="p-3 bg-[#1a2333] hover:bg-[#23304a] text-left rounded transition-all border border-[#2a3546]">
                <div class="flex items-center">
                    <div class="w-8 h-8 rounded bg-[#0a0e17] flex items-center justify-center mr-3">
                        <!-- For simplicity, using text emojis instead of SVG icons -->
                        <span class="text-blue-400">{{ action.icon }}</span>
                    </div>
                    <span class="text-sm text-white">{{ action.label }}</span>
                </div>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'QuickActions',
    props: {
        actions: Array
    }
}
</script>
