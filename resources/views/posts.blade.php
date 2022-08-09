
<x-layout>
    @foreach ($posts as $post)
    {{-- @dd($loop) --}}
        <article>
            <a href="posts/{{$post->slug}}"><h1>{{$post->title}}</h1></a>
            <p>{{$post->excerpt}}</p>
        </article>
    @endforeach
</x-layout>

