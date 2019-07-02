<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container py-4">
    <!-- ブランド表示 -->
    <a class="navbar-brand" href="{{ route('home') }}">Handmade shop</a>
 
    <!-- スマホやタブレットで表示した時のメニューボタン -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 
    <!-- メニュー -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- 左寄せメニュー -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact') }}">お問い合わせ</a>
        </li>
      </ul>
 
      <!-- 右寄せメニュー -->
      <ul class="navbar-nav">
        @guest
          <!-- ログインしていない時のメニュー -->
          <!-- カート -->
          <li class="nav-item">
            <a class="nav-link" href="/cart"><i class="fas fa-shopping-cart"></i></a>
          </li>
          <li class="nav-item">
            {{-- ②  --}}
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            {{-- ③ --}}
            <a class="nav-link" href="{{ route('register') }}">新規登録</a>
          </li>
        @else
          <!-- ログインしている時のメニュー -->
          
          <!-- カート -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('getOrders') }}"><i class="fas fa-shopping-cart"></i></a>
          </li>
          
          <!-- マイページ -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('mypage') }}"><i class="fas fa-user"></i></a>
          </li></a>
          </li>
 
          <!-- ドロップダウンメニュー -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{-- ⑤ --}}
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
 
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              {{-- ⑥ --}}
              <a class="dropdown-item" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
              >
                Logout
              </a>
              {{-- ⑦ --}}
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>