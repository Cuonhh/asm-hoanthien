<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thông tin trang web') }}
        </h2>
    </x-slot>

    <div class="py-12 flex-[1_1_80%] bg-white">
        <div class="max-w-full px-5">
            <form action="{{route('webinfo.store')}}" method="post" enctype="multipart/form-data">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                @csrf
                <div class="my-2">
                    <x-label :value="__('Logo')" for="logo" />
                    <img src="{{asset($logo)}}" class="w-[200px] mb-4" alt="" id="output">
                    <x-input id="logo" class="block mt-1 w-full" type="file" name="logo"
                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"
                         />
                </div>
                <div class="my-2">
                    <x-label :value="__('Địa chỉ')" for="address" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$address"
                         />
                </div>
                <div class="my-2">
                    <x-label :value="__('Số điện thoại')" for="phone" />
                    <x-input id="phone" class="block mt-1 w-full" type="text" name="phone"  :value="$phone"
                         />
                </div>
                <div class="my-2">
                    <x-label :value="__('Footer email')" for="email" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$email"
                         />
                </div>

                <x-button type="submit" name="add" class="bg-gray-600">Cập nhật</x-button>
            </form>
        </div>

    </div>
</x-app-layout>