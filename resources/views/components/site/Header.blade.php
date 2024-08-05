<header class="header">
    <div class="container">
        <div class="header-wrapper">
            <div class="header-left">
                <a class="header-logo">
                    <img src="http://mauweb.monamedia.net/gamehub/wp-content/uploads/2019/04/logo-mona-300x75.png" alt="">
                </a>
                <ul class="header-list">
                    <li class="header-item">
                        <a href="#">Tin tức</a>
                    </li>
                    <li class="header-item">
                        <a href="#">Giftcode</a>
                    </li>
                    <li class="header-item">
                        <a href="#">Khám phá</a>
                    </li>
                    <li class="header-item">
                        <a href="#">Công nghệ</a>
                    </li>
                </ul>
            </div>
            <div class="header-mxh">
                <a href="#" class="header-mxh-item">
                    <i class="bi bi-facebook"></i>
                </a>
                <div class="header-mxh-item">
                    <a href=""><i class="bi bi-person-circle"></i></a>
                    
                </div>
            </div>

        </div>
    </div>
</header>
<nav class="container header-nav">
    <div class="header-cate">
        <ul class="header-cate-list">
            <li class="header-cate-item">
                <a href="">Game online</a>
            </li>
            <li class="header-cate-item">
                <a href="">Game online</a>
            </li>
            <li class="header-cate-item">
                <a href="">Game online</a>
            </li>
            <li class="header-cate-item">
                <a href="">Game online</a>
            </li>
        </ul>

        <div class="header-search" x-data="{search: false}">
            <button class="header-search-btn" x-on:click="search=!search">
                <i class="bi bi-search"></i>
            </button>

            <div class="header-search-wrapper" x-show="search" x-transition>
                <div class="header-search-top">
                    <input type="text" placeholder="Search..." wire:model='search' />
                    <button>{{$search}}</button>
                </div>
                <hr>
                <div class="header-search-bottom">
                    <a class="header-search-content" href="#">
                        <img src="https://images.unsplash.com/photo-1657653462746-b4f36e2775e2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw1fHx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
                        <span>
                            Tiêu đề bài viết
                        </span>
                    </a>
                    <a class="header-search-content" href="#">
                        <img src="https://images.unsplash.com/photo-1657653462746-b4f36e2775e2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw1fHx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
                        <span>
                            Tiêu đề bài viết
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>