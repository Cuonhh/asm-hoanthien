<div class="detail-cate">
    <div class="detail-cate-title">
        <h3>
            <span>
                Bài viết liên quan
            </span>
        </h3>
    </div>
    
    
    <style>
        .detail-cate-item{
            display: flex !important;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        .detail-cate-item>img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <div id="detail-cate-slider">
        @foreach ($data as $key => $item)    
        
        <a class="detail-cate-item" href="#" wire:key="item-{{ $item->id }}">
            <img src="{{asset($item->image)}}" alt="">
            <p>{{$item->title}}</p>
        </a>
        
        @endforeach
        
    </div>
</div>