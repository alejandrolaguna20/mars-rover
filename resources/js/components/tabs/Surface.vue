<template>
    <div class="bg-[#0f131c] rounded-md shadow-md border border-[#1a2333] flex-1 flex flex-col">
        <div class="p-4 border-b border-[#1a2333] flex items-center justify-between">
            <div>
                <h2 class="text-base font-medium text-white">Martian Topographic Map</h2>
                <p class="text-xs text-slate-400 mt-0.5">MOLA Data v5.3 | Resolution: 128px/degree</p>
            </div>
            <div class="flex space-x-2">
                <button
                    class="p-1.5 bg-[#1a2333] rounded text-slate-400 hover:text-white transition-all border border-[#2a3546]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
                <button
                    class="p-1.5 bg-[#1a2333] rounded text-slate-400 hover:text-white transition-all border border-[#2a3546]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="flex-1 flex bg-[#0a0e17] relative">
            <div class="w-80 border-r border-[#1a2333] p-4 space-y-6 overflow-y-auto">
                <div class="bg-[#1a2333] p-4 rounded border border-[#242d3f]">
                    <h3 class="text-sm font-semibold mb-3">Coordinates & Elevation</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-slate-400">MOLA Height</span>
                            <span class="font-mono">-1.23 km</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">Latitude</span>
                            <span class="font-mono">14.572°S</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">Longitude</span>
                            <span class="font-mono">175.472°E</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">Quadrangle</span>
                            <span class="font-mono">MC-13</span>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1a2333] p-4 rounded border border-[#242d3f]">
                    <h3 class="text-sm font-semibold mb-3">Terrain Analysis</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-slate-400">Slope Angle</span>
                            <span class="font-mono">2.4°</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">Surface Roughness</span>
                            <span class="font-mono">4.8 cm</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">Albedo</span>
                            <span class="font-mono">0.17</span>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1a2333] p-4 rounded border border-[#242d3f]">
                    <h3 class="text-sm font-semibold mb-3">Mission Landmarks</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
                            <span>Perseverance Rover</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></div>
                            <span>Viking 1 Landing Site</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                            <span>Curiosity Traverse</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-1 p-4">
                <img class="rounded-lg"
                    src="https://www.spxdaily.com/images-hg/topography-jezero-crater-landing-site-nasa-mars-2020-perseverance-hg.jpg" />
            </div>

            <div class="w-80 border-l border-[#1a2333] p-4 space-y-6 overflow-y-auto">
                <div class="bg-[#1a2333] p-4 rounded border border-[#242d3f]">
                    <h3 class="text-sm font-semibold mb-3">Selected Feature</h3>
                    <div v-if="selectedFeature" class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-slate-400">Type</span>
                            <span class="font-mono">{{ selectedFeature.type }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">Diameter</span>
                            <span class="font-mono">{{ selectedFeature.diameter }} km</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">Depth</span>
                            <span class="font-mono">{{ selectedFeature.depth }} m</span>
                        </div>
                    </div>
                    <p v-else class="text-slate-400 text-sm">Click on map feature for details</p>
                </div>

                <div class="bg-[#1a2333] p-4 rounded border border-[#242d3f]">
                    <h3 class="text-sm font-semibold mb-3">Regional Geology</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-slate-400">Stratigraphy</span>
                            <span class="font-mono">Noachian Basalt</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">Erosion Rate</span>
                            <span class="font-mono">0.04 mm/yr</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">Crater Density</span>
                            <span class="font-mono">12/km²</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-3 border-t border-[#1a2333] flex justify-between text-xs text-slate-400">
            <div class="flex space-x-6">
                <div>
                    <span class="text-slate-400">Local Time:</span>
                    <span class="font-mono ml-1">14:32 MTC</span>
                </div>
                <div>
                    <span class="text-slate-400">Season:</span>
                    <span class="font-mono ml-1">LS 154° (Northern Autumn)</span>
                </div>
            </div>
            <div class="flex space-x-6">
                <div>
                    <span class="text-slate-400">Resolution:</span>
                    <span class="font-mono ml-1">1.8 m/px</span>
                </div>
                <div>
                    <span class="text-slate-400">Dust Index:</span>
                    <span class="font-mono ml-1">0.82 tau</span>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "Surface"
}
</script>
