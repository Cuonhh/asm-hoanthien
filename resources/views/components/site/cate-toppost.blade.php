@foreach ($data as $value)
<a class="topPosts-post-1" href="{{url("/tin/{$value->slug}")}}">
    <img src="{{asset($value->image)}}" alt="" class="topPosts-1-img">
    <div class="topPosts-left-content">
        <h6>{{$value->title}}</h6>
    </div>
</a>    
@endforeach