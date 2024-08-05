<aside class="sidebar mb-4">
    <h4 class="sidebar-title">
        <span>
            {{$titleSidebar}}
        </span>
    </h4>
    <ul class="sidebar-list">
        @foreach ($data as $value)    
        <li class="sidebar-item">
            <a href="{{url("/tin/{$value->slug}")}}">{{$value->title}}</a>
        </li>
        @endforeach
        
    </ul>
</aside>