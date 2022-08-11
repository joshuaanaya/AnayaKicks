
<section
class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
>
<div
    class="absolute top-0 left-0 w-full h-full opacity-50 bg-center"
    style="background-image: url('images/sneaker.jpg')"
>

</div>

<div class="z-10">
    
    <p class="absolute -my-20 top-1/2 left-1/2 md:h-1/4 md:w-1/4 -translate-x-1/2 -translate-y-1/2">
        <img class=""src="{{asset('images/Anayakicks_Logo.png')}}" alt="">
        
    </p>
    <p class="text-2xl text-gray-200 font-bold md:my-20 absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-5/8">
        Find your sneakers
        @auth
        <a
        href="/listings/create"
        class="inline-block md:absolute top-10 left-5 bg-black py-2 px-5 text-white rounded-lg content-center"
        >Post a Shoe</a
        >
        @endauth
    </p>
    

</div>

</section>
