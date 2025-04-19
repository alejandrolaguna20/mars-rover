<template>
    <div class="bg-[#0f131c] rounded-md shadow-md border border-[#1a2333]">
        <div class="p-4 border-b border-[#1a2333] flex items-center justify-between">
            <div>
                <h2 class="text-base font-medium text-white">Rover Status</h2>
                <p class="text-xs text-slate-400 mt-0.5">MSL-20 • Perseverance</p>
            </div>
            <div class="flex space-x-2">
                <span class="px-2 py-0.5 bg-[#1a331a] text-green-400 rounded text-xs font-medium">Online</span>
                <span class="px-2 py-0.5 bg-[#1a2333] text-blue-400 rounded text-xs font-medium">Active</span>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-3 p-4">
            <div class="bg-[#1a2333] p-3 rounded">
                <p class="text-slate-400 text-xs">X Position</p>
                <p class="text-lg font-medium text-white mt-1">{{ position.x }}</p>
            </div>
            <div class="bg-[#1a2333] p-3 rounded">
                <p class="text-slate-400 text-xs">Y Position</p>
                <p class="text-lg font-medium text-white mt-1">{{ position.y }}</p>
            </div>
            <div class="bg-[#1a2333] p-3 rounded">
                <p class="text-slate-400 text-xs">Direction</p>
                <p class="text-lg font-medium text-white mt-1">{{ direction }}</p>
            </div>
        </div>
        <div class="p-4 pt-0">
            <div class="bg-[#162033] p-3 rounded border border-[#1a2a42]">
                <p class="text-slate-300 text-xs font-medium">Current Mission</p>
                <p class="font-medium text-white mt-1">Exploring sector {{ currentSector }}</p>
                <div class="w-full bg-[#0f131c] rounded-full h-1.5 mt-3">
                    <div class="bg-blue-500 h-1.5 rounded-full" :style="`width: ${progress}%`"></div>
                </div>
                <div class="flex justify-between text-xs text-slate-400 mt-2">
                    <p>{{ progress }}% complete</p>
                    <p>ETA: 2h 14m</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'RoverStatus',
    props: {
        position: Object,
        direction: String,
        currentSector: String,
        progress: Number
    }
}
</script>
