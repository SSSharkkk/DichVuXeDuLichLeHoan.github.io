<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>{{$meta_title}}</title>

    
    <meta name="description" content="{!!$meta_desc!!}">
    <meta name="keywords" content="{{$meta_keywords}}">
    <meta name="robots" content="INDEX,FOLLOW"/>
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('public/fontend/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('public/fontend/css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('public/fontend/css/main.css')}}">
    <link  rel="canonical" href="{{$url_canonical}}" />

    
    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link  rel="icon" type="image/x-icon" href="{{asset('public/fontend/images/logo.png')}}" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <div id="top" class="s-wrap site-wrapper">

        <!-- site header
        ================================================== -->
        <header class="s-header">

            <div class="header__top">
                <div class="header__logo">
                    <a class="site-logo" href="{{URL::to('/home')}}">
                        <img src="{{asset('public/fontend/images/logo.png')}}"   alt="Homepage">
                    </a>
                </div>

                <div class="header__search">
    
                    <form role="search" method="post" class="header__search-form" action="{{URL::to('/search')}}">
                      {{ csrf_field() }}
                        <label>
                            <span class="hide-content">Search for:</span>
                            <input type="search" class="header__search-field" placeholder="Nhập Từ Tìm Kiếm" value="" name="keywords" title="Search for:" autocomplete="off">
                        </label>
                        <input type="submit"  class="header__search-submit" value="Search">
                    </form>
{{--         
                    <a href="#0" title="Close Search" class="header__search-close">Close</a> --}}
        
                </div>  <!-- end header__search -->

                <!-- toggles -->
                <a href="#0" class="header__search-trigger"></a>
                <a href="#0" class="header__menu-toggle"><span>Menu</span></a>

            </div> <!-- end header__top -->

            <nav class="header__nav-wrap">

                <ul class="header__nav">
                    <li class="current"><a href="{{URL::to('/home')}}" title="">Home</a></li>
                    <li class="has-children">
                        <a href="#0" title="">Danh Mục</a>
                        <ul class="sub-menu">
                            @foreach ($category as $item=>$cate)
                                
                            <li><a href="{{URL::to('/category-full/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>

                            @endforeach
                      
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#0" title="">Thể Loại</a>
                        <ul class="sub-menu">
                        @foreach ($type as $item=>$type)
                            
                        <li><a href="{{URL::to('/type-full/'.$type->type_id)}}">{{$type->type_name}}</a></li>
                      
                        @endforeach
                        </ul>
                    </li>
                    <li><a href="#" title="">Styles</a></li>
                    <li><a href="#" title="">About</a></li>
                    <li><a href="{{URL::to('/login')}}" title="">Contact</a></li>
                </ul> <!-- end header__nav -->
{{-- 
                <ul class="header__social">
                    <li class="ss-facebook">
                        <a href="https://facebook.com/">
                            <span class="screen-reader-text">Facebook</span>
                        </a>
                    </li>
                    <li class="ss-twitter">
                        <a href="#0">
                            <span class="screen-reader-text">Twitter</span>
                        </a>
                    </li>
                    <li class="ss-dribbble">
                        <a href="#0">
                            <span class="screen-reader-text">Dribbble</span>
                        </a>
                    </li>
                    <li class="ss-pinterest">
                        <a href="#0">
                            <span class="screen-reader-text">Behance</span>
                        </a>
                    </li>
                </ul> --}}

            </nav> <!-- end header__nav-wrap -->
            <div class="music">
                <div class="music-thumb">
                  <img src="https://source.unsplash.com/random" alt="" />
                </div>
                <h3 class="music-name">Beautiful in white</h3>
                <input type="range" name="range" id="range" class="range" />
                <audio src="{{asset('public/fontend/music/lofi1.mp3')}}" id="song" loop></audio>
                <div class="timer">
                  <div class="duration">2:10</div>
                  <div class="remaining">-3:10</div>
                </div>
                
              </div>
            

        </header> <!-- end s-header -->
       @yield('site-content')


        <!-- footer
        ================================================== -->
        <footer class="s-footer">
            <div class="row">
                <div class="column large-full footer__content">
                    <div class="footer__copyright">
                        <span>Chúc Bạn Đọc Vui Vẻ </span> 
                        <span>Design by <a href="https://www.styleshout.com/">Shark</a></span>
                    </div>
                </div>
            </div>

            <div class="go-top">
                <div class="controls">
                    <ion-icon name="infinite-outline" class="play-infinite"></ion-icon>
                    <ion-icon name="play-back" class="play-back"></ion-icon>
                    <div class="play">
                      <div class="player-inner">
                        <ion-icon name="play" class="play-icon"></ion-icon>
                      </div>
                    </div>
                    <ion-icon name="play-forward" class="play-forward"></ion-icon>
                    <ion-icon name="repeat-outline" class="play-repeat"></ion-icon>
                    <a class="smoothscroll" title="Back to Top" href="#top"></a>
                  </div>
            </div>
        </footer>

    </div> <!-- end s-wrap -->


    <!-- Java Script
    ================================================== -->
    <script src="{{asset('public/fontend/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/plugins.js')}}"></script>
    <script src="{{asset('public/fontend/js/main.js')}}"></script>
	
	</body>

</body>