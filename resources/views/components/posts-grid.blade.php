@props(['posts'])
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