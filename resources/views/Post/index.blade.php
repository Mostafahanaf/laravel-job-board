<x-layout :title="$Pagetitle">
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success! </strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/blog/create"
    class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-Black focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Create</a>
    </div>
    @foreach ($posts as $post)
    <div class="flex justify-between items-centers border border-gray-200 px-4 py-6 my-2">
        <div>
         <h1 class="text-2xl"> <a href="/blog/{{ $post->id }}">{{ $post->title }}</a></h1>
         <p class="text-1xl">{{ $post->author }}</p>
        </div>
        <div>
            <a class="text-yellow-500 hover:text-gray-500" href="/blog/{{ $post->id }}/edit">Edit</a>
            <form method="POST" action="/blog/{{ $post->id }}" onsubmit="return confirm('Are you sure, this cannot be reveresed?') ">
                @csrf
                @method('DELETE')

            <button type="submit" class="text-red-500 hover:text-gray-500">Delete</button>
            </form>
        </div>
    </div>

    @endforeach

    {{ $posts->links() }}

</x-layout>
