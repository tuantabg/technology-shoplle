<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        @foreach($menus as $key => $menuItem)
            <li class="{{ ($menuItem->slug == 'shop') ? 'dropdown li-fix' : '' }}">
                <a href="{{ $menuItem->slug }}" class="{{ ($key == 0) ? 'active' : '' }}">
                    {{ $menuItem->name }}
                    @if($menuItem->slug == 'shop')
                        <i class="fa fa-angle-down"></i>
                    @endif
                </a>

                @if($menuItem->slug == 'shop')
                    <div class="sub-menu sub-menu-fix">
                        @foreach($categoryLimit as $key => $categoryParent)
                            <ul role="menu">
                                <li><a class="h3" href="#">
                                        {{ $categoryParent->name }}
                                        @if($categoryParent->categoryChildrent->count())
                                            <i class="fa fa-angle-down"></i>
                                        @endif
                                    </a>
                                </li>

                                @include('client.page.home.components.child_menu', ['categoryParent' => $categoryParent])
                            </ul>
                        @endforeach
                    </div>
                @endif
            </li>
        @endforeach

{{--            @foreach($categoryLimit as $key => $categoryParent)--}}
{{--                <li class="dropdown"><a href="#">{{ $categoryParent->name }}<i class="fa fa-angle-down"></i></a>--}}
{{--                    @include('client.page.home.components.child_menu', ['categoryParent' => $categoryParent])--}}
{{--                </li>--}}
{{--            @endforeach--}}


{{--        <li><a href="{{ route('home') }}" class="active">Home</a></li>--}}
{{--        <li><a href="contact-us.html">Contact</a></li>--}}
    </ul>
</div>

