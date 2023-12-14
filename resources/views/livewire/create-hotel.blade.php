<div>
    <form wire:submit="save">

        {{-- name --}}
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">nom de l'hôtel</label>
            <input type="text" id="name" wire:model='name'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="nom de l'hôtel" required>
            @error('name')
                <div class="text-red-800 error">{{ $message }}</div>
            @enderror
        </div>

        {{-- description --}}
        <div class="w-full mb-5 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
            <div class="flex items-center justify-between px-3 py-2 border-b dark:border-gray-600">
                <div
                    class="flex flex-wrap items-center divide-gray-200 sm:divide-x sm:rtl:divide-x-reverse dark:divide-gray-600">
                    <div class="flex items-center space-x-1 rtl:space-x-reverse sm:pe-4">
                        <button type="button"
                            class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 12 20">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M1 6v8a5 5 0 1 0 10 0V4.5a3.5 3.5 0 1 0-7 0V13a2 2 0 0 0 4 0V6" />
                            </svg>
                            <span class="sr-only">Attach file</span>
                        </button>
                        <button type="button"
                            class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 16 20">
                                <path
                                    d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                            </svg>
                            <span class="sr-only">Embed map</span>
                        </button>
                        <button type="button"
                            class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 16 20">
                                <path
                                    d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM10.5 6a1.5 1.5 0 1 1 0 2.999A1.5 1.5 0 0 1 10.5 6Zm2.221 10.515a1 1 0 0 1-.858.485h-8a1 1 0 0 1-.9-1.43L5.6 10.039a.978.978 0 0 1 .936-.57 1 1 0 0 1 .9.632l1.181 2.981.541-1a.945.945 0 0 1 .883-.522 1 1 0 0 1 .879.529l1.832 3.438a1 1 0 0 1-.031.988Z" />
                                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                            </svg>
                            <span class="sr-only">Upload image</span>
                        </button>
                        <button type="button"
                            class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 16 20">
                                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                                <path
                                    d="M14.067 0H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.933-2ZM6.709 13.809a1 1 0 1 1-1.418 1.409l-2-2.013a1 1 0 0 1 0-1.412l2-2a1 1 0 0 1 1.414 1.414L5.412 12.5l1.297 1.309Zm6-.6-2 2.013a1 1 0 1 1-1.418-1.409l1.3-1.307-1.295-1.295a1 1 0 0 1 1.414-1.414l2 2a1 1 0 0 1-.001 1.408v.004Z" />
                            </svg>
                            <span class="sr-only">Format code</span>
                        </button>
                        <button type="button"
                            class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM13.5 6a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm-7 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm3.5 9.5A5.5 5.5 0 0 1 4.6 11h10.81A5.5 5.5 0 0 1 10 15.5Z" />
                            </svg>
                            <span class="sr-only">Add emoji</span>
                        </button>
                    </div>
                    <div class="flex flex-wrap items-center space-x-1 rtl:space-x-reverse sm:ps-4">
                        <button type="button"
                            class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 21 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9.5 3h9.563M9.5 9h9.563M9.5 15h9.563M1.5 13a2 2 0 1 1 3.321 1.5L1.5 17h5m-5-15 2-1v6m-2 0h4" />
                            </svg>
                            <span class="sr-only">Add list</span>
                        </button>
                        <button type="button"
                            class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M18 7.5h-.423l-.452-1.09.3-.3a1.5 1.5 0 0 0 0-2.121L16.01 2.575a1.5 1.5 0 0 0-2.121 0l-.3.3-1.089-.452V2A1.5 1.5 0 0 0 11 .5H9A1.5 1.5 0 0 0 7.5 2v.423l-1.09.452-.3-.3a1.5 1.5 0 0 0-2.121 0L2.576 3.99a1.5 1.5 0 0 0 0 2.121l.3.3L2.423 7.5H2A1.5 1.5 0 0 0 .5 9v2A1.5 1.5 0 0 0 2 12.5h.423l.452 1.09-.3.3a1.5 1.5 0 0 0 0 2.121l1.415 1.413a1.5 1.5 0 0 0 2.121 0l.3-.3 1.09.452V18A1.5 1.5 0 0 0 9 19.5h2a1.5 1.5 0 0 0 1.5-1.5v-.423l1.09-.452.3.3a1.5 1.5 0 0 0 2.121 0l1.415-1.414a1.5 1.5 0 0 0 0-2.121l-.3-.3.452-1.09H18a1.5 1.5 0 0 0 1.5-1.5V9A1.5 1.5 0 0 0 18 7.5Zm-8 6a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z" />
                            </svg>
                            <span class="sr-only">Settings</span>
                        </button>
                        <button type="button"
                            class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M18 2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2ZM2 18V7h6.7l.4-.409A4.309 4.309 0 0 1 15.753 7H18v11H2Z" />
                                <path
                                    d="M8.139 10.411 5.289 13.3A1 1 0 0 0 5 14v2a1 1 0 0 0 1 1h2a1 1 0 0 0 .7-.288l2.886-2.851-3.447-3.45ZM14 8a2.463 2.463 0 0 0-3.484 0l-.971.983 3.468 3.468.987-.971A2.463 2.463 0 0 0 14 8Z" />
                            </svg>
                            <span class="sr-only">Timeline</span>
                        </button>
                        <button type="button"
                            class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                                <path
                                    d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Download</span>
                        </button>
                    </div>
                </div>

            </div>
            <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                <label for="editor" class="sr-only">Publish post</label>
                <textarea id="editor" rows="8" wire:model='description'
                    class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                    placeholder="description..." required>la description de l'hotel</textarea>
            </div>
        </div>
        {{-- <div class="mb-5"> --}}
        {{-- <label for="description" class="block mb-2 text-sm font-medium text-gray-900">description de l'hôtel</label>
            <textarea id="description" rows="4" wire:model='description'
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="la description de l'hôtel, à propos de l'hôtel..."></textarea> --}}
        {{-- @error('description')
                <div class="text-red-800 error">{{ $message }}</div>
            @enderror --}}
        {{-- </div> --}}

        {{-- country --}}
        <div class="mb-5">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">pays de l'hôtel</label>
            <select id="countries" wire:model='country'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @foreach ($countries as $country)
                    <option value="{{ $country['name'] }}">
                        {{ $country['flag'] . ' ' . $country['name'] }}
                    </option>
                @endforeach
            </select>
            @error('country')
                <div class="text-red-800 error">{{ $message }}</div>
            @enderror
        </div>

        {{-- city --}}
        <div class="mb-5">
            <label for="city" class="block mb-2 text-sm font-medium text-gray-900">ville de l'hôtel</label>
            <input type="text" id="city" wire:model='city'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                required placeholder="Alger">
            @error('city')
                <div class="text-red-800 error">{{ $message }}</div>
            @enderror
        </div>

        {{-- address --}}
        <div class="mb-5">
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">adresse de l'hôtel</label>
            <input type="text" id="address" wire:model='address'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                required>
            @error('address')
                <div class="text-red-800 error">{{ $message }}</div>
            @enderror
        </div>


        {{--  coordonnes  --}}
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">coordonnées de l'hôtel</label>
            <div class="mb-2 flex items-center ">
                <div class="pe-2">
                    <label for="phone-input" class="block mb-2 text-sm font-medium text-gray-900">N° tél</label>
                </div>
                <div class="flex items-center">
                    <select name="phone_code"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">
                        @foreach ($countries as $country)
                            <option {{ $country['code'] === 'DZ' ? 'selected' : '' }}
                                value="{{ $country['dial_code'] }}">
                                {{ $country['flag'] . ' ' . $country['dial_code'] }}
                            </option>
                        @endforeach
                    </select>
                    <div class="relative w-full">
                        <input type="text" id="phone-input" wire:model='coordinates.phone'
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-0 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            required>
                        @error('coordinates')
                            <div class="text-red-800 error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-5 flex items-center">
                <label for="email" class="block text-sm font-medium text-gray-900 pe-2">email</label>
                <input type="email" id="email" wire:model='coordinates.email'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="john.doe@company.com" required>
                @error('email')
                    <div class="text-red-800 error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- number of rooms --}}
        <div class="mb-5">
            <label for="nb_rooms" class="block mb-2 text-sm font-medium text-gray-900">nombre de chambres</label>
            <input type="number" id="nb_rooms" wire:model='nb_rooms'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            @error('nb_rooms')
                <div class="text-red-800 error">{{ $message }}</div>
            @enderror
        </div>

        {{-- rating --}}
        <div class="mb-5">
            <label for="rating" class="block mb-2 text-sm font-medium text-gray-900">
                classification de l'hôtel
            </label>
            <input type="number" id="rating" wire:model='rating'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            @error('rating')
                <div class="text-red-800 error">{{ $message }}</div>
            @enderror
        </div>


        {{-- services --}}
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900">
                service offert par l'hôtel
            </label>
            @php
                $services = json_decode($services, true);
            @endphp
            <div class="flex flex-wrap mt-1 select-none" id="tagButtons">
                @foreach ($hotelServices as $tag)
                    @if ($services)
                        @if (in_array($tag, $services))
                            <span
                                class="selected bg-pink-100 text-xs font-medium m-0.5 px-2.5 py-1 rounded dark:bg-pink-900 text-pink-800 dark:bg-pink-900 dark:text-pink-300">
                                {{ $tag }}
                            </span>
                        @else
                            <span
                                class="bg-indigo-100 text-indigo-800 text-xs font-medium m-0.5 px-2.5 py-1 rounded dark:bg-indigo-900 dark:text-indigo-300">
                                {{ $tag }}
                            </span>
                        @endif
                    @else
                        <span
                            class="cursor-pointer bg-indigo-100 text-indigo-800 text-xs font-medium m-0.5 px-2.5 py-1 rounded dark:bg-indigo-900 dark:text-indigo-300">
                            {{ $tag }}
                        </span>
                    @endif
                @endforeach
            </div>

            <input id="services" type="hidden" wire:model='services'
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">


            @error('services')
                <div class="text-red-800 error">{{ $message }}</div>
            @enderror
        </div>

        {{-- images --}}
        <div class="mb-5 ">
            <label class="mb-2 block text-sm font-medium text-gray-900">Uploader les images de l'hotel</label>
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" wire:model="assets" class="hidden" multiple />
                </label>
            </div>
            @error('assets')
                <div class="text-red-800 error">{{ $message }}</div>
            @enderror
        </div>



        <button type="submit"
            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
            Créer l'hôtel
        </button>

        <button type="reset"
            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
            Reset
        </button>
    </form>
</div>


<script>
    var servicesInput = document.querySelector('#services');
    var selectedTags = [];

    document.querySelectorAll('#tagButtons span').forEach(function(span) {
        span.addEventListener('click', function() {
            var val = span.textContent;
            var index = selectedTags.indexOf(val);

            if (index > -1) {
                var removed = selectedTags.splice(index, 1);
                // remove selected bg and add standard bg
                span.classList.remove('selected', 'bg-pink-100', 'text-pink-800', 'dark:bg-pink-900',
                    'dark:text-pink-300');
                span.classList.add('bg-indigo-100', 'text-indigo-800', 'dark:bg-indigo-900',
                    'dark:text-indigo-300')
            } else {
                selectedTags.push(val);
                // remove standard bg and add selected bg
                span.classList.remove('bg-indigo-100', 'text-indigo-800', 'dark:bg-indigo-900',
                    'dark:text-indigo-300')
                span.classList.add('selected', 'bg-pink-100', 'text-pink-800', 'dark:bg-pink-900',
                    'dark:text-pink-300');
            }
            servicesInput.value = selectedTags.join(',');
            servicesInput.dispatchEvent(new Event('input'));

        });
    });
</script>
