
<x-layout>
    {{-- @foreach ($posts as $post) --}}
    {{-- @dd($loop) --}}
        {{-- <article>
            <a href="posts/{{$post->slug}}"><h1>{!!$post->title!!}</h1></a>
            <p>By <a href="authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="categories/{{$post->category->id}}">{{$post->category->name}}</a></p>
            <div>{{$post->excerpt}}</div>
        </article> --}}
    {{-- @endforeach --}}
        @include('_posts-header')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if ($posts->count())
                <x-post-featured-card :post="$posts[0]"></x-post-featured-card>
                {{-- @php
                    dd($posts[1]->category->id)
                @endphp --}}
                @if ($posts->count()>1)
                    <div class="lg:grid lg:grid-cols-6">
                        @foreach ($posts->skip(1) as $post)
                        <x-post-card class="{{$loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}" :post="$post"/>
                        @endforeach
                    </div>
                @endif

            @else
            <p class="text-center">No post yet.. please check back later</p>
            @endif


            {{-- <div class="lg:grid lg:grid-cols-3">
                <x-post-card></x-post-card>
                <x-post-card></x-post-card>
                <x-post-card></x-post-card>
            </div> --}}
        </main>
</x-layout>

