<template>
    <div class="bg-[#0f131c] rounded-md shadow-md border border-[#1a2333]">
        <div class="p-4 border-b border-[#1a2333] flex items-center justify-between">
            <div>
                <h2 class="text-base font-medium text-white">Science & Planetary Data</h2>
                <p class="text-xs text-slate-400 mt-0.5">Last updated: 14:45 MTC (Mars Terrestrial Clock)
                </p>
            </div>
            <div class="flex space-x-2">
                <button
                    class="p-1.5 bg-[#1a2333] rounded text-slate-400 hover:text-white transition-all border border-[#2a3546]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="p-4 bg-[#0a0e17]">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="space-y-6">
                    <div class="bg-[#1a2333] p-4 rounded border border-[#242d3f]">
                        <h3 class="text-sm font-semibold mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-purple-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707" />
                            </svg>
                            Atmospheric Conditions
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-slate-400">Pressure</span>
                                <span class="font-mono">0.636 kPa</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-400">Temperature</span>
                                <span class="font-mono">-63°C (-81°F)</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-400">Season</span>
                                <span class="font-mono">Northern Autumn</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#1a2333] p-4 rounded border border-[#242d3f]">
                        <h3 class="text-sm font-semibold mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                            </svg>
                            Water Detection
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-slate-400">Surface H2O</span>
                                <span class="font-mono">0.03% (permafrost)</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-400">Atmospheric H2O</span>
                                <span class="font-mono">210 precipitable µm</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-[#1a2333] p-4 rounded border border-[#242d3f]">
                        <h3 class="text-sm font-semibold mb-4 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-green-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Recent Discoveries
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div class="p-3 bg-[#0a0e17] rounded border border-[#1a2333]">
                                <div class="text-xs text-slate-400 mb-1">Sol 890</div>
                                <div class="font-medium">Organic molecules</div>
                                <p class="text-slate-400 mt-1">Detected in Jezero Crater sediments</p>
                            </div>
                            <div class="p-3 bg-[#0a0e17] rounded border border-[#1a2333]">
                                <div class="text-xs text-slate-400 mb-1">Sol 884</div>
                                <div class="font-medium">Carbonate nodules</div>
                                <p class="text-slate-400 mt-1">Spherical formations in bedrock</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#1a2333] p-4 rounded border border-[#242d3f]">
                        <h3 class="text-sm font-semibold mb-4 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-yellow-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Spectral Analysis
                        </h3>
                        <div
                            class="h-32 bg-[#0a0e17] rounded border border-[#1a2333] flex items-center justify-center text-slate-400 text-sm">
                            [Spectrometer Visualization Placeholder]
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-3 border-t border-[#1a2333] flex justify-center space-x-6 text-xs text-slate-400">
            <div class="flex items-center">
                <div class="w-3 h-3 bg-purple-400/20 border border-purple-400/30 mr-2"></div>
                <span>Atmospheric Data</span>
            </div>
            <div class="flex items-center">
                <div class="w-3 h-3 bg-blue-400/20 border border-blue-400/30 mr-2"></div>
                <span>Hydrology</span>
            </div>
            <div class="flex items-center">
                <div class="w-3 h-3 bg-green-400/20 border border-green-400/30 mr-2"></div>
                <span>Organic Detection</span>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: 'ScienceData',
}
</script>
