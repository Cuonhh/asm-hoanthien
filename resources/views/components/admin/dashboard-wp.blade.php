 <div class="p-[20px] bg-slate-500/80 rounded-lg text-white m-[12px] flex-[1_1_calc(50%-24px)] max-w-[calc(50%-24px)]">
        <div class="mb-[10px]">
            <span class="text-sm">{{$title}}</span>
            <div class="float-right w-[40px] h-[40px] bg-[#DCDEFC] text-blue-500 flex items-center justify-center rounded-md">
                {{$logo}}
            </div>
        </div>
    
        <h3 class="text-xl my-6 font-bold">
            {{$number}}
        </h3>
    
        <div class="text-[14px]">
            <span class="text-green-400 mr-3">
                <i class="text-[14px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                </i>
                {{$numberTang}}
            </span>
            <span class="text-white">
                Trong một tháng
            </span>
        </div>
 </div>