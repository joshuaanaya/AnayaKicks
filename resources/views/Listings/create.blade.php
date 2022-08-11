<x-layout>
<x-card class="p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            List your show
        </h2>
        <p class="mb-4">Post a shoe you like or are looking for</p>
    </header>

    <form method="POST" action="/listings" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label
                for="company"
                class="inline-block text-lg mb-2"
                >Brand</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="company"
                value="{{old('company')}}"
                placeholder="Example: Nike, Adidas, New Balance, etc"
            />

            @error('company')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2"
                >Model</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="title"
                placeholder="Dunk Low, Jordan 1, 350 V2, etc"
                value="{{old('title')}}"
            />
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="location"
                class="inline-block text-lg mb-2"
                >Colorway/Nickname</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="location"
                placeholder="Example: Valor Blue, Phillies, Safari, etc"
                value="{{old('location')}}"
            />
            @error('location')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="size"
                class="inline-block text-lg mb-2"
                >Size</label
            >
            <select id="size" name="size" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded 
            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
            dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <?php
            //listing size          
            for ($s = 1; $s <=15; $s=$s+.5) {
                echo "<option value='$s'>$s</option>";
            }
            ?>
            </select>

            @error('size')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="website"
                class="inline-block text-lg mb-2"
            >
                Listing/Where to buy
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="website"
                value="{{old('website')}}"
                placeholder="Ebay or Retailer link"
            />

            @error('website')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

        </div>

        {{-- <div class="mb-6">
            <label for="tags" class="inline-block text-lg mb-2">
                Tags (Comma Separated)
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="tags"
                placeholder="Example: Nike, Dunk Low, Phillies, Valor Blue"
                value="{{old('tags')}}"
            />

            @error('tags')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div> --}}

        <div class="mb-6">
            <label for="logo" class="inline-block text-lg mb-2">
                Shoe Image
            </label>
            <input
                type="file"
                class="border border-gray-200 rounded p-2 w-full"
                name="logo"            
            />
            @error('logo')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="description"
                class="inline-block text-lg mb-2"
            >
                Shoe Description
            </label>
            <textarea
            
                class="border border-gray-200 rounded p-2 w-full"
                name="description"
                
                rows="4"
                placeholder="Include size, condition, unique identifiers, etc"
                
            >
            {{old('description')}}
            </textarea>

            @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
            ><i class="fa fa-save"></i>
                Save Shoe
            </button>

            <a
                    href="/"
                    class="bg-black text-white py-2 px-4 rounded hover:opacity-80"
                    ><i class="fa-solid fa-chevron-left"></i>
                    Back</a
                >
        </div>
    </form>
</x-card>
</x-layout>