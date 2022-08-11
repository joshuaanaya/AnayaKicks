@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-2 left-1/4 md:left-1/3 rounded transform-translate-x-1/2 bg-laravel text-white md:px-50 lg:px-48 py-5">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif