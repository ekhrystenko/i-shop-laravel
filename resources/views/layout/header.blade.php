<a href="#" class="btn-top"><img src="{{asset('img/up.png')}}" alt="Top"></a>

<div class="row">
    <div class="col-lg-12">
        <div class="menu__burger">
            <a class="burger__button"><span class="burger"></span></a>
        </div>
            <div class="main__menu">
                <a href="{{ route('main') }}"><img src="{{ asset('img/rockets.png') }}" class="logo" alt="rocket"></a>
                <ul>
                    <li><span></span><a href="{{ route('main') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
                    </li>
                    <li><span></span><a href="{{ route('feedback') }}"><i class="fa fa-phone" aria-hidden="true"></i>Feedback</a>
                    </li>
                    <li><span></span><a href="{{ route('aboutUs') }}"><i class="fa fa-user" aria-hidden="true"></i>About Us</a>
                    </li>
                    <li><span></span><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart</a>
                    </li>
                    @guest()
                        <li><span></span><a href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i>Sign in</a></li>
                    @endguest
                    @auth()
                        <li><span></span><a href="{{ route('logout') }}" style="color: red"><i
                                    class="fa fa-sign-out-alt"></i>Logout
                                {{--                        <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="user" style="height: 35px; width: 35px; border-radius: 50%; padding-left: 3px">--}}
                            </a></li>
                    @endauth
                    <li><span></span><a href="{{ route('admin.index') }}"><i class=" fa fas fa-user-lock"></i>Admin</a></li>
                </ul>
            </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="cat__menu">
            <ul>
                @if(!$products->isEmpty() && !$categories->isEmpty())
                    <li><a href="{{ route('allProducts') }}"><i class="fa fas fa-list"></i>All Products</a></li>
                @endif
                @foreach($categories as $category)
                    @if(!$category->activeProducts->isEmpty())
                        <li>
                            <a href="{{ route('category', $category->alias) }}">
                                <i class="{{$category->class}}" aria-hidden="true"></i>{{ $category->title }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
