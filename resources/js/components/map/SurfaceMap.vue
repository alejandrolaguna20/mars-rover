<template>
    <div class="bg-[#0f131c] rounded-md shadow-md border border-[#1a2333]">
        <div class="p-4 border-b border-[#1a2333] flex items-center justify-between">
            <div>
                <h2 class="text-base font-medium text-white">Surface Map - Sector B7</h2>
                <p class="text-xs text-slate-400 mt-0.5">Terrain scan updated: 14:15 MTC</p>
            </div>
            <div class="flex space-x-2">
                <button
                    class="p-1.5 bg-[#1a2333] rounded text-slate-400 hover:text-white transition-all border border-[#2a3546]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
                <button
                    class="p-1.5 bg-[#1a2333] rounded text-slate-400 hover:text-white transition-all border border-[#2a3546]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="p-4 bg-[#0a0e17]">
            <div class="grid grid-cols-10 gap-1 w-max mx-auto">
                <div v-for="(cell, index) in grid" :key="index"
                    class="w-9 h-9 flex items-center justify-center text-sm transition-all border" :class="{
                        'bg-[#1a2333] border-[#242d3f]': cell.type === 'empty',
                        'bg-[#331a1a] border-[#3f2424]': cell.type === 'obstacle',
                        'bg-[#1a2833] border-[#256784] shadow-sm': cell.type === 'rover',
                        'bg-[#2a2033] border-[#362a40]': cell.type === 'landing',
                    }">
                    <div v-if="cell.type === 'rover'"
                        class="w-5 h-5 bg-blue-500/30 rounded-full flex items-center justify-center">
                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                    </div>
                    <div v-else-if="cell.type === 'obstacle'" class="w-3 h-3 bg-red-900/50 rounded-sm"></div>
                    <div v-else-if="cell.type === 'landing'" class="w-3 h-3 border-2 border-purple-500/70 rounded-full">
                    </div>
                    <span v-if="index % 10 === 0 && Math.floor(index / 10) % 2 === 0"
                        class="absolute -left-6 text-xs text-slate-500">{{ Math.floor(index / 10) }}</span>
                    <span v-if="index < 10 && index % 2 === 0" class="absolute -top-6 text-xs text-slate-500">{{ index
                        }}</span>
                </div>
            </div>
        </div>
        <div class="p-3 border-t border-[#1a2333] flex justify-center space-x-6 text-xs text-slate-400">
            <div class="flex items-center">
                <div class="w-3 h-3 bg-[#1a2833] border border-[#256784] mr-2"></div>
                <span>Rover Position</span>
            </div>
            <div class="flex items-center">
                <div class="w-3 h-3 bg-[#331a1a] border border-[#3f2424] mr-2"></div>
                <span>Obstacle</span>
            </div>
            <div class="flex items-center">
                <div class="w-3 h-3 bg-[#2a2033] border border-[#362a40] mr-2"></div>
                <span>Landing Site</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SurfaceMap',
    props: {
        grid: Array
    }
}
</script>
