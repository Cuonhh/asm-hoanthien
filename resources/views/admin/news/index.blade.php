<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thêm tin tức') }}
        </h2>
    </x-slot>

    <div class="py-12 flex-[1_1_80%] bg-white">
        <div class="max-w-full  px-5">
            <form action="{{route('tintuc.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                @csrf
                <div class="my-2">
                    <x-label :value="__('Tiêu đề')" for="title" />
                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                        required autofocus />
                </div>
                <div class="my-2">
                    <x-label :value="__('Đường dẫn')" for="slug" />
                    <x-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" required
                        autofocus />

                </div>
                <div class="my-2">
                    <x-label :value="__('Mô tả ngắn')" for="short_description" />
                    <x-btn.textarea name="short_description" id="short_description">{{old('short_description')}}</x-btn.textarea>
                </div>
                <style>
                    .ck-content {
                        min-height: 500px;
                    }
                </style>

                <div class="my-2">
                    <x-label :value="__('Nội dung')" for="content" />
                    <x-btn.textarea name="content" id="content">{{old('content')}}</x-btn.textarea>
                </div>
                <script>

                    // CKEDITOR.plugins.addExternal( 'uploadimage', '/js', 'plugin.js' );
                    CKEDITOR.replace( 'content',{
                        extraPlugins: 'uploadimage',
                        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                        filebrowserUploadMethod: 'form',
                        
                    } );


                </script>
                <div class="my-2">
                    <x-btn.switch name="hot_post" value="0">Tin tức hot</x-btn.switch>
                </div>

                <div class="my-2">
                    <x-label :value="__('Danh mục')" for="category_id" />
                    <x-btn.select name="category_id" id="category_id">
                        <option value="">--Chọn--</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </x-btn.select>
                </div>

                <div class="my-2">
                    <x-label :value="__('Hình ảnh')" for="image" />
                    <x-input type="file" name="image" id="image" required />
                </div>

                <x-button type="submit" name="add" class="bg-gray-600">Thêm</x-button>
            </form>
        </div>
    </div>
</x-app-layout>