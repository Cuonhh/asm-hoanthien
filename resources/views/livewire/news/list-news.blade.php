<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Danh sách bài post') }}
    </h2>
</x-slot>

<div class="py-12 flex-[1_1_80%] bg-white">
    <div class="max-w-full  px-5">
        {{--
        <livewire:category.list-category :categories="$categories" /> --}}
        <div class="mb-6 flex justify-between">
            <x-input type="text" wire:model='search' class="w-4/12 h-10" placeholder="Search..."/>
            <x-btn.select class="w-1/12" wire:model='pageNumber'>
                <option value="5">5</option>
                <option value="10">10</option>
            </x-btn.select>
        </div>

        <div class="mb-6">
            <x-btn.select wire:model="action" class="w-[200px] inline-flex">
                <option value="0">--Chọn--</option>
                <option value="delete">Xóa</option>
                <option value="hot_post">Bài viết hot</option>
            </x-btn.select>
            <x-button class="bg-slate-400" wire:click="submitAction">OK</x-button>
        </div>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            <input type="checkbox">
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Id
                        </th>
                        <th scope="col" class="py-3 px-6" wire:click="setType('title')">
                            title
                        </th>
                        <th scope="col" class="py-3 px-6" wire:click="setType('views')">
                            View
                        </th>
                        <th scope="col" class="py-3 px-6" wire:click="setType('views')">
                            Hot
                        </th>
                        <th scope="col" class="py-3 px-6" wire:click="setType('views')">
                            Edit
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $key => $post)                     
                    <tr>
                        <th scope="row" class="py-3 px-6">
                            <input type="checkbox" wire:model="listDelete" value="{{$post->id}}">
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium">
                            {{$key}}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium">
                            {{$post->title}}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium">
                            {{$post->views}}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium">
                            @if ($post->hot_post == 0)
                                <span class="text-red-600">Hot</span>
                            @else
                                <span>Không</span>
                            @endif

                            
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium">
                            <x-btn.button2 typeBtn="a" :href="route('tintuc.update', [$post->id])" >Edit</x-btn.button2>
                        </th>
                    </tr>
                    @endforeach

                </tbody>

            </table>
            {{$posts->links()}}
        </div>
    </div>
