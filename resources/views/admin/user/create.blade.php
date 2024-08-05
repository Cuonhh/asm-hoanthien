<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thêm người dùng') }}
        </h2>
    </x-slot>

    <div class="py-12 flex-[1_1_80%] bg-white">
        <div class="max-w-full  px-5">
            <form action="{{route('user.store')}}" method="POST" >
                @csrf
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                @csrf
                <div class="my-2">
                    <x-label :value="__('Họ và tên')" for="name" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus />
                </div>
                <div class="my-2">
                    <x-label :value="__('Tên đăng nhập')" for="username" />
                    <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                        required autofocus />
                </div>
                <div class="my-2">
                    <x-label :value="__('Email')" for="email" />
                    <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"
                        required autofocus />
                </div>
                <div class="my-2">
                    <x-label :value="__('Mật khẩu')" for="password" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')"
                        required autofocus />
                </div>
                <div class="my-2">
                    <x-label :value="__('Nhập lại mật khẩu')" for="password_confirmation" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" :value="old('password_confirmation')"
                        required autofocus />
                </div>

                <div class="my-2">
                    <x-label :value="__('Phân quyền')" for="role" />
                    <x-btn.select name="role" id="role">
                        <option value="1">Người dùng</option>
                        <option value="0">Admin</option>
                        <option value="2">Editer</option>
                    </x-btn.select>
                </div>
                

                <x-button type="submit" name="add" class="bg-gray-600">Thêm</x-button>
            </form>
        </div>
    </div>
</x-app-layout>