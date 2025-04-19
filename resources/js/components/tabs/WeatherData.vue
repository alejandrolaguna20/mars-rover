<template>
    <div class="bg-[#0f131c] rounded-md shadow-md border border-[#1a2333]">
        <div class="p-4 border-b border-[#1a2333] flex items-center justify-between">
            <div>
                <h2 class="text-base font-medium text-white">Martian Weather Station</h2>
                <p class="text-xs text-slate-400 mt-0.5">Sol 895 (Mars Year 36) - Jezero Crater</p>
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
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="space-y-6">
                    <div class="bg-[#1a2333] p-4 rounded border border-[#242d3f]">
                        <h3 class="text-sm font-semibold mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-orange-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707" />
                            </svg>
                            Current Conditions
                        </h3>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="text-slate-400">Temperature</p>
                                <p class="font-mono text-xl mt-1">-63°C</p>
                                <p class="text-slate-400 text-xs">(High: -24°C / Low: -89°C)</p>
                            </div>
                            <div>
                                <p class="text-slate-400">Pressure</p>
                                <p class="font-mono text-xl mt-1">0.636 kPa</p>
                                <p class="text-slate-400 text-xs">(0.6% Earth sea level)</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#1a2333] p-4 rounded border border-[#242d3f]">
                        <h3 class="text-sm font-semibold mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                            </svg>
                            Atmospheric Composition
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-slate-400">CO₂</span>
                                <span class="font-mono">95.32%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-400">N₂</span>
                                <span class="font-mono">2.7%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-400">Ar</span>
                                <span class="font-mono">1.6%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-[#1a2333] p-4 rounded border border-[#242d3f]">
                        <h3 class="text-sm font-semibold mb-4 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-purple-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                            7-Sol Temperature Trend
                        </h3>
                        <div
                            class="h-32 bg-[#0a0e17] rounded border border-[#1a2333] flex items-center justify-center text-slate-400 text-sm">
                            [Temperature Graph Placeholder]
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-[#1a2333] p-4 rounded border border-[#242d3f]">
                            <h3 class="text-sm font-semibold mb-2">Wind Speed</h3>
                            <div class="flex items-end gap-2">
                                <p class="font-mono text-2xl">18</p>
                                <span class="text-slate-400 text-sm">m/s</span>
                            </div>
                            <p class="text-slate-400 text-xs mt-1">(64.8 km/h)</p>
                        </div>
                        <div class="bg-[#1a2333] p-4 rounded border border-[#242d3f]">
                            <h3 class="text-sm font-semibold mb-2">Dust Opacity</h3>
                            <div class="flex items-end gap-2">
                                <p class="font-mono text-2xl">0.82</p>
                                <span class="text-slate-400 text-sm">tau</span>
                            </div>
                            <p class="text-slate-400 text-xs mt-1">(Moderate haze)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-3 border-t border-[#1a2333] flex justify-center space-x-6 text-xs text-slate-400">
            <div class="flex items-center">
                <div class="w-3 h-3 bg-orange-400/20 border border-orange-400/30 mr-2"></div>
                <span>Temperature Data</span>
            </div>
            <div class="flex items-center">
                <div class="w-3 h-3 bg-blue-400/20 border border-blue-400/30 mr-2"></div>
                <span>Atmospheric Analysis</span>
            </div>
            <div class="flex items-center">
                <div class="w-3 h-3 bg-purple-400/20 border border-purple-400/30 mr-2"></div>
                <span>Long-term Trends</span>
            </div>
        </div>
    </div>

    <div class="bg-[#0f131c] rounded-md shadow-md border border-[#1a2333]">
        <div class="p-4 border-b border-[#1a2333]">
            <h3 class="text-sm font-semibold">Seasonal Forecast</h3>
        </div>
        <div class="p-4 bg-[#0a0e17]">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                <div class="p-3 bg-[#1a2333] rounded border border-[#242d3f]">
                    <p class="text-slate-400 mb-1">Dust Storm Probability</p>
                    <p class="font-mono">42%</p>
                </div>
                <div class="p-3 bg-[#1a2333] rounded border border-[#242d3f]">
                    <p class="text-slate-400 mb-1">Frost Formation</p>
                    <p class="font-mono">Likely</p>
                </div>
                <div class="p-3 bg-[#1a2333] rounded border border-[#242d3f]">
                    <p class="text-slate-400 mb-1">Solar Irradiance</p>
                    <p class="font-mono">492 W/m²</p>
                </div>
                <div class="p-3 bg-[#1a2333] rounded border border-[#242d3f]">
                    <p class="text-slate-400 mb-1">Season Duration</p>
                    <p class="font-mono">194 sols</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'WeatherData'
}
</script>
