<x-app-layout>
    <div class="my-4" x-data='{totalOfertas:""}' >
        <h1 class="text-4xl text-center">
            EMPLEO EN ESPAÑA
        </h1>

    </div>
    <section>
        <div class="px-4 sm:px-6 lg:px-8  bg-gray-50">

            @livewire('filter-jobs')

        </div>
    </section>

    <section class="bg-white">
        <div class="">
            @livewire('jobs')
        </div>
    </section>


</x-app-layout>

{{-- style="background-image: url({{asset('img/home/portada.jpg')}})"> --}}
{{-- Sacar y actiave en jobs-blade despues de prurbas
<div>
    @livewire('filter-jobs')

</div>
toltipPublicada.addEventListener('mouseleave',
            () =>{
                console.log("Sale Mouse")
            })


 --}}


 {{--
<div class="flex-1">

                <h1 class="">
                   @livewire('cabecera-ofertas')
                </h1>

            </div>



--}}
