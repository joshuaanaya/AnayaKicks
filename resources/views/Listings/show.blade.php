
<x-layout>
@include('partials._search')

<div class="mx-4">
<x-card class="p-10">
    <div
        class="flex flex-col items-center justify-center text-center"
    >
        <img
            class="h-600 mb-6 -mt-6"
            src="{{$listing->logo ? asset('storage/app/public/' . $listing->logo) : asset('images/no-image.png')}}"
            alt=""
        />

        <h2 class="text-3xl mb-2">{{$listing->title}}</h2>
        <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
        
        <div class="text-xl font-bold ">Size: {{$listing->size}}</div>
        <div class="text-lg my-4">
            <i class="fa-solid fa-tint"></i> {{$listing->location}}
        </div>
        <x-listing-tags :tagsCsv="$listing->tags" />
        <div class="border border-gray-200 w-full mt-4 mb-6"></div>
        <div>
            <h3 class="text-3xl font-bold mb-4">
                Description
            </h3>
            <div class="grid text-lg space-y-6 ">
                {{$listing->description}}

                <a 
                    href="mailto:{{$listing->email}}"
                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80 md:w-48 md:justify-self-center"
                    ><i class="fa-solid fa-envelope"></i>
                    Contact Me</a
                >

                <a 
                    href="{{$listing->website}}"
                    target="_blank"
                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80 md:w-48 md:justify-self-center"
                    ><i class="fa-solid fa-globe"></i> Visit
                    Website</a
                >

                <a
                    href="/"
                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80 md:w-48 md:justify-self-center"
                    ><i class="fa-solid fa-chevron-left"></i>
                    Back</a
                >
            </div>
        </div>
        
    </div>
</x-card>
</div>
</main>

</x-layout>