<x-layout>
    <article>
        <h1>{!!$post->title!!}</h1>
        <a href="categories/{{$post->category->id}}">{{$post->category->name}}</a>
        <p>{!!$post->body!!}</p>
    </article>
    <a href="/">Go Back</a>
</x-layout>