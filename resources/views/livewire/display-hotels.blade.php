<div class="mx-4 mt-2">
    <livewire:filter>

    {{-- table --}}
    <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Hôtel
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Classification
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Chambres
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Coordonnées
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Adresse
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Créer_à
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Modifié_à
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Opération
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($hotels as $hotel)
                    <tr wire:key="{{ $hotel->id }}"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                        {{-- name --}}
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="underline" target="_blank"
                                href="{{ route('hotel', ['slug' => $hotel->slug]) }}">
                                {{ $hotel->name }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 inline-block" fill="#000000"
                                    viewBox="0 0 256 256">
                                    <path
                                        d="M137.54,186.36a8,8,0,0,1,0,11.31l-9.94,10A56,56,0,0,1,48.38,128.4L72.5,104.28A56,56,0,0,1,149.31,102a8,8,0,1,1-10.64,12,40,40,0,0,0-54.85,1.63L59.7,139.72a40,40,0,0,0,56.58,56.58l9.94-9.94A8,8,0,0,1,137.54,186.36Zm70.08-138a56.08,56.08,0,0,0-79.22,0l-9.94,9.95a8,8,0,0,0,11.32,11.31l9.94-9.94a40,40,0,0,1,56.58,56.58L172.18,140.4A40,40,0,0,1,117.33,142,8,8,0,1,0,106.69,154a56,56,0,0,0,76.81-2.26l24.12-24.12A56.08,56.08,0,0,0,207.62,48.38Z">
                                    </path>
                                </svg>
                            </a>
                        </th>

                        {{-- description --}}
                        <td class="px-6 py-4">
                            <span class="field" data-all="{{ $hotel->description }}"
                                data-less="{{ Str::limit($hotel->description, 20) }}">{{ Str::limit($hotel->description, 20) }}</span>

                            <span onclick="showMore(event)"
                                class="more select-none cursor-pointer font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Plus
                            </span>
                            <span onclick="showLess(event)"
                                class="less hidden select-none cursor-pointer font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Moins
                            </span>
                        </td>

                        {{-- classification --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @for ($i = 1; $i <= $hotel->classification; $i++)
                                    <svg wire:key="{{ $i }}" class="w-4 h-4 text-yellow-300 ms-1"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                @endfor
                                @if ($hotel->classification != 5)
                                    @for ($i = 1; $i <= 5 - $hotel->classification; $i++)
                                        <svg wire:key="{{ $i }}"
                                            class="w-4 h-4 ms-1 text-gray-300 dark:text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                    @endfor
                                @endif
                            </div>

                        </td>

                        {{-- number of rooms --}}
                        <td class="px-6 py-4">
                            {{ $hotel->number_rooms }}
                        </td>

                        {{-- coordinates --}}
                        <td class="px-6 py-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 inline-block" fill="#000000"
                                    viewBox="0 0 256 256">
                                    <path
                                        d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48Zm-96,85.15L52.57,64H203.43ZM98.71,128,40,181.81V74.19Zm11.84,10.85,12,11.05a8,8,0,0,0,10.82,0l12-11.05,58,53.15H52.57ZM157.29,128,216,74.18V181.82Z">
                                    </path>
                                </svg>
                                <span class="font-medium">{{ json_decode($hotel->coordinates)->email }}</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 inline-block" fill="#000000"
                                    viewBox="0 0 256 256">
                                    <path
                                        d="M222.37,158.46l-47.11-21.11-.13-.06a16,16,0,0,0-15.17,1.4,8.12,8.12,0,0,0-.75.56L134.87,160c-15.42-7.49-31.34-23.29-38.83-38.51l20.78-24.71c.2-.25.39-.5.57-.77a16,16,0,0,0,1.32-15.06l0-.12L97.54,33.64a16,16,0,0,0-16.62-9.52A56.26,56.26,0,0,0,32,80c0,79.4,64.6,144,144,144a56.26,56.26,0,0,0,55.88-48.92A16,16,0,0,0,222.37,158.46ZM176,208A128.14,128.14,0,0,1,48,80,40.2,40.2,0,0,1,82.87,40a.61.61,0,0,0,0,.12l21,47L83.2,111.86a6.13,6.13,0,0,0-.57.77,16,16,0,0,0-1,15.7c9.06,18.53,27.73,37.06,46.46,46.11a16,16,0,0,0,15.75-1.14,8.44,8.44,0,0,0,.74-.56L168.89,152l47,21.05h0s.08,0,.11,0A40.21,40.21,0,0,1,176,208Z">
                                    </path>
                                </svg>
                                <span class="font-medium"> {{ json_decode($hotel->coordinates)->phone }}</span>
                            </div>
                        </td>

                        {{-- address --}}
                        <td class="px-6 py-4">
                            @php
                                $address = $hotel->address . ', ' . ucfirst($hotel->city) . ' ' . ucfirst($hotel->country);
                            @endphp
                            <span class="field" data-all="{{ $address }}"
                                data-less="{{ Str::limit($address, 15) }}">{{ Str::limit($address, 15) }}</span>
                            {{-- <span class="block">{{ ucfirst($hotel->city) . ' ' . ucfirst($hotel->country) }}</span> --}}

                            <span onclick="showMore(event)"
                                class="more select-none cursor-pointer font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Plus
                            </span>
                            <span onclick="showLess(event)"
                                class="less hidden select-none cursor-pointer font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Moins
                            </span>
                        </td>

                        {{-- created_at --}}
                        <td class="px-6 py-4">
                            {{ $hotel->created_at }}
                        </td>

                        {{-- updated at --}}
                        <td class="px-6 py-4">
                            {{ $hotel->updated_at == $hotel->created_at ? '' : $hotel->created_at }}
                        </td>

                        {{-- operations --}}
                        <td class="px-6 py-6 inline-flex gap-1">

                            {{-- show all services --}}
                            <button data-modal-target="services-modal-{{ $hotel->id }}"
                                data-modal-toggle="services-modal-{{ $hotel->id }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Services
                            </button>

                            {{-- services modal --}}
                            <div id="services-modal-{{ $hotel->id }}" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="services-modal-{{ $hotel->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5">
                                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Service
                                                proposé par ce hôtel</h3>
                                            <div class="flex justify-between mb-1 text-gray-500 dark:text-gray-400">
                                                {{-- my content --}}
                                                <div class="flex flex-wrap">
                                                    @foreach (json_decode($hotel->services) as $service)
                                                        <span wire:key='{{ Str::random(40) }}'
                                                            class="bg-indigo-100 text-indigo-800 text-xs font-medium m-0.5 px-2.5 py-1 rounded dark:bg-indigo-900 dark:text-indigo-300">
                                                            {{ $service }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="flex items-center mt-6 space-x-2 rtl:space-x-reverse">

                                                <button data-modal-hide="services-modal-{{ $hotel->id }}"
                                                    type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Fermer
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Edit button -->
                            <button data-modal-target="edit-hotel-modal-{{ $hotel->id }}"
                                data-modal-toggle="edit-hotel-modal-{{ $hotel->id }}"
                                class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"
                                type="button">
                                Modifier
                            </button>

                            <!-- Edit modal -->
                            <div id="edit-hotel-modal-{{ $hotel->id }}" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative py-4 px-96 w-full max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Create New Product
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="edit-hotel-modal-{{ $hotel->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <livewire:edit-hotel :hotel="$hotel">

                                    </div>
                                </div>
                            </div>

                            {{-- Delete button --}}
                            <button data-modal-target="delete-hotel-modal-{{ $hotel->id }}"
                                data-modal-toggle="delete-hotel-modal-{{ $hotel->id }}"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                type="button">
                                Supprimer
                            </button>

                            {{-- Delete modal --}}
                            <div id="delete-hotel-modal-{{ $hotel->id }}" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="delete-hotel-modal-{{ $hotel->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                Êtes-vous sûr de vouloir supprimer
                                                <span class="text-black font-medium">{{ $hotel->name }}</span>?
                                            </h3>
                                            <div class="flex gap-1 justify-center items-center">
                                                <form method="post"
                                                    action="{{ route('admin.hotel.delete', ['id' => $hotel->id]) }}">
                                                    @csrf @method('delete')
                                                    <button data-modal-hide="delete-hotel-modal-{{ $hotel->id }}"
                                                        type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                        Yes, I'm sure
                                                    </button>
                                                </form>
                                                <button data-modal-hide="delete-hotel-modal-{{ $hotel->id }}"
                                                    type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Non, annuler
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- pagination --}}
    <span class="block mt-2 mx-20">
        {{ $hotels->links() }}
    </span>

</div>

<script>
    function showMore(event) {
        const parentNode = event.target.parentNode;
        const descriptionEl = parentNode.querySelector('.field');
        const allDescription = descriptionEl.getAttribute('data-all');

        event.target.classList.add('hidden');
        descriptionEl.innerText = allDescription;

        parentNode.querySelector('.less').classList.remove('hidden')
    }

    function showLess(event) {
        const parentNode = event.target.parentNode;
        const descriptionEl = parentNode.querySelector('.field');
        const description = descriptionEl.getAttribute('data-less');

        event.target.classList.add('hidden');
        descriptionEl.innerText = description;

        parentNode.querySelector('.more').classList.remove('hidden')

    }
</script>
