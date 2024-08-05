{{-- <div>


</div> --}}

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('TThêm tin tức') }}
    </h2>
</x-slot>

<div class="py-12 flex-[1_1_80%] bg-white">
    <div class="max-w-full  px-5">
        <form wire:submit.prevent="submitForm" action="" method="POST">
            {{$a}}
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @csrf
            <div class="my-2">
                <x-label :value="__('Tiêu đề')" for="title" />
                <x-input id="title" wire:model='title' class="block mt-1 w-full" type="text" name="title"
                    :value="old('title')" required autofocus />
                @error('title') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
            <div class="my-2">
                <x-label :value="__('Đường dẫn')" for="slug" />
                <x-input id="slug" wire:model='slug' class="block mt-1 w-full" type="text" name="slug"
                    :value="old('slug')" required autofocus />
                @error('slug') <span class="text-red-600">{{ $message }}</span> @enderror

            </div>
            <div class="my-2">
                <x-label :value="__('Mô tả ngắn')" for="short_description" />
                <x-btn.textarea wire:model='short_description' name="short_description" id="short_description" />
                @error('short_description') <span class="text-red-600">{{ $message }}</span> @enderror

            </div>
            <style>
                .ck-content {
                    min-height: 500px;
                }
            </style>

            <div class="my-2">
                <x-label :value="__('Nội dung')" for="content" />
                <x-btn.textarea name="content" wire:model='content' id="content" />
                @error('content') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
            <script>
                CKEDITOR.replace( 'content' );
            </script>
            <div class="my-2">
                <x-btn.switch name="hot_post" wire:model='hot_post'>Tin tức hot</x-btn.switch>
            </div>

            <div class="my-2">
                <x-label :value="__('Danh mục')" for="category_id" />
                <x-btn.select name="category_id" id="category_id" wire:model='category_id'>
                    <option value="">--Chọn--</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </x-btn.select>
                @error('category_id') <span class="text-red-600">{{ $message }}</span> @enderror

            </div>

            <div class="my-2">
                <x-label :value="__('Hình ảnh')" for="image" />
                <x-input type="file" name="image" id="image" required wire:model='image' />
                @error('image') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <x-button type="submit" wire:click="submitForm" name="add" class="bg-gray-600">Thêm</x-button>
        </form>
    </div>
</div>