<template>
    <div class="bg-[#0f131c] rounded-md shadow-md border border-[#1a2333]">
        <div class="p-4 border-b border-[#1a2333]">
            <h2 class="text-base font-medium text-white">System Status</h2>
        </div>
        <div class="p-4">
            <div class="flex justify-between items-center mb-2">
                <span class="text-xs text-slate-400">Battery</span>
                <span class="text-xs text-white">87%</span>
            </div>
            <div class="w-full bg-[#1a2333] rounded-full h-1.5 mb-4">
                <div class="bg-green-500 h-1.5 rounded-full" style="width: 87%"></div>
            </div>

            <div class="flex justify-between items-center mb-2">
                <span class="text-xs text-slate-400">Signal Strength</span>
                <span class="text-xs text-white">72%</span>
            </div>
            <div class="w-full bg-[#1a2333] rounded-full h-1.5 mb-4">
                <div class="bg-blue-500 h-1.5 rounded-full" style="width: 72%"></div>
            </div>

            <div class="flex justify-between items-center mb-2">
                <span class="text-xs text-slate-400">Temperature</span>
                <span class="text-xs text-white">-23°C</span>
            </div>
            <div class="w-full bg-[#1a2333] rounded-full h-1.5 mb-4">
                <div class="bg-yellow-500 h-1.5 rounded-full" style="width: 45%"></div>
            </div>

            <div class="bg-[#1a2333] rounded p-3 mt-2 border border-[#2a3546]">
                <div class="flex justify-between">
                    <span class="text-xs text-slate-400">Next Communication Window</span>
                    <span class="text-xs text-white">00:42:18</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SystemStatus'
}
</script>
