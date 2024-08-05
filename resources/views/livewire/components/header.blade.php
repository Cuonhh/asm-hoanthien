<div x-data={openMenu:false}>
    <header class="header">
        <div class="container">
            <div class="header-wrapper">
                <div class="header-menu-mobile" x-on:click="openMenu = true">
                    <i class="bi bi-list"></i>
                </div>

                <div class="header-left">
                    <a class="header-logo">
                        <img src="{{ asset($logo) }}" alt="">
                    </a>
                    <ul class="header-list">
                        <li class="header-item">
                            <a href="/">Trang chủ</a>
                        </li>
                        <li class="header-item">
                            <a href="/lien-he">Liên hệ</a>
                        </li>
                        <li class="header-item">
                            <a href="#">Hỗ trợ</a>
                        </li>
                    </ul>
                </div>
                <div class="header-mxh">
                    <a href="#" class="header-mxh-item">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="header-mxh-item">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <div class="header-mxh-item position-relative">
                        <a href="">
                            @if (Auth::check())
                                <div class="comment-item-avata">
                                    <img src="{{ asset(Auth::user()->avatar) }}" alt="">
                                </div>
                            @else
                                <i class="bi bi-person-circle"></i>
                            @endif

                        </a>
                        <ul class="menu-account">
                            @if (Auth::check())
                                <li class="menu-account-item">
                                    <a href="{{ url('/account') }}">Quản lý tài khoản</a>
                                </li>
                                @if (Auth::user()->role === 0 || Auth::user()->role === 2)
                                    <li class="menu-account-item">
                                        <a href="/admin">Admin</a>
                                    </li>
                                @endif
                                <li class="menu-account-item">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="menu-account-btn" type="submit">Thoát</button>
                                    </form>
                                </li>
                            @else
                                <li class="menu-account-item">
                                    <a href="/login">Đăng nhập</a>
                                </li>
                                <li class="menu-account-item">
                                    <a href="/register">Đăng ký</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <button class="header-search-btn-top header-search-btn">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </header>
    <div class="menu-mobile" x-show="openMenu" x-transition>
        <ul class="menu-mobile-list">
            <li class="menu-mobile-item">
                <a href="#">Tin tức</a>
            </li>
            <li class="menu-mobile-item">
                <a href="#">Giftcode</a>
            </li>
            <li class="menu-mobile-item">
                <a href="#">Khám phá</a>
            </li>
            <li class="menu-mobile-item">
                <a href="#">Công nghệ</a>
            </li>
        </ul>
        <div class="menu-mobile-close" x-on:click="openMenu = false">
            <i class="bi bi-x-circle"></i>
        </div>
    </div>

    <nav class="container header-nav">
        <div class="header-cate">
            <ul class="header-cate-list">
                @foreach ($categories as $item)
                    <li class="header-cate-item">
                        <a href="{{ url("/danh-muc/{$item->slug}") }}">{{ $item->name }}</a>
                    </li>
                @endforeach

            </ul>

            <div class="header-search" x-data="{ search: false }">
                <button class="header-search-btn" x-on:click="search=!search">
                    <i class="bi bi-search"></i>
                </button>

                <div class="header-search-wrapper" x-show="search" x-transition>
                    <div class="header-search-top">
                        <input type="text" placeholder="Search..." wire:model="search" />
                        <button>Tìm kiếm</button>
                    </div>
                    <hr>
                    <div class="header-search-bottom">
                        {{-- <a class="header-search-content" href="#">
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
                        </a> --}}
                        @foreach ($searchdata as $value)
                            <a class="header-search-content" href="{{ url("/tin/{$value->slug}") }}">
                                <img src="{{ asset("{$value->image}") }}" alt="">
                                <span>
                                    {{ $value->title }}
                                </span>
                            </a>
                        @endforeach
                        {{-- <div class="text-center" wire:loading>
                            <div class="spinner-border text-success text-center" role="status" >
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
