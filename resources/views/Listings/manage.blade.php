<x-layout>


<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@unless(count($listings) == 0)


    <x-card class='p-10'>
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Shoes
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @foreach($listings as $listing)
                <tr class="border-gray-300">
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="/listings/{{$listing->id}}">
                            {{$listing->title}}
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="/listings/{{$listing->id}}">
                            {{$listing->location}}
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a
                            href="/listings/{{$listing->id}}/edit"
                            class="text-blue-400 px-6 py-2 rounded-xl"
                            ><i
                                class="fa-solid fa-pen-to-square"
                            ></i>
                            <span class="hidden md:inline">Edit</span>
                            </a
                        >
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                    <form method="POST" action="/listings/{{$listing->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="test-red-500"><i class="fa-solid fa-trash"><span class="hidden md:inline">Delete</span></i></button>
                    </form>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        <p><a
            href="/listings/create"
            class=" relative top-5 bg-black py-2 px-5 text-white rounded-lg content-left"
            >Post a Shoe</a
            ></p>
    </x-card>

    @if(1 == auth()->user()->idAdmin)
    <x-card class='p-10'>
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage All Shoes
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                        @foreach($allListings as $allListing)
                            <tr class="border-gray-300">
                            <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >
                                <a href="/listings/{{$allListing->id}}">
                                    {{$allListing->title}}
                                </a>
                            </td>
                            <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >
                                <a href="/listings/{{$allListing->id}}">
                                    {{$allListing->location}}
                                </a>
                            </td>
                            <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >
                                <a
                                    href="/listings/{{$allListing->id}}/edit"
                                    class="text-blue-400 px-6 py-2 rounded-xl"
                                    ><i
                                        class="fa-solid fa-pen-to-square"
                                    ></i>
                                    Edit</a
                                >
                            </td>
                            <td 
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >
                            <form method="POST" action="/listings/{{$allListing->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="test-red-500"><i class="fa-solid fa-trash">Delete</i></button>
                            </form>
                            </td>
                            </tr>
                        @endforeach
            </tbody>
        </table>
    </x-card>
    @endif

@else
<p>No listings found</p>
@endunless

</div>


</x-layout>
