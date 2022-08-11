
<x-layout>
    @foreach ($categories as $category)
        <p>{{$category->name}}</p>
    @endforeach
</x-layout>

