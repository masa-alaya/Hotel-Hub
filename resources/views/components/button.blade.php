<button {{ $attributes->merge(['type' => 'submit', 'class' => 'hover:scale-110 transition-all inline-flex items-center px-4 py-2 bg-yellow-700/90 border border-transparent rounded-md font-semibold text-xs text-white border-yellow-700/90  uppercase tracking-widest hover:bg-white hover:text-yellow-700/90 active:bg-yellow-900 focus:outline-none focus:border-yellow-900 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
