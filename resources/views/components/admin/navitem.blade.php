<li class="px-3" x-data="{ open: false }">
    <a href="{{$url}}" class="flex justify-between py-2 transition-[border] duration-200 items-center pl-3 font-bold text-lg border-l-4 border-solid border-transparent hover:border-blue-300">
        <div class="flex">
            <div class="mr-8">
                {{$icon}}
            </div>
            <span class="">
                {{$title}}
            </span>
        </div>

        @if (isset($dropdown))
        <span @click="open=!open">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </span>
        @endif
    </a>
    

    @if (isset($dropdown))
        <ul x-show="open" class="pl-8 border-solid border-l-2 border-blue-400 ml-5" x-transition>
            {{$dropdown}}
        </ul>
    @endif
</li>