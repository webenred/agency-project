<x-admin-layout>
    <div class="bg-slate-900 py-2 px-4 text-center">
        <h1 class="text-white text-2xl font-medium">Gestion d'hotels</h1>
    </div>

    <div class="mx-4 mt-5">
        @if (session('status'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">Succès</span> {{ session(('status')) }}
            </div>
        @endif

    </div>
    <div class="mt-5">
        <livewire:display-hotels :hotels="$hotels" />
    </div>

</x-admin-layout>
