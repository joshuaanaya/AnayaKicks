@props(['listing'])

<x-card>
    <div class="flex flex-col md:flex-row items-center justify-center text-center md:flex">
        <a href="/listings/{{$listing->id}}">
            <img
                class="object-scale-down h-48 w-48 mr-6 md:block "
                src="{{$listing->logo ? asset('storage/app/public/'. $listing->logo) : asset('/images/no-image.png')}}"
                alt=""
            />
        </a>
        <div >
            <h3 class="text-2xl">
                <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}
                <x-listing-tags :tagsCsv="$listing->tags" />
            </div>
                
            <div class="text-lg mt-4">
                <i class="fa-solid fa-tint"></i> {{$listing->location}}
            </div>
        </div>
    </div>
</x-card>