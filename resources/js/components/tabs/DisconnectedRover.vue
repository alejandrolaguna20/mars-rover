<template>
    <div class="bg-[#0f131c] rounded-md shadow-md border border-[#1a2333]">
        <div class="p-4 border-b border-[#1a2333] flex items-center justify-between">
            <div>
                <h2 class="text-base font-medium text-white">Rover 2 - Opportunity (MER-B)</h2>
                <p class="text-xs text-slate-400 mt-0.5">Last contact: Sol 5111 (June 10, 2018)</p>
            </div>
            <div class="flex space-x-2">
                <button class="p-1.5 bg-[#1a2333] rounded text-slate-400 border border-[#2a3546] cursor-not-allowed"
                    disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="p-4 bg-[#0a0e17]">
            <div class="flex flex-col items-center justify-center py-8 space-y-6">
                <div
                    class="relative w-20 h-20 bg-[#331a1a] border-2 border-[#3f2424] rounded-full flex items-center justify-center">
                    <div class="w-14 h-14 bg-[#3f2424] rounded-full flex items-center justify-center">
                        <div class="w-8 h-8 bg-red-500/20 rounded-full animate-pulse flex items-center justify-center">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <h3 class="text-lg font-semibold text-red-500 mb-2">COMMUNICATION LOST</h3>
                    <p class="text-sm text-slate-400 max-w-md">
                        Final transmission received at 14:15 MTC during Mars-wide dust storm.
                        Recovery efforts concluded on February 13, 2019 after 1,000+ recovery commands.
                    </p>
                </div>

                <div class="w-full max-w-xl grid grid-cols-2 gap-4 text-sm">
                    <div class="bg-[#1a2333] p-3 rounded border border-[#242d3f]">
                        <p class="text-slate-400 mb-1">Final Coordinates</p>
                        <p class="font-mono text-sm">14.572°S 175.472°E</p>
                    </div>
                    <div class="bg-[#1a2333] p-3 rounded border border-[#242d3f]">
                        <p class="text-slate-400 mb-1">Mission Duration</p>
                        <p class="font-mono text-sm">5,352 sols (14y 136d)</p>
                    </div>
                    <div class="bg-[#1a2333] p-3 rounded border border-[#242d3f]">
                        <p class="text-slate-400 mb-1">Odometry</p>
                        <p class="font-mono text-sm">45.16 km (28.06 mi)</p>
                    </div>
                    <div class="bg-[#1a2333] p-3 rounded border border-[#242d3f]">
                        <p class="text-slate-400 mb-1">Last Power Level</p>
                        <p class="font-mono text-sm">22 Wh</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: 'DisconnectedRover',
}
</script>
