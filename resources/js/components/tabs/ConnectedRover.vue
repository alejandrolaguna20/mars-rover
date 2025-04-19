<template>
    <div class="bg-[#0f131c] rounded-md shadow-md border border-[#1a2333]">
        <div class="p-4 border-b border-[#1a2333] flex items-center justify-between">
            <div>
                <h2 class="text-base font-medium text-white">Rover 1 - Perseverance (M2020)</h2>
                <p class="text-xs text-slate-400 mt-0.5">Last update: 14:32 MTC (Live telemetry)</p>
            </div>
            <div class="flex space-x-2">
                <button
                    class="p-1.5 bg-[#1a2333] rounded text-slate-400 hover:text-white transition-all border border-[#2a3546]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="p-4 bg-[#0a0e17]">
            <div class="flex flex-col items-center justify-center py-8 space-y-6">
                <div
                    class="relative w-20 h-20 bg-[#1a331a] border-2 border-[#243f24] rounded-full flex items-center justify-center">
                    <div class="w-14 h-14 bg-[#243f24] rounded-full flex items-center justify-center">
                        <div
                            class="w-8 h-8 bg-green-500/20 rounded-full animate-pulse flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <h3 class="text-lg font-semibold text-green-500 mb-2">ALL SYSTEMS NOMINAL</h3>
                    <p class="text-sm text-slate-400 max-w-md">
                        Operational in Jezero Crater - Collecting mineral samples from ancient river delta.
                        Next scheduled communication pass in 12 minutes.
                    </p>
                </div>

                <div class="w-full max-w-xl grid grid-cols-2 gap-4 text-sm">
                    <div class="bg-[#1a2333] p-3 rounded border border-[#242d3f]">
                        <p class="text-slate-400 mb-1">Current Coordinates</p>
                        <p class="font-mono text-sm">18.384°N 77.450°E</p>
                    </div>
                    <div class="bg-[#1a2333] p-3 rounded border border-[#242d3f]">
                        <p class="text-slate-400 mb-1">Mission Duration</p>
                        <p class="font-mono text-sm">Sol 892 (2y 154d)</p>
                    </div>
                    <div class="bg-[#1a2333] p-3 rounded border border-[#242d3f]">
                        <p class="text-slate-400 mb-1">Power Level</p>
                        <p class="font-mono text-sm">89% (420 Wh)</p>
                    </div>
                    <div class="bg-[#1a2333] p-3 rounded border border-[#242d3f]">
                        <p class="text-slate-400 mb-1">Temperature</p>
                        <p class="font-mono text-sm">-25°C | -13°F</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ConnectedRover',
}
</script>
