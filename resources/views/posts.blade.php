
<x-layout>
    @foreach ($posts as $post)
    {{-- @dd($loop) --}}
        <article>
            <a href="posts/{{$post->slug}}"><h1>{!!$post->title!!}</h1></a>
            <a href="#">{{$post->category->name}}</a>
            <div>{{$post->excerpt}}</div>
        </article>
    @endforeach
</x-layout>

