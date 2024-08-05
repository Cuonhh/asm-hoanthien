<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Danh sách user') }}
    </h2>
</x-slot>

<div class="py-12 flex-[1_1_80%] bg-white">
    <div class="max-w-full  px-5">
        {{--
        <livewire:category.list-category :categories="$categories" /> --}}
        <div class="mb-6 flex justify-between">
            <x-input type="text" class="w-4/12 h-10" wire:model="search" placeholder="Search..."/>
            <x-btn.select class="w-1/12" wire:model='pageNumber'>
                <option value="5">5</option>
                <option value="10">10</option>
            </x-btn.select>
        </div>

        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Id
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Họ tên
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Username
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Email
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Role
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $item)                       
                    <tr>
                        <th scope="row" class="py-4 px-6 font-medium">
                            {{$key}}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium">
                            {{$item->name}}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium">
                            {{$item->username}}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium">
                            {{$item->email}}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium">
                            <x-btn.select onchange="messageUpdate()" wire:change='handleOnChangeRole({{$item->id}})' wire:model='role.{{$item->id}}'>
                                <option value="0">Admin</option>
                                <option value="2">Editer</option>
                                <option value="1">User</option>
                            </x-btn.select>
                        </th>
                    </tr>
                    @endforeach

                </tbody>

            </table>
            {{$users->links()}}
        </div>
    </div>
</div>

<script>
    function messageUpdate(){
        alert('Cập nhập thành công');
    }
</script>

