<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex-[1_1_80%] bg-white">
        <div class="max-w-full px-5">
            <div class="flex ">
                <div class="flex-[1_1_40%] max-w-[40%] flex flex-wrap content-start ">
                    <x-admin.dashboard-wp :number="$numberUser" :numberTang="$numberTang" title="User">
                        <x-slot name="logo">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>
                        </x-slot>
                    </x-admin.dashboard-wp>
                    <x-admin.dashboard-wp :number="$numberPost" :numberTang="$numberTangPost" title="Bài Post">
                        <x-slot name="logo">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </x-slot>
                    </x-admin.dashboard-wp>
                </div>

                <div class="flex-[1_1_60%] max-w-[60%]">
                    <h3 class="font-bold text-2xl">Số bài post của danh mục</h3>
                    <div>
                        <canvas id="myChart" width="300"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>

{{-- <x-layouts.master1>
    <h2>Home page</h2>
</x-layouts.master1> --}}