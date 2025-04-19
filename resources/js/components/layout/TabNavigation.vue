<template>
    <div class="mt-6 border-b border-[#1a2333] flex space-x-1">
        <button v-for="tab in tabs" :key="tab.id" class="px-4 py-2.5 whitespace-nowrap transition-all text-sm" :class="{
            'border-b-2 border-blue-500 text-white font-medium': activeTab === tab.id,
            'text-slate-400 hover:text-slate-300': activeTab !== tab.id
        }" @click="$emit('tab-changed', tab.id)">
            {{ tab.icon }} {{ tab.label }}
        </button>
    </div>
</template>

<script>
export default {
    name: 'TabNavigation',
    props: {
        tabs: Array,
        activeTab: String
    },
    emits: ['tab-changed']
}
</script>
