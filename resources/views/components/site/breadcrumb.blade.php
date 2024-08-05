<style>
    .breadcrumb-item>a{
        text-decoration: none;
        color: var(--text-color-primary);
    }
    .breadcrumb-item.active{
        color: black;
        font-weight: 600;
    }
</style>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item" aria-current="page"><a href="{{url("/danh-muc/{$post->category->slug}")}}">{{$post->category->name}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
    </ol>
</nav>