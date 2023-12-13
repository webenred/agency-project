<div>
    <form wire:submit="save">

        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">nom de l'hôtel</label>
            <input type="text" id="name" wire:model='name'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="nom de l'hôtel" required>
            @error('name')
                <div class="text-red-800 error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">description de l'hôtel</label>
            <textarea id="description" rows="4" wire:model='description'
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="la description de l'hôtel, à propos de l'hôtel..."></textarea>
            @error('description')
                <div class="text-red-800 error">{{ $message }}</div>
            @enderror
        </div>

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

        <div class="mb-5">
            <label for="city" class="block mb-2 text-sm font-medium text-gray-900">ville de l'hôtel</label>
            <input type="text" id="city" wire:model='city'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                required placeholder="Alger">
            @error('city')
                <div class="text-red-800 error">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-5">
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">adresse de l'hôtel</label>
            <input type="text" id="address" wire:model='address'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                required>
            @error('address')
                <div class="text-red-800 error">{{ $message }}</div>
            @enderror
        </div>



        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">coordonnées de l'hôtel</label>
        </div>
        <div class="mb-2 flex items-center ">
            <div class="pe-2">
                <label for="phone-input" class="block mb-2 text-sm font-medium text-gray-900">N° tél</label>
            </div>
            <div class="flex items-center">
                <select name="phone_code"
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">
                    @foreach ($countries as $country)
                        <option {{ $country['code'] === 'DZ' ? 'selected' : '' }} value="{{ $country['dial_code'] }}">
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

        <div class="mb-5">
            <label for="nb_rooms" class="block mb-2 text-sm font-medium text-gray-900">nombre de chambres</label>
            <input type="number" id="nb_rooms" wire:model='nb_rooms'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            @error('nb_rooms')
                <div class="text-red-800 error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="rating" class="block mb-2 text-sm font-medium text-gray-900">classification de l'hôtel</label>
            <input type="number" id="rating" wire:model='rating'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            @error('rating')
                <div class="text-red-800 error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900">service offert par
                l'hôtel</label>

            <input id="services" type="hidden" wire:model='services'
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">

            <div class="flex flex-wrap mt-1 select-none" id="tagButtons"></div>

            @error('services')
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
    var tags = {{ Illuminate\Support\Js::from($hotelServices) }};

    var servicesInput = document.querySelector('#services');
    var selectedTags = [];

    tags.forEach(function(tag) {
        var el = document.createElement('span');
        el.classList.add('bg-indigo-100', 'text-indigo-800', 'text-xs', 'font-medium', 'm-0.5', 'px-2.5',
            'py-1', 'rounded', 'dark:bg-indigo-900', 'dark:text-indigo-300')
        el.textContent = tag;
        document.getElementById('tagButtons').appendChild(el);
    });

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
            servicesInput.value = selectedTags.join(', ');
            servicesInput.dispatchEvent(new Event('input'));

        });
    });
</script>
