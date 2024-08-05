<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Danh sách danh mục') }}
        </h2>
    </x-slot>

    <div class="py-12 flex-[1_1_80%] bg-white">
        <div class="max-w-full px-5">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">Id</th>
                            <th scope="col" class="py-3 px-6">Name</th>
                            <th scope="col" class="py-3 px-6">Slug</th>
                            <th scope="col" class="py-3 px-6">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr
                                class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                <td class="py-4 px-6 font-medium">{{ $category->id }}</td>
                                <td class="py-4 px-6 font-medium">{{ $category->name }}</td>
                                <td class="py-4 px-6 font-medium">{{ $category->slug }}</td>
                                <td class="py-4 px-6 font-medium">
                                    <a href="{{ route('category.edit', [$category->id]) }}"
                                        class="inline-flex items-center px-4 py-2 bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        Edit
                                    </a>

                                    <form action="{{ route('category.destroy', [$category->id]) }}"
                                        onsubmit="return confirm('Bạn có thực sự muốn xóa?')" method="post"
                                        style="display: inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <x-btn.button2 class="bg-red-400" typeBtn="button"
                                            type="submit">Delete</x-btn.button2>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
