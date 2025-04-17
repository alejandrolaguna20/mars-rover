<script setup>
import { ref } from 'vue';

const count = ref(0);
const name = ref('');
const darkMode = ref(false);

const increment = () => {
  count.value++;
};

const decrement = () => {
  count.value--;
};
</script>

<template>
  <div class="min-h-screen bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl p-6">
      <h1 class="text-3xl font-bold text-center text-indigo-600 mb-6">
        Welcome to my Inertia-powered Laravel + Vue app!
      </h1>

      <div class="mb-6">
        <p class="text-gray-700 mb-4">This is a reactive counter example to verify Vue is working:</p>

        <div class="flex items-center justify-center space-x-4 mb-4">
          <button
            @click="decrement"
            class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-200"
          >
            -
          </button>

          <span class="text-2xl font-bold">{{ count }}</span>

          <button
            @click="increment"
            class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-200"
          >
            +
          </button>
        </div>

        <div class="mb-6">
          <label class="block text-gray-700 mb-2">Enter your name:</label>
          <input
            v-model="name"
            type="text"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
            placeholder="Type your name here"
          />
        </div>

        <div v-if="name" class="mt-4 p-4 bg-indigo-50 rounded-lg">
          <p class="text-indigo-800">
            Hello, <span class="font-bold">{{ name }}</span>!
            You have clicked the buttons <span class="font-bold">{{ count }}</span> times.
          </p>
        </div>

        <div class="mt-6">
          <div class="flex items-center mb-2">
            <input
              v-model="darkMode"
              type="checkbox"
              id="darkMode"
              class="mr-2"
            />
            <label for="darkMode" class="text-gray-700">Toggle card color</label>
          </div>

          <div
            :class="[
              'mt-4 p-4 rounded-lg transition-colors duration-200',
              darkMode ? 'bg-gray-800 text-white' : 'bg-blue-100 text-blue-800'
            ]"
          >
            <p>This card changes color based on the toggle state!</p>
          </div>
        </div>
      </div>

      <div class="mt-8 text-center text-gray-500 text-sm">
        If you can see this styled interface and interact with it, both Vue and Tailwind are working correctly!
      </div>
    </div>
  </div>
</template>
