<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">

            @php
                $menuItems = [
                    [
                        'label' => 'Dashboard',
                        'route' => 'dashboard',
                        'icon' => 'dashboard',
                        'pattern' => 'admin/dashboard*',
                    ],
                    [
                        'label' => 'Data Desa',
                        'route' => 'data-desa.index',
                        'icon' => 'dashboard',
                        'pattern' => 'admin/data-desa*',
                    ],
                ];
            @endphp

            @foreach ($menuItems as $item)
                <li>
                    @php
                        $isActive = request()->is($item['pattern']);
                    @endphp

                    <a href="{{ route($item['route']) }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-100 group {{ $isActive ? 'bg-green-500 text-white hover:bg-green-500' : '' }}">
                        <x-icons.icon type="{{ $item['icon'] }}" fill="{{ $isActive ? '#fff' : '#0f172a' }}" width="20"
                            height="20" />
                        <span class="ms-3">{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach

            <!-- Divider with Text -->
            <x-ui.sidebar-divider text="Data Pengguna" />

            @php
                $dataPengguna = [
                    [
                        'label' => 'Admin',
                        'route' => 'data-admin.index',
                        'icon' => 'dashboard',
                        'pattern' => 'admin/data-admin*',
                    ],
                    [
                        'label' => 'Masyarakat',
                        'route' => 'data-user.index',
                        'icon' => 'dashboard',
                        'pattern' => 'admin/data-user*',
                    ],
                ];
            @endphp

            @foreach ($dataPengguna as $item)
                <li>
                    @php
                        $isActive = request()->is($item['pattern']);
                    @endphp

                    <a href="{{ route($item['route']) }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-100 group {{ $isActive ? 'bg-green-500 text-white hover:bg-green-500' : '' }}">
                        <x-icons.icon type="{{ $item['icon'] }}" fill="{{ $isActive ? '#fff' : '#0f172a' }}"
                            width="20" height="20" />
                        <span class="ms-3">{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach

            <!-- Divider with Text -->
            <x-ui.sidebar-divider text="Data Geografis" />

            @php
                $DataGeografis = [
                    [
                        'label' => 'Data Dusun',
                        'route' => 'dusun.index',
                        'icon' => 'dashboard',
                        'pattern' => 'admin/data-penduduk/dusun*',
                    ],
                    [
                        'label' => 'Data RW',
                        'route' => 'rw.index',
                        'icon' => 'dashboard',
                        'pattern' => 'admin/data-penduduk/rw*',
                    ],
                    [
                        'label' => 'Data RT',
                        'route' => 'rt.index',
                        'icon' => 'dashboard',
                        'pattern' => 'admin/data-penduduk/rt*',
                    ],
                ];
            @endphp

            @foreach ($DataGeografis as $item)
                <li>
                    @php
                        $isActive = request()->is($item['pattern']);
                    @endphp

                    <a href="{{ route($item['route']) }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-100 group {{ $isActive ? 'bg-green-500 text-white hover:bg-green-500' : '' }}">
                        <x-icons.icon type="{{ $item['icon'] }}" fill="{{ $isActive ? '#fff' : '#0f172a' }}"
                            width="20" height="20" />
                        <span class="ms-3">{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
            <!-- Divider with Text -->
            <x-ui.sidebar-divider text="Data Penduduk" />

            @php
                $DataPenduduk = [
                    [
                        'label' => 'Data Ktp',
                        'route' => 'ktp.index',
                        'icon' => 'dashboard',
                        'pattern' => 'admin/data-penduduk/ktp*',
                    ],
                    [
                        'label' => 'Data KK',
                        'route' => 'kk.index',
                        'icon' => 'dashboard',
                        'pattern' => 'admin/data-penduduk/kk*',
                    ],
                ];
            @endphp

            @foreach ($DataPenduduk as $item)
                <li>
                    @php
                        $isActive = request()->is($item['pattern']);
                    @endphp

                    <a href="{{ route($item['route']) }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-100 group {{ $isActive ? 'bg-green-500 text-white hover:bg-green-500' : '' }}">
                        <x-icons.icon type="{{ $item['icon'] }}" fill="{{ $isActive ? '#fff' : '#0f172a' }}"
                            width="20" height="20" />
                        <span class="ms-3">{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
