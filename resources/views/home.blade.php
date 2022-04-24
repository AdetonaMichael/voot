
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>VOOT | HOME</title>
    <meta name="description" content="WE are excited to bring to you amazing contents on Education, politics, poems, Culture, Entertainment. Voot Blog is here to serve you update around the world, interesting write ups, mouth watering food recipes that would blow your mind, some many ohter wonderful packages. So, sit back, relax as we serve you right, We hope to see you soon.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="{{ asset('vendor/@fancyapps/fancybox/jquery.fancybox.min.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Favicon-->
    <link rel="icon" href="https://voot.thegeonerds.com/img/voot_favicon.ico" type="image/x-icon"/>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">
      <!-- Main Navbar-->
      <nav class="navbar navbar-expand-lg">
        {{-- <div class="search-area">
          <div class="search-area-inner d-flex align-items-center justify-content-center">
            <div class="close-btn"><i class="icon-close"></i></div>
            <div class="row d-flex justify-content-center">
              <div class="col-md-8">
                <form action="{{ route('home') }}" method="GET" >
                  <div class="form-group">
                    <input type="search" name="search" id="search" placeholder="What are you looking for?">
                    <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div> --}}
        <div class="container">
          <!-- Navbar Brand -->
          <div class="navbar-header d-flex align-items-center justify-content-between">
              <img style="height:50px;" src="{{ asset('img/voot_logo_home.png') }}" alt="voot logo">
            {{-- <!-- Navbar Brand --><a style="color:#670ccd;" href="/" class="ml-2 navbar-brand">The Voot Blog</a> --}}
            <!-- Toggle Button-->
            <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
          </div>
          <!-- Navbar Menu -->
          <div id="navbarcollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="/" class="nav-link ">Home</a>
              </li>
              <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active ">Blog</a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
                            <a class="dropdown-item" href="{{ route('posts.index') }}">
                                My Profile
                           </a>
                           @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            <div class="navbar-text"><a href="#" class="search-btn"><i class="fa fa-spinner" aria-hidden="true"></i></a></div>

          </div>
        </div>
      </nav>
    </header>
    <div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8">
          <div class="container">
            <div class="row">
              @forelse ($posts as $post )
   <!-- post -->
   <div class="post col-xl-6">
    <div class="post-thumbnail"><a href="{{ route('blog.show', $post->id) }}"><img src="{{ $post->image }}" alt="post image" style="height:20rem;" class="img-fluid"></a></div>
    <div class="post-details">
      <div class="post-meta d-flex justify-content-between">
        <div class="date meta-last">{{ $post->published_at }}</div>
        <div class="category"><a href="#">{{ $post->category->name }}</a></div>
      </div><a href="{{ route('blog.show', $post->id) }}">
        <h3 class="h4">{{ $post->title }}</h3></a>
      <p class="text-muted">{{ $post->description }}</p>
      <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
          @if(isset($post->user->image))
          <div class="avatar"><img src="{{ asset('img/avatar.webp') }}" alt="..." class="img-fluid"></div>
          @else
          <div class="avatar"><img src="{{ $post->user->image }}" alt="..." class="img-fluid"></div>
          @endif
          <div class="title"><span></span></div></a>
        <div class="date"><i class="icon-clock"></i>{{ $post->user->created_at }}</div>
        <div class="comments meta-last"><a href="{{ route('blog.show', $post->id) }}#disqus_thread"><i class="icon-comment"></i></a></div>
      </footer>
    </div>
  </div>
              @empty
               <p class="text-center">
                   No results found for query <strong>{{ request()->query('search') }}</strong>
               </p>

              @endforelse
            </div>
            <!-- Pagination -->
            {{-- <nav aria-label="Page navigation example">
              <ul class="pagination pagination-template d-flex justify-content-center">
                <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-left"></i></a></li>
                <li class="page-item"><a href="#" class="page-link active">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-right"></i></a></li>
              </ul>
            </nav> --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        {{ $posts->appends(['search'=>request()->query('search')])->links()}}
                    </div>
                </div>
            </div>
          </div>
        </main>
        <aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <div class="widget search">
            <header>
              <h3 class="h6">Search the Voot Blog</h3>
            </header>
            <form action="{{ route('home') }}" class="search-form" method="GET">
              <div class="form-group">
                <input type="text" name="search" placeholder="What are you looking for?" value="{{ request()->query('search') }}">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
          <!-- Widget [Latest Posts Widget]        -->
          <div class="widget latest-posts">

            <div class="blog-posts"><a href="#">
                <a href="https://www.whogohost.com/host/aff.php?aff=4244&page=hosting" target="_blank">
                    <img src="https://www.whogohost.com/images/affiliates/sh-300-x-600a.png" /></a></div>
          </div>
          <!-- Widget [Categories Widget]-->
          <div class="widget categories">
            <header>
              <h3 class="h6">Categories</h3>
            </header>
            @foreach ($categories as $category )
            <div class="item d-flex justify-content-between"><a href="{{ route('blog.category',$category->id) }}">{{ $category->name }}</a><span>{{ $category->posts->count() }}</span></div>
            @endforeach
          </div>
          <!-- Widget [Tags Cloud Widget]-->
          <div class="widget tags">
            <header>
              <h3 class="h6">Tags</h3>
            </header>
            <ul class="list-inline">
                @foreach ( $tags as $tag )
                <li class="list-inline-item"><a href="{{ route('blog.tag', $tag->id)}}" class="tag">#{{ $tag->name }}</a></li>

            @endforeach
            </ul>
          </div>
        </aside>
      </div>
    </div>
    <!-- Page Footer-->
    <footer class="main-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="logo">
              <h6 class="text-white">The Voot Blog</h6>
            </div>
            <div class="contact-details">
              <p>53 Broadway, Broklyn, NY 11249</p>
              <p>Phone: (020) 123 456 789</p>
              <p>Email: <a href="mailto:info@company.com">Info@vootblog.com</a></p>
              <ul class="social-menu">
                <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fa fa-behance"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="menus d-flex">
              <ul class="list-unstyled">
                <li> <a href="#">My Account</a></li>
                <li> <a href="#">Add Listing</a></li>
                <li> <a href="#">Pricing</a></li>
                <li> <a href="#">Privacy &amp; Policy</a></li>
              </ul>
              <ul class="list-unstyled">
                <li> <a href="#">Our Partners</a></li>
                <li> <a href="#">FAQ</a></li>
                <li> <a href="#">How It Works</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="latest-posts"><a href="#">
                <a href="https://www.whogohost.com/host/aff.php?aff=4244&page=hosting" target="_blank"><img src="https://www.whogohost.com/images/affiliates/unlimited-hosting-336-x-280.png" /></a>
          </div>
        </div>
      </div>
      <div class="copyrights">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                  <p class="text-center">&copy; 2022. All rights reserved. The Voot Blog</p>
                </div>
              </div>
        </div>
      </div>
      <script id="dsq-count-scr" src="//voot.disqus.com/count.js" async></script>
    </footer>
    <!-- JavaScript files-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('vendor/@fancyapps/fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('js/front.js') }}"></script>
  </body>
</html>
