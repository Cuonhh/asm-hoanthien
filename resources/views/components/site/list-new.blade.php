<div class="list-news">
    @foreach ($posts as $post) 
    <a class="list-news-item" href="{{url("/tin/{$post->slug}")}}">
        <div class="list-news-images">
            <img src="{{asset($post->image)}}" alt="">
        </div>
        <div class="list-news-content">
            <h3 class="list-news-title">{{$post->title}}</h3>
            <div class="list-news-desc">
                <div class="list-news-desc-top">
                    <span class="list-news-time">
                        {{date_format($post->created_at,"d \\t\\há\\n\\g m \\nă\\m Y")}}
                    </span>
                    <div>
                        <span class="list-news-comment">
                            {{$post->comments->count()}}
                        </span>
                    </div>
                </div>

                <div class="list-news-desc-bottom">
                    <p>
                        {{$post->short_description}}
                    </p>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>