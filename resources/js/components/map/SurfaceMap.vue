<template>
    <div class="bg-[#0f131c] rounded-md shadow-md border border-[#1a2333]">
        <div class="p-4 border-b border-[#1a2333] flex items-center justify-between">
            <div>
                <h2 class="text-base font-medium text-white">Surface Map - Sector B7</h2>
                <p class="text-xs text-slate-400 mt-0.5">Terrain scan updated: 14:15 MTC</p>
            </div>
            <div class="flex space-x-2">
                <div
                    class="relative w-20 h-20 bg-[#1a1f33] border-2 border-[#242d3f] rounded-full flex items-center justify-center">
                    <!-- Cardinal Directions -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span id="dir-north"
                            class="absolute top-2 pl-[1px] font-semibold text-slate-400 text-xs font-medium">N</span>
                        <span id="dir-south" class="absolute bottom-2 font-semibold text-xs text-slate-400">S</span>
                        <span id="dir-west" class="absolute left-2 font-semibold text-xs text-slate-400">W</span>
                        <span id="dir-east" class="absolute right-2 font-semibold text-xs text-slate-400">E</span>
                    </div>

                    <!-- Secondary Directions -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span id="dir-northeast" class="absolute text-[0.6rem] text-slate-400/80"
                            style="transform: rotate(45deg) translateY(-28px) rotate(-45deg)">NE</span>
                        <span id="dir-southeast" class="absolute text-[0.6rem] text-slate-400/80"
                            style="transform: rotate(135deg) translateY(-28px) rotate(-135deg)">SE</span>
                        <span id="dir-southwest" class="absolute text-[0.6rem] text-slate-400/80"
                            style="transform: rotate(225deg) translateY(-28px) rotate(-225deg)">SW</span>
                        <span id="dir-northwest" class="absolute text-[0.6rem] text-slate-400/80"
                            style="transform: rotate(315deg) translateY(-28px) rotate(-315deg)">NW</span>
                    </div>

                    <!-- Center Elements -->
                    <div class="w-14 h-14 bg-[#1a2333] rounded-full flex items-center justify-center">
                        <div class="w-8 h-8 bg-blue-500/20 rounded-full relative">
                            <div class="absolute inset-0 rounded-full bg-blue-500/10 animate-pulse"></div>

                            <!-- Center Dot -->
                            <div
                                class="absolute top-1/2 left-1/2 w-1.5 h-1.5 -mt-0.75 -ml-0.75 bg-blue-400 rounded-full">
                            </div>
                        </div>
                    </div>

                    <!-- Degree Markers -->
                    <div v-for="angle in [0, 45, 90, 135, 180, 225, 270, 315]" :key="`marker-${angle}`"
                        class="absolute w-px h-2" :class="angle % 90 === 0 ? 'bg-blue-400/30' : 'bg-slate-400/20'"
                        :style="{ transform: `rotate(${angle}deg) translateY(-30px)` }"></div>
                </div>
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

<style>
/* Direction-specific styling using IDs */
#dir-north {
    transform: translateY(-50%);
}

#dir-south {
    transform: translateY(50%);
}

#dir-west {
    transform: translateX(-50%);
}

#dir-east {
    transform: translateX(50%);
}

#dir-northeast,
#dir-southeast,
#dir-southwest,
#dir-northwest {
    font-size: 0.6rem;
}
</style>
