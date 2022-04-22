<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Voot | {{ $post->title }}</title>
    <meta name="description" content="{{ $post->description }}">
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
    <link rel="stylesheet" href="{{ asset('css/show_card.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Favicon-->
    <link rel="icon" href="https://voot.thegeonerds.com/img/voot_favicon.ico" type="image/x-icon"/>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MVL2LTBNEM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MVL2LTBNEM');
</script>
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
                <form action="#">
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
            <img style="height:50px;" src="{{ asset('img/voot_logo_home.png') }}" alt="voot logo" >
            {{-- <!-- Navbar Brand --><a style="color:#670ccd;" href="/" class="ml-2 navbar-brand">The Voot Blog</a> --}}
            <!-- Toggle Button-->
            <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
          </div>
          <!-- Navbar Menu -->
          <div id="navbarcollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="/" class="nav-link ">Home</a>
              </li>
              <li class="nav-item"><a href="{{ route('home') }}" class="nav-link ">Blog</a>
              </li>
              <li class="nav-item"><a href="post.html" class="nav-link active ">Post</a>
              </li>
              <li class="nav-item"><a href="#" class="nav-link ">Contact</a>
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
                            <a class="dropdown-item" href="{{ route('posts.index') }}">
                                My Profile
                           </a>
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
        <main class="post blog-post col-lg-8">
          <div class="container">
            <div class="post-single">
              <div class="post-thumbnail"><img src="{{ $post->image }}" alt="..." class="img-fluid"></div>
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                  <div class="category"><a href="#">Business</a><a href="#">Financial</a></div>
                </div>
                <h1>{{ $post->title }}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="{{ $post->user->image }}" alt="..." class="img-fluid"></div>
                    <div class="title"><span>{{ $post->user->name }}</span></div></a>
                  <div class="d-flex align-items-center flex-wrap">
                    <div class="date"><i class="icon-clock"></i>{{ $post->published_at }}</div>
                    {{-- <div class="views"><i class="icon-eye"></i> 500</div> --}}
                    <div class="comments meta-last"><a href="{{ route('posts.show', $post->id) }}#disqus_thread"><i class="icon-comment"></i></a></div>

                  </div>
                </div>
                <div class="post-body">
                 {!! $post->content !!}
                </div>
                <div class="post-tags">
                    @foreach ($post->tags as $tag)
                    <a href="#" class="tag">#{{ $tag->name }}</a>
                    @endforeach

                </div>
                <div class="container mt-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-7">
                            <div class="card p-3 py-4">
                                <div class="text-center"> <img src="{{ $post->user->image }}" width="100" class="rounded-circle"> </div>
                                <div class="text-center mt-3"> <span class="bg-secondary p-1 px-4 rounded text-white">About</span>
                                    <h5 class="mt-2 mb-0">{{ $post->user->firstname. " ". $post->user->lastname }}</h5> <span>{{ $post->user->stack }}</span>
                                    <div class="px-4 mt-1">
                                        <p class="fonts">{{ $post->user->about }} </p>
                                    </div>
                                    <ul class="social-list">
                                        <li><a href="{{ $post->user->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="{{ $post->user->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="{{ $post->user->linkdin }}"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="post-comments">
                  <header>
                    <h3 class="h6">Post Comments</h3>
                  </header>
                  <div id="disqus_thread"></div>
                  <script>
                      /**
                      *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                      *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                      /*
                      var disqus_config = function () {
                      this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                      this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                      };
                      */
                      (function() { // DON'T EDIT BELOW THIS LINE
                      var d = document, s = d.createElement('script');
                      s.src = 'https://voot.disqus.com/embed.js';
                      s.setAttribute('data-timestamp', +new Date());
                      (d.head || d.body).appendChild(s);
                      })();
                  </script>
                  <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
              </div>
            </div>
          </div>
        </main>
        <aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <div class="widget search">
            <header>
              <h3 class="h6">Search the blog</h3>
            </header>
            <form action="#" class="search-form">
              <div class="form-group">
                <input type="search" placeholder="What are you looking for?">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
          <!-- Widget [Latest Posts Widget]        -->
          <div class="widget latest-posts">

            <div class="blog-posts"><a href="#">
                <a href="https://www.whogohost.com/host/aff.php?aff=4244&page=hosting" target="_blank">
                    <img src="https://www.whogohost.com/images/affiliates/sh-300-x-600a.png" /></a>
            </div>
          </div>
          <!-- Widget [Categories Widget]-->
          <div class="widget categories">
            <header>
              <h3 class="h6">Categories</h3>
            </header>
            @foreach ($categories as $category)
            <div class="item d-flex justify-content-between"><a href="#">{{ $category->name }}</a><span>{{ $category->posts->count() }}</span></div>
            @endforeach

          </div>
          <!-- Widget [Tags Cloud Widget]-->
          <div class="widget tags">
            <header>
              <h3 class="h6">Tags</h3>
            </header>
            <ul class="list-inline">
                @foreach ($tags as $tag)
                <li class="list-inline-item"><a href="#" class="tag">{{ $tag->name }}</a></li>
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
              <h6 class="text-white">Voot Blog</h6>
            </div>
            <div class="contact-details">
              <p>53 Broadway, Broklyn, NY 11249</p>
              <p>Phone: (020) 123 456 789</p>
              <p>Email: <a href="mailto:info@company.com">Info@Company.com</a></p>
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
