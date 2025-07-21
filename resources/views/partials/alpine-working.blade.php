<div x-data="{ open: false }" class="p-6 bg-white rounded shadow max-w-md mx-auto mt-20 text-center">
  <button 
    @click="open = !open" 
    class="bg-blue-300 hover:bg-blue-400 text-white font-semibold py-2 px-4 rounded transition">
    Toggle Message
  </button>

  <p x-show="open" x-transition class="mt-4 text-gray-700">
    Alpine is working! 🎉
  </p>
</div>
