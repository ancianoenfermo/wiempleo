<div>
    <!-- component -->
    @php
        if (!is_null($job->listaTipos)) {
            $tipos = explode('|', $job->listaTipos);
        }
    @endphp

    <article class="my-5  rounded-lg shadow-md bg-gray-50 bg-opacity-50">
        <div class="mt-3 ml-4 flex items-center">
            <div x-data="{ tooltip: false }">
                <div class="flex" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"  >
                    <i class="fas fa-map-marker-alt fill-current text-gray-500 "></i>
                    <p class="font-semibold ml-1 text-red-900 text-xs">{{ $job->localidad }}</p>
                </div>

                <div class="text-xs bg-gray-600 text-gray-100 px-1 absolute rounded mt-1" x-cloak x-show.transition.origin.top="tooltip">
                    {{ $job->provincia }}
                </div>
            </div>
            <span class="mx-3">|</span>

            <div x-data="{ tooltip: false }">
                <div class="flex" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"  >
                    <i class="fas fa-calendar-week fill-current text-gray-500"></i>
                    <p class="text-xs ml-1">{{ \Carbon\Carbon::parse($job->datePosted)->diffForHumans() }}</p>
                </div>

                <div class="text-xs bg-gray-600 text-gray-100 px-1 absolute rounded mt-1" x-cloak x-show.transition.origin.top="tooltip">
                    Publicada el {{ \Carbon\Carbon::parse($job->datePosted)->format('d/m/Y')}}
                </div>
            </div>

            <span class="mx-3">|</span>

            <div x-data="{ tooltip: false }">
                <div class="flex" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"  >
                    <i class="fab fa-internet-explorer fill-current text-gray-500"></i>
                    <span class="text-xs ml-1">{{$job->jobFuente}}</span>
                </div>

                <div class="text-xs bg-gray-600 text-gray-100 px-1 absolute rounded mt-1" x-cloak x-show.transition.origin.top="tooltip">
                    web www.agro.com
                </div>
            </div>

            <div class="ml-8" x-data="{ tooltip: false }">
                <div class="flex" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"  >
                    <button
                    class="px-1 text-xs text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800 justify-end"
                    onclick="window.open('{{ $job->jobUrl }}')">
                    <span class="ml-2 text-xs">Ir a la oferta</span>
                </button>
                </div>

                <div class="text-xs bg-gray-600 text-gray-100 px-1 absolute rounded mt-1" x-cloak x-show.transition.origin.top="tooltip">
                   Abre
                </div>
            </div>



            @isset($tipos)
                <div >
                    @foreach ($tipos as $tipo)
                        <span class="px-2 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                            {{ $tipo }}
                        </span>
                    @endforeach
                </div>
            @endisset
        </div>





        <div class="justify-left flex">
            <div class="flex-1 ">
                <div class="flex items-center">
                    <div>
                        <h2 class="mt-3 ml-4 text-lg font-bold tracking-wide">
                            {{$job->title}}
                        </h2>
                    </div>




                    <button  class="flex items-center justify-center mt-3 px-3 "
                    x-on:click="openModal = true;
                    $refs.descripcionOferta.innerHTML = '{{addslashes($job->excerpt)}}';
                    $refs.titulo.innerHTML = '{{addslashes($job->title)}}'
                    "
                    >
                    <i class="fa fa-search-plus my-2" style="color:blue"></i>
                   </button>

                </div>



                <div class="mt-3 ml-3 mb-3">

                    @isset($job->contrato)
                        <span class="mr-4 items-center justify-center text-base font-bold leading-none text-black">
                            <strong>Contrato:</strong>
                            <span class="font-semibold">{{ $job->contrato }}</span>
                        </span>
                    @endisset
                    @isset($job->jornada)
                        <span class="mr-4 items-center justify-center text-base font-bold leading-none text-black ">
                            <strong>Jornada:</strong>
                            <span class="px-1 font-semibold">{{ $job->jornada }}</span>
                        </span>
                    @endisset
                    @isset($job->salario)
                        <span class="mr-4 items-center justify-center px-2  text-base font-bold leading-none text-black">
                            <strong>Salario:</strong>
                            <span class="px-1 font-semibold">{{ $job->salario }}</span>
                        </span>
                    @endisset
                    @isset($job->vacantes)
                        <span class="mr-4 items-center justify-center px-2  text-base font-bold leading-none text-black">
                            <strong>Vacantes:</strong>
                            <span class="px-1 font-semibold">{{ $job->vacantes }}</span>
                        </span>
                    @endisset
                    @isset($job->experiencia)
                        <span class="mr-4 items-center justify-center px-2  text-base font-bold leading-none text-black ">
                            <strong>Experiencia:</strong>
                            <span class="px-1 font-semibold">Requerida</span>
                        </span>
                    @endisset

                </div>

            </div>

        </div>



    </article>
</div>


