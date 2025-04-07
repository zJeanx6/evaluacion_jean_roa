<!-- filepath: c:\xampp\htdocs\evalua_jean_roa\resources\views\auth\conductor-code.blade.php -->
<x-guest-layout>
    <form method="POST" action="{{ route('conductor.code.verify') }}">
        @csrf

        <!-- Código -->
        <div>
            <x-input-label for="code" :value="__('Ingrese su código')" />
            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" required autofocus />
            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Verificar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>