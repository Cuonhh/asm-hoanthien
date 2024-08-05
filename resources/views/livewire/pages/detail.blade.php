<main class="main">
    <div class="container">
        <x-site.breadcrumb :post="$post" />

        <div class="row">
            <div class="col-xl-9 col-md-12">
                <h2 class="my-4">
                    {{$post->title}}
                </h2>

                <div class="detail-times">
                    <span class="me-3 d-inline-block">
                        {{date_format($post->created_at,"d \\t\\há\\n\\g m \\nă\\m Y")}}
                    </span>
                    <span class="me-3 d-inline-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                        </svg>
                        {{$post->views}}
                    </span>
                </div>

                <div class="detail-imgs p-4">
                    <img src="{{asset("{$post->image}")}}" alt="">
                </div>
                <style>
                    #content img{
                        width: 100% !important;
                        height: auto !important;

                    }
                </style>
                <div id="content" class="mt-4 px-3">
                    {!! $post->content !!}
                </div>

                <x-site.detail-slide :data="$postLQ" :id="$idPost" />

                @if(Auth::check()) 
                <div class="comment-block">
                    <h3 class="commnet-title">
                        <span>
                            Bình luận bài viết
                        </span>
                    </h3>
                
                    {{-- <form action="" method="post" class="my-4">
                        <div class="form-group mb-3">
                            <label for="" class="form-lable">Nhập bình luận</label>
                            <textarea name="message" class="form-control" id="" cols="30" rows="10" wire:model="comment"></textarea>
                        </div>
                        <div class="d-flex align-center">
                            <button class="btn btn-primary " type="button" wire:click.lazy="insertComment">Gửi</button>
                            <div class="spinner-border text-success text-center ms-3" wire:loading wire:target="insertComment" role="status" >
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                
                    </form> --}}
                
                    <div class="comment-wrapper">
                        @foreach ($comments as $item)    
                        <div class="comment-item">
                            <div class="comment-item-top">
                                <div class="comment-item-avata">
                                    <img src="{{asset($item->user->avatar)}}" alt="">
                                </div>
                                <div class="comment-item-names">
                                    <span>{{$item->user->name}}</span><br>
                                    <span>{{date_format($item->created_at,"d/m/Y")}}</span>
                                </div>
                            </div>
                            <div class="comment-item-content">
                                {{$item->content}}
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-12">
                <x-site.sidebar titleSidebar="Tin mới" :data="$postNew" />
                <x-site.sidebar titleSidebar="Tin xem nhiều" :data="$postView" />
            </div>
        </div>
    </div>
    <script>
        const slider = $('#detail-cate-slider')
        slider.slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            prevArrow: `<button type="button" class="slick-prev">
            <i class="bi bi-chevron-compact-left"></i>
            </button>`,
            nextArrow: `<button type="button" class="slick-next">
            <i class="bi bi-chevron-compact-right"></i>
            </button>`
        })
    </script>
</main>
