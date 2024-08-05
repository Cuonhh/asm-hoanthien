<nav class="flex-[1_1_20%] sticky top-0 bg-white py-5 border-r-slate-200 border-solid border-r-2">
    <ul class="">
        <x-admin.navitem title="Home" url="{{url('/')}}">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </x-slot>
        </x-admin.navitem>
        <x-admin.navitem title="Dashboard" url="{{url('/admin')}}">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                </svg>
            </x-slot>
        </x-admin.navitem>
        <x-admin.navitem title="Danh mục" url="#">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                </svg>
            </x-slot>
            <x-slot name="dropdown">
                <li>
                    <a href="{{url('/admin/category')}}">Danh sách</a>
                </li>
                <li>
                    <a href="{{url('/admin/category/create')}}">Thêm</a>
                </li>
            </x-slot>
        </x-admin.navitem>
        <x-admin.navitem title="Tin tức" url="#">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
            </x-slot>
            <x-slot name="dropdown">
                <li>
                    <a href="{{url('/admin/tin-tuc')}}">Danh sách</a>
                </li>
                <li>
                    <a href="{{url('/admin/tin-tuc/create')}}">Thêm</a>
                </li>
            </x-slot>
        </x-admin.navitem>
        @if (Auth::user()->role === 0)
            <x-admin.navitem title="Quản lý user" url="#">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </x-slot>
                <x-slot name="dropdown">
                    <li>
                        <a href="{{url('/admin/user')}}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{url('/admin/user/create')}}">Thêm</a>
                    </li>
                </x-slot>
            </x-admin.navitem>
            <x-admin.navitem title="Quản lý website" url="{{url('/admin/webinfo')}}">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </x-slot>
            </x-admin.navitem>
        @endif

    </ul>
</nav>