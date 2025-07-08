<nav x-data="{ open: false }" class="d-flex flex-column bg-white h-full border-t min-h-screen">
    <div class="pt-8 pl-3">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <i class="fa-solid fa-house"></i>{{ __('BERANDA') }}
            </x-nav-link>
        </div>

        @hasrole('Admin')
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('guru.index')" :active="request()->routeIs('guru.index') || request()->routeIs('guru.create')">
                <i class="fa-solid fa-user-pen"></i>{{ __('DATA GURU') }}
            </x-nav-link>
        </div>

        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('spesialis.index')" :active="request()->routeIs('spesialis.index') || request()->routeIs('spesialis.create')">
                <i class="fa-solid fa-user-doctor"></i>{{ __('DATA SPESIALIS KEJIWAAN') }}
            </x-nav-link>
        </div>

        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('siswa.index')" :active="request()->routeIs('siswa.index') || request()->routeIs('siswa.create')">
                <i class="fa-solid fa-user-group p-2"></i>{{ __('DATA SISWA') }}
            </x-nav-link>
        </div>

        <!-- Dropdown -->
        <div x-data="{ open: false }" class="relative inline-block text-left">
            <button @click="open = !open"
                class="text-gray-800 hover:text-blue-600 flex items-center space-x-2 focus:outline-none">
                <i class="fa-solid fa-calendar-days"></i>
                <span>DATA JADWAL KONSELING</span>
                <i class="fa-solid fa-chevron-down ml-1"></i>
            </button>

            <div x-show="open" @click.away="open = false"
                x-transition
                class="absolute mt-2 w-64 bg-white rounded-md shadow-lg z-50">

                <a href="{{ route('jadwalbk.index') }}"
                    class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-200 {{ request()->routeIs('jadwalbk.index') ? 'bg-gray-200 font-bold' : '' }}">
                    <i class="fa-solid fa-graduation-cap mr-2"></i>
                    <span>JADWAL BK SMK</span>
                </a>

                <a href="{{ route('jadwaljiwa.index') }}"
                    class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-200 {{ request()->routeIs('jadwaljiwa.index') ? 'bg-gray-200 font-bold' : '' }}">
                    <i class="fa-solid fa-trophy mr-2"></i>
                    <span>JADWAL SPESIALIS KEJIWAAN</span>
                </a>
            </div>
        </div>

        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('pengaduan.index')" :active="request()->routeIs('pengaduan.index') || request()->routeIs('pengaduan.create')">
                <i class="fa-solid fa-envelope-open-text"></i> {{ __('DATA PENGADUAN BK') }}
            </x-nav-link>
        </div>

        <!-- Dropdown -->
        <div x-data="{ open: false }" class="relative inline-block text-left">
            <button @click="open = !open"
                class="text-gray-800 hover:text-blue-600 flex items-center space-x-2 focus:outline-none">
                <i class="fa-solid fa-book"></i>
                <span>DATA KONSELING (BK)</span>
                <i class="fa-solid fa-chevron-down ml-1"></i>
            </button>

            <div x-show="open" @click.away="open = false"
                x-transition
                class="absolute mt-2 w-64 bg-white rounded-md shadow-lg z-50">

                <a href="{{ route('pribasos.index') }}"
                    class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-200 {{ request()->routeIs('pribasos.index') ? 'bg-gray-200 font-bold' : '' }}">
                    <i class="fa-solid fa-graduation-cap mr-2"></i>
                    <span>BK-PRIBADI, SOSIAL</span>
                </a>

                <a href="{{ route('belajar.index') }}"
                    class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-200 {{ request()->routeIs('belajar.index') ? 'bg-gray-200 font-bold' : '' }}">
                    <i class="fa-solid fa-trophy mr-2"></i>
                    <span>BK-BELAJAR</span>
                </a>

                <a href="{{ route('karier.index') }}"
                    class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-200 {{ request()->routeIs('karier.index') ? 'bg-gray-200 font-bold' : '' }}">
                    <i class="fa-solid fa-trophy mr-2"></i>
                    <span>BK-KARIER</span>
                </a>
            </div>
        </div>

        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('pelanggaran.index')" :active="request()->routeIs('pelanggaran.index') || request()->routeIs('pelanggaran.create')">
                <i class="fa-solid fa-file-pen"></i>{{ __('DATA PELANGGARAN') }}
            </x-nav-link>
        </div>

        <!-- Dropdown -->
        <div x-data="{ open: false }" class="relative inline-block text-left">
            <button @click="open = !open"
                class="text-gray-800 hover:text-blue-600 flex items-center space-x-2 focus:outline-none">
                <i class="fa-solid fa-book"></i>
                <span>DATA TINDAK LANJUT</span>
                <i class="fa-solid fa-chevron-down ml-1"></i>
            </button>

            <div x-show="open" @click.away="open = false"
                x-transition
                class="absolute mt-2 w-64 bg-white rounded-md shadow-lg z-50">

                <a href="{{ route('sp.index') }}"
                    class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-200 {{ request()->routeIs('sp.index') ? 'bg-gray-200 font-bold' : '' }}">
                    <i class="fa-solid fa-graduation-cap mr-2"></i>
                    <span>DATA SP-1, SP-2, SP-3</span>
                </a>
            </div>
        </div>

        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('chatify')" :active="request()->routeIs('chatify')">
                <i class="fa-solid fa-comments"></i>{{ __('TANYA SPESIALIS KEJIWAAN') }}
            </x-nav-link>
        </div>
        @endhasrole

        @hasrole('WaliKelas')
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('guru.index')" :active="request()->routeIs('guru.index') || request()->routeIs('guru.create')">
                <i class="fa-solid fa-user-pen"></i>{{ __('DATA GURU') }}
            </x-nav-link>
        </div>

        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('siswa.index')" :active="request()->routeIs('siswa.index') || request()->routeIs('siswa.create')">
                <i class="fa-solid fa-user-group p-2"></i>{{ __('DATA SISWA') }}
            </x-nav-link>
        </div>

        <!-- Dropdown -->
        <div x-data="{ open: false }" class="relative inline-block text-left">
            <button @click="open = !open"
                class="text-gray-800 hover:text-blue-600 flex items-center space-x-2 focus:outline-none">
                <i class="fa-solid fa-calendar-days"></i>
                <span>DATA JADWAL KONSELING</span>
                <i class="fa-solid fa-chevron-down ml-1"></i>
            </button>

            <div x-show="open" @click.away="open = false"
                x-transition
                class="absolute mt-2 w-64 bg-white rounded-md shadow-lg z-50">

                <a href="{{ route('pribasos.index') }}"
                    class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-200 {{ request()->routeIs('pribasos.index') ? 'bg-gray-200 font-bold' : '' }}">
                    <i class="fa-solid fa-graduation-cap mr-2"></i>
                    <span>BK-PRIBADI, SOSIAL</span>
                </a>

                <a href="{{ route('belajar.index') }}"
                    class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-200 {{ request()->routeIs('belajar.index') ? 'bg-gray-200 font-bold' : '' }}">
                    <i class="fa-solid fa-trophy mr-2"></i>
                    <span>BK-BELAJAR</span>
                </a>

                <a href="{{ route('karier.index') }}"
                    class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-200 {{ request()->routeIs('karier.index') ? 'bg-gray-200 font-bold' : '' }}">
                    <i class="fa-solid fa-trophy mr-2"></i>
                    <span>BK-KARIER</span>
                </a>
            </div>
        </div>

        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('pengaduan.index')" :active="request()->routeIs('pengaduan.index') || request()->routeIs('pengaduan.create')">
                <i class="fa-solid fa-envelope-open-text"></i> {{ __('DATA PENGADUAN BK') }}
            </x-nav-link>
        </div>


        <!-- <div class="hidden space-x-8 sm:items-center sm:-my-px sm:ms-10 sm:flex">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <x-nav-link :active="request()->routeIs('pribasos.index') || request()->routeIs('dispenfls2n.index')">
                        <i class="fa-solid fa-table pr-2"></i>{{ __('BK-PRIBADI, SOSIAL') }}

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </x-nav-link>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('pribasos.index')">
                        <i class="fa-solid fa-user-graduate pr-2 text-sm"></i>{{ __('BK-BELAJAR') }}
                    </x-dropdown-link>

                    <x-dropdown-link>
                        <i class="fa-solid fa-industry pr-2 text-sm"></i>{{ __('BK-KARIER') }}
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
        </div> -->

        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('pelanggaran.index')" :active="request()->routeIs('pelanggaran.index') || request()->routeIs('pelanggaran.create')">
                <i class="fa-solid fa-file-pen"></i>{{ __('DATA PELANGGARAN') }}
            </x-nav-link>
        </div>

        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <!-- <x-nav-link :href="route('surat.index')" :active="request()->routeIs('surat.index') || request()->routeIs('surat.create')"> -->
            <i class="fa-solid fa-file-pen"></i>{{ __('KELOLA SURAT') }}
            </x-nav-link>
        </div>

        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('sp.index')" :active="request()->routeIs('sp.index') || request()->routeIs('sp.create')">
                <i class="fa-solid fa-file-pen"></i>{{ __('DATA SP-1, SP-2, SP-3') }}
            </x-nav-link>
        </div>
        @endhasrole



    </div>
</nav>