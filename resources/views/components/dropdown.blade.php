<div x-data="dropdown()" class="relative">
    <button @click="toggle" class="bg-blue-500 text-white px-4 py-2 rounded">
        Menú
    </button>

    <div 
        x-show="open" 
        @click.away="close" 
        class="absolute mt-2 w-48 bg-white shadow-lg rounded">
        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Opción 1</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Opción 2</a>
    </div>
</div>
