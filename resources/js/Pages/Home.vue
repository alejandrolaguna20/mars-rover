<template>
    <div class="min-h-screen bg-[#0a0e17] text-slate-200 p-4 md:p-8 font-sans">
        <app-header :name="name" :tabs="tabs" :activeTab="activeTab" @tab-changed="activeTab = $event" />

        <main class="max-w-6xl mx-auto">
            <div v-if="activeTab === 'dashboard'" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 space-y-6">
                    <surface-map :grid="grid" />

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <rover-status :position="position" :direction="direction" :currentSector="currentSector"
                            :progress="progress" />
                        <mission-log :missionLogs="missionLogs" />
                    </div>
                </div>

                <div class="space-y-6">
                    <command-center v-model:commandSequence="commandSequence" :error="error" @clear="clearCommands"
                        @add-command="addCommand" @send="sendCommands" />
                    <quick-actions :actions="quickActions" />
                    <system-status />
                </div>
            </div>

            <div v-else-if="activeTab === 'map'" class="space-y-6 h-full flex flex-col">
                <surface />
            </div>

            <div v-else-if="activeTab === 'science'" class="space-y-6">
                <science-data />
            </div>

            <div v-else-if="activeTab === 'perseverance-rover'" class="space-y-6">
                <connected-rover />
            </div>

            <div v-else-if="activeTab === 'opportunity-rover'" class="space-y-6">
                <disconnected-rover />
            </div>
            <div v-else-if="activeTab === 'weather'" class="space-y-6">
                <weather-data />
            </div>
        </main>
    </div>
</template>

<script>
import AppHeader from '../components/layout/AppHeader.vue';
import SurfaceMap from '../components/map/SurfaceMap.vue';
import RoverStatus from '../components/rover/RoverStatus.vue';
import MissionLog from '../components/rover/MissionLog.vue';
import CommandCenter from '../components/rover/CommandCenter.vue';
import QuickActions from '../components/rover/QuickActions.vue';
import SystemStatus from '../components/system/SystemStatus.vue';
import ConnectedRover from '../components/tabs/ConnectedRover.vue';
import DisconnectedRover from '../components/tabs/DisconnectedRover.vue';
import WeatherData from '../components/tabs/WeatherData.vue';
import Surface from '../components/tabs/Surface.vue';
import ScienceData from '../components/tabs/ScienceData.vue';

export default {
    name: 'Dashboard',
    components: {
        AppHeader,
        SurfaceMap,
        RoverStatus,
        MissionLog,
        CommandCenter,
        QuickActions,
        SystemStatus,
        ConnectedRover,
        DisconnectedRover,
        WeatherData,
        Surface,
        ScienceData,
    },
    props: {
        name: String,
    },
    data() {
        return {
            activeTab: 'dashboard',
            tabs: [
                { id: 'dashboard', label: 'Dashboard', icon: '📊' },
                { id: 'map', label: 'Surface Map', icon: '🗺️' },
                { id: 'science', label: 'Science Data', icon: '🔬' },
                { id: 'perseverance-rover', label: 'Perseverance Rover', icon: '🤖' },
                { id: 'opportunity-rover', label: 'Opportunity Rover', icon: '🤖' },
                { id: 'weather', label: 'Weather', icon: '🌡️' }
            ],
            commandSequence: '',
            error: null,
            position: { x: 4, y: 2 },
            direction: 'E',
            currentSector: 'B-7',
            progress: 65,
            missionLogs: [
                { time: '14:30', message: 'Obstacle detected', details: 'Coordinates: (12, 34). Adjusting path.' },
                { time: '14:28', message: 'Sample collected', details: 'Rock sample #42 from sector B-7' },
                { time: '14:25', message: 'Movement command executed', details: 'FFRLF completed successfully' },
                { time: '14:20', message: 'New photo captured', details: 'Panoramic view of crater' },
                { time: '14:15', message: 'Solar charge started', details: 'Battery at 85%' }
            ],
            quickActions: [
                { id: 'photo', label: 'Take Photo', icon: '📸' },
                { id: 'sample', label: 'Collect Sample', icon: '🧪' },
                { id: 'scan', label: 'Run Scan', icon: '🔍' },
                { id: 'home', label: 'Return Home', icon: '🏠' },
                { id: 'charge', label: 'Solar Charge', icon: '☀️' },
                { id: 'emergency', label: 'Emergency Stop', icon: '🛑' }
            ],
            grid: Array(100).fill().map((_, i) => {
                const x = i % 10
                const y = Math.floor(i / 10)
                let type = 'empty'
                // Place rover at (4,2)
                if (x === 4 && y === 2) type = 'rover'
                // Place landing at (0,0)
                else if (x === 0 && y === 0) type = 'landing'
                // Random obstacles (10% chance)
                else if (Math.random() < 0.1 && !(x === 4 && y === 2)) type = 'obstacle'
                return { type }
            })
        }
    },
    methods: {
        addCommand(cmd) {
            this.commandSequence += cmd
        },
        clearCommands() {
            this.commandSequence = ''
            this.error = null
        },
        sendCommands() {
            this.error = null;
            const commands = this.commandSequence.toUpperCase().split('');
            const directions = ['N', 'E', 'S', 'W'];
            let currentDirIndex = directions.indexOf(this.direction);
            let currentX = this.position.x;
            let currentY = this.position.y;
            let aborted = false;

            const newGrid = [...this.grid];

            for (const cmd of commands) {
                if (aborted) break;

                switch (cmd) {
                    case 'L':
                        currentDirIndex = (currentDirIndex - 1 + 4) % 4;
                        this.direction = directions[currentDirIndex];
                        this.logAction(`Turned left`, `Now facing ${this.direction}`);
                        break;

                    case 'R':
                        currentDirIndex = (currentDirIndex + 1) % 4;
                        this.direction = directions[currentDirIndex];
                        this.logAction(`Turned right`, `Now facing ${this.direction}`);
                        break;

                    case 'F':
                    case 'B':
                        const [dx, dy] = this.calculateMovement(currentDirIndex, cmd);
                        const newX = currentX + dx;
                        const newY = currentY + dy;

                        if (!this.isValidPosition(newX, newY)) {
                            this.error = `Boundary collision at (${newX}, ${newY})`;
                            this.logAction('Movement blocked', this.error);
                            aborted = true;
                            break;
                        }

                        const newIndex = newY * 10 + newX;
                        if (newGrid[newIndex].type === 'obstacle') {
                            this.error = `Obstacle detected at (${newX}, ${newY})`;
                            this.logAction('Obstacle detected', this.error);
                            aborted = true;
                            break;
                        }

                        const oldIndex = currentY * 10 + currentX;
                        newGrid[oldIndex].type = 'empty';
                        newGrid[newIndex].type = 'rover';

                        currentX = newX;
                        currentY = newY;
                        this.logAction(`Moved ${cmd === 'F' ? 'forward' : 'backward'}`,
                            `New position: (${newX}, ${newY})`);
                        break;

                    default:
                        this.error = `Invalid command: ${cmd}`;
                        this.logAction('Invalid command', this.error);
                        aborted = true;
                        break;
                }
            }

            if (!aborted) {
                this.grid = newGrid;
                this.position = { x: currentX, y: currentY };
                this.currentSector = this.calculateSector(currentX, currentY);
                this.commandSequence = '';
            }
        },

        calculateMovement(directionIndex, command) {
            // Returns [dx, dy] based on direction and command
            const movements = [
                { F: [0, -1], B: [0, 1] },  // North
                { F: [1, 0], B: [-1, 0] },  // East
                { F: [0, 1], B: [0, -1] },  // South
                { F: [-1, 0], B: [1, 0] }   // West
            ];
            return movements[directionIndex][command];
        },

        isValidPosition(x, y) {
            return x >= 0 && x < 10 && y >= 0 && y < 10;
        },

        calculateSector(x, y) {
            const sectorLetters = 'ABCDEFGHIJ';
            const sectorX = Math.floor(x / 2);
            const sectorY = Math.floor(y / 2);
            return `${sectorLetters[sectorX]}-${sectorY + 5}`;
        },

        logAction(message, details) {
            this.missionLogs.unshift({
                time: new Date().toLocaleTimeString(),
                message,
                details
            });
        }
        // NOTE: This would be a nice option for a "growing" amount of tabs, or an unknown amount of them
        // as this solution would be more... maintainable and readable. for the sake of simplicity, I decided not to go with it
        // but it is still a great solution in any case.
        //
        //  getComponentForTab(tabId) {
        //      const componentMap = {
        //          'dashboard': DashboardView,
        //          'map': MapView,
        //          'science': ScienceView,
        //          'rover1': Rover1View,
        //          'rover2': Rover2View,
        //          'weather': WeatherView
        //      };

        //      return componentMap[tabId] || DashboardView;
        //  }
    }
}
</script>


<style>
/* Custom scrollbar styles */
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.scrollbar-thin::-webkit-scrollbar {
    width: 4px;
}

.scrollbar-thin::-webkit-scrollbar-track {
    background: #374151;
    border-radius: 2px;
}

.scrollbar-thin::-webkit-scrollbar-thumb {
    background: #4B5563;
    border-radius: 2px;
}
</style>
