<section class="w-5/6 m-auto mt-10 grid grid-col-1 gap-x-3 gap-y-10 md:grid-cols-2 max-w-6xl items-center mb-20">
    <h1 class="mx-auto max-w-4xl font-display text-5xl font-bold tracking-normal text-white-300 dark:text-gray-300 sm:text-7xl">
        Activities
    </h1>
    <div class="shadow rounded-2xl">
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <div class="relative h-56 overflow-hidden rounded-2xl md:h-96">
                @php
                    $availableImages = [2, 3, 4, 5, 6, 8, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 27, 29, 30];
                @endphp
                @foreach($availableImages as $imageNumber)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/assets/images/pvo-images/{{ $imageNumber }}.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>