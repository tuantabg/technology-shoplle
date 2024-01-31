@if($categoryParent->categoryChildrent->count())
    @foreach($categoryParent->categoryChildrent as $categoryChild)
        <li><a href="{{ $categoryChild->slug }}">{{ $categoryChild->name }}</a>
            @if($categoryChild->categoryChildrent->count())
                @include('client.page.home.components.child_menu', ['categoryParent' => $categoryChild])
            @endif
        </li>
    @endforeach
@endif
