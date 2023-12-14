<div class="fixed left-0 bg-gray-200 h-full w-24 select-none" id="side-bar">

    <div class="cursor-pointer flex py-2 px-2 items-center justify-center" id="toggle">
        <img src="{{ asset('storage/icons/list.svg') }}" id="menu-open">
        <img src="{{ asset('storage/icons/x.svg') }}" class="hidden" id="menu-close">
    </div>

    <x-link-bar :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{-- @dump( request()->routeIs('dashboard')) --}}
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
            fill="{{ request()->routeIs('dashboard') ? '#ffffff' : '#000000' }}" viewBox="0 0 256 256">
            <path
                d="M207.06,80.67A111.24,111.24,0,0,0,128,48h-.4C66.07,48.21,16,99,16,161.13V184a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V160A111.25,111.25,0,0,0,207.06,80.67ZM224,184H119.71l54.76-75.3a8,8,0,0,0-12.94-9.42L99.92,184H32V161.13c0-3.08.15-6.12.43-9.13H56a8,8,0,0,0,0-16H35.27c10.32-38.86,44-68.24,84.73-71.66V88a8,8,0,0,0,16,0V64.33A96.14,96.14,0,0,1,221,136H200a8,8,0,0,0,0,16h23.67c.21,2.65.33,5.31.33,8Z">
            </path>
        </svg>
        <span class="ms-2 hidden">Dashboard</span>
    </x-link-bar>

    <x-link-bar :href="route('admin.hotels')" :active="request()->routeIs('admin.hotels')">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="{{ request()->routeIs('admin.hotels') ? '#ffffff' : '#000000' }}" viewBox="0 0 256 256">
            <path
                d="M208,72H24V48A8,8,0,0,0,8,48V208a8,8,0,0,0,16,0V176H232v32a8,8,0,0,0,16,0V112A40,40,0,0,0,208,72ZM24,88H96v72H24Zm88,72V88h96a24,24,0,0,1,24,24v48Z">
            </path>
        </svg>
        <span class="ms-2 hidden">Manage Hotels</span>
    </x-link-bar>

    <x-link-bar :href="route('admin.trips')" :active="request()->routeIs('admin.trips')">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="{{ request()->routeIs('admin.trips') ? '#ffffff' : '#000000' }}" viewBox="0 0 256 256">
            <path
                d="M235.58,128.84,160,91.06V48a32,32,0,0,0-64,0V91.06L20.42,128.84A8,8,0,0,0,16,136v32a8,8,0,0,0,9.57,7.84L96,161.76v18.93L82.34,194.34A8,8,0,0,0,80,200v32a8,8,0,0,0,11,7.43l37-14.81,37,14.81A8,8,0,0,0,176,232V200a8,8,0,0,0-2.34-5.66L160,180.69V161.76l70.43,14.08A8,8,0,0,0,240,168V136A8,8,0,0,0,235.58,128.84ZM224,158.24l-70.43-14.08A8,8,0,0,0,144,152v32a8,8,0,0,0,2.34,5.66L160,203.31v16.87l-29-11.61a8,8,0,0,0-5.94,0L96,220.18V203.31l13.66-13.65A8,8,0,0,0,112,184V152a8,8,0,0,0-9.57-7.84L32,158.24v-17.3l75.58-37.78A8,8,0,0,0,112,96V48a16,16,0,0,1,32,0V96a8,8,0,0,0,4.42,7.16L224,140.94Z">
            </path>
        </svg>
        <span class="ms-2 hidden">Manage Voyages Organisée</span>
    </x-link-bar>



</div>


<script>
    window.onload = function() {
        const sideBar = document.querySelector('#side-bar')
        const menuOpen = document.querySelector('#menu-open');
        const menuClose = document.querySelector('#menu-close');
        const toggle = document.querySelector('#toggle');
        const menuItems = document.querySelectorAll('.item');
        const allLabel = document.querySelectorAll('.item span')

        menuOpen.onclick = (event) => {
            event.stopPropagation();
            // set body padding
            document.body.classList.remove('pl-24');
            document.body.classList.add('pl-72');
            // side bar width
            sideBar.classList.add('w-72');
            sideBar.classList.remove('w-24');

            // item display
            menuItems.forEach(item => {
                item.classList.remove('justify-center');
                item.classList.add('justify-start');
            })

            // icon label
            allLabel.forEach(label => {
                label.classList.remove('hidden')
            });

            // menu icon
            menuClose.classList.remove('hidden');
            menuOpen.classList.add('hidden')
            // toggle display
            toggle.classList.remove('justify-center')
            toggle.classList.add('justify-end')
        }

        menuClose.onclick = (event) => {
            event.stopPropagation();
            document.body.classList.add('pl-24');
            document.body.classList.remove('pl-72');
            sideBar.classList.remove('w-72');
            sideBar.classList.add('w-24');

            menuItems.forEach(item => {
                item.classList.add('justify-center');
                item.classList.remove('justify-start');
            })

            allLabel.forEach(label => {
                label.classList.add('hidden')
            })

            menuClose.classList.add('hidden');
            menuOpen.classList.remove('hidden');
            toggle.classList.add('justify-center')
            toggle.classList.remove('justify-end')
        }

    }
</script>
