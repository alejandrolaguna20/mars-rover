<template>
    <div class="bg-[#0f131c] rounded-md shadow-md border border-[#1a2333]">
        <div class="p-4 border-b border-[#1a2333]">
            <h2 class="text-base font-medium text-white">Mission Log</h2>
            <p class="text-xs text-slate-400 mt-0.5">Recent events</p>
        </div>
        <div class="max-h-[290px] overflow-auto scrollbar-thin">
            <div v-for="(log, index) in missionLogs" :key="index" class="p-3 border-b border-[#1a2333]"
                :class="{ 'bg-[#1a2333]': index % 2 === 0 }">
                <div class="flex items-start">
                    <div class="text-xs text-slate-400 w-14 mt-0.5">{{ log.time }}</div>
                    <div class="flex-1">
                        <p class="font-medium text-sm text-white">{{ log.message }}</p>
                        <p class="text-xs text-slate-400 mt-1">{{ log.details }}</p>
                    </div>
                    <div class="w-2.5 h-2.5 rounded-full flex-shrink-0 mt-1" :class="{
                        'bg-yellow-500': log.message.includes('detected'),
                        'bg-green-500': log.message.includes('collected') || log.message.includes('executed'),
                        'bg-blue-500': log.message.includes('photo') || log.message.includes('charge')
                    }"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'MissionLog',
    props: {
        missionLogs: Array
    }
}
</script>
