<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit danh mục') }}
        </h2>
    </x-slot>

    <div class="py-12 flex-[1_1_80%] bg-white">
        <div class="max-w-full  px-5">
            <form action="{{route('category.update', [$category->id])}}" method="post">
                @csrf
                @method('PUT')
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                @csrf
                <div class="my-2">
                    <x-label :value="__('Tên danh mục')" for="name" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="__($category->name)"
                        required />
                </div>
                <div class="my-2">
                    <x-label :value="__('Đường dẫn')" for="slug" />
                    <x-input id="slug" :value="__($category->slug)" class="block mt-1 w-full" type="text" name="slug"
                        required />
                </div>
                <div class="my-2">
                    <x-label :value="__('Kiểu danh mục')" for="parent_id" />
                    <x-btn.select name="parent_id">
                        <option value="0">Danh mục cha</option>
                        @if ($categories)
                        @foreach ($categories as $cate)
                        <option value="{{$cate->id}}" {{$category->parent_id === $cate->id ? "selected" :
                            ""}}>{{$cate->name}}</option>
                        @endforeach
                        @endif
                    </x-btn.select>
                </div>

                <x-button type="submit" name="add" class="bg-gray-600">Cập nhập</x-button>
            </form>
        </div>
    </div>
</x-app-layout>