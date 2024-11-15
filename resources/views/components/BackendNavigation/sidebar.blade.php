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
                        'route' => 'dashboard',
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
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-100 group {{ $isActive ? 'bg-blue-500 text-white hover:bg-blue-500' : '' }}">
                        <x-icons.icon type="{{ $item['icon'] }}" fill="{{ $isActive ? '#fff' : '#0f172a' }}" width="20"
                            height="20" />
                        <span class="ms-3">{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach

            <!-- Divider with Text -->
            <x-ui.sidebar-divider text="Tour Barcode" />

            @php
                $menuItems = [
                    [
                        'label' => 'Tour',
                        'route' => 'tour.index',
                        'icon' => 'dashboard',
                        'pattern' => 'admin/tour*',
                    ],
                    [
                        'label' => 'Tata Tertib',
                        'route' => 'tatatertib.index',
                        'icon' => 'dashboard',
                        'pattern' => 'admin/tatatertib*',
                    ],
                ];
            @endphp

            {{-- @foreach ($menuItems as $item)
                <li>
                    @php
                        $isActive = request()->is($item['pattern']);
                    @endphp

                    <a href="{{ route($item['route']) }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-100 group {{ $isActive ? 'bg-blue-500 text-white hover:bg-blue-500' : '' }}">
                        <x-icons.icon type="{{ $item['icon'] }}" fill="{{ $isActive ? '#fff' : '#0f172a' }}"
                            width="20" height="20" />
                        <span class="ms-3">{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach

            <!-- Divider with Text -->
            <x-ui.sidebar-divider text="Frontend" />

            @php
                $otherMenuItems = [
                    [
                        'label' => 'Tour List',
                        'route' => 'frontend-tour.index',
                        'icon' => 'dashboard',
                        'pattern' => 'admin/frontend-tour*',
                    ],
                    [
                        'label' => 'Gallery',
                        'route' => 'galleries.index',
                        'icon' => 'dashboard',
                        'pattern' => 'admin/galleries*',
                    ],
                    [
                        'label' => 'Link List',
                        'route' => 'links.index',
                        'icon' => 'dashboard',
                        'pattern' => 'admin/links*',
                    ],
                ];
            @endphp

            @foreach ($otherMenuItems as $item)
                <li>
                    @php
                        $isActive = request()->is($item['pattern']);
                    @endphp

                    <a href="{{ route($item['route']) }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-100 group {{ $isActive ? 'bg-blue-500 text-white hover:bg-blue-500' : '' }}">
                        <x-icons.icon type="{{ $item['icon'] }}" fill="{{ $isActive ? '#fff' : '#0f172a' }}"
                            width="20" height="20" />
                        <span class="ms-3">{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach --}}
        </ul>
    </div>
</aside>
