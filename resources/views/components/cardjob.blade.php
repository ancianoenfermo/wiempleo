<div>
    <article class="my-10  rounded-lg shadow-md bg-gray-50 bg-opacity-50">
        <!-- LINEA 1 -->
        <div class="pt-5 ml-4 flex items-center ">
            <!-- Localidad -->
            <div x-data="{ tooltip: false }">
                <div class="flex" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"  >
                    <i class="fas fa-map-marker-alt fill-current text-gray-500 "></i>
                    <p class="font-semibold ml-1 text-red-900 text-xs">{{ $job->localidad }}</p>
                </div>
                <div class="text-xs bg-gray-600 text-gray-100 px-1 absolute rounded mt-1" x-cloak x-show.transition.origin.top="tooltip">
                    Provincia: {{ $job->provincia }}
                </div>
            </div>

            <span class="mx-3">|</span>

            <!-- Fecha de Publicación -->
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

            <!-- Web editor -->
            <div x-data="{ tooltip: false }">
                <div class="flex" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false">
                    <i class="fab fa-internet-explorer fill-current text-gray-500"></i>
                    <span class="text-xs ml-1">{{$job->jobFuente}}</span>
                </div>

                <div class="text-xs bg-gray-600 text-gray-100 px-1 absolute rounded mt-1" x-cloak x-show.transition.origin.top="tooltip">
                    web www.agro.com
                </div>
            </div>

            <!-- Tipos -->
            @php
                if (!is_null($job->listaTipos)) {
                    $tipos = explode('|', $job->listaTipos);
                }
            @endphp


            @isset($tipos)
                <div class="flex flex-1 justify-center" >
                    @foreach ($tipos as $tipo)
                        <div>
                            <span class="text-xs items-center font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $tipo }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @endisset

            <!-- Ir a la Oferta -->
            <div class="  flex-1 flex justify-end" x-data="{ tooltip: false }">
                <div class="flex" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"  >
                    <button
                    class="mr-8 px-2 text-base text-indigo-100  bg-indigo-700 rounded-lg    justify-end"
                    onclick="window.open('{{ $job->jobUrl }}')">
                    <span class="ml-2 text-xs">Ir a la oferta</span>
                    </button>
                </div>

                <div class="text-xs bg-gray-600 text-gray-100 px-1 absolute rounded mt-1" x-cloak x-show.transition.origin.top="tooltip">
                   Abre la oferta en una pestaña nueva
                </div>
            </div>
        </div>

        <!-- LINEA 1 -->

        <div class="flex">
            <!-- Titulo de la Oferta -->
            <div>
                <h2 class="mt-3 ml-4 text-2xl font-bold tracking-wide">
                    {{$job->title}}
                </h2>
            </div>

            <!-- Icono descripción de la Oferta -->
            <div class="ml-8" x-data="{ tooltip: false }">
                <div class="flex">
                    <button  class="flex items-center justify-center mt-3 px-3"
                        x-on:click="$dispatch('modal', { openModal: 'true',titulo: '{{$job->title}}', mensaje: '{{$job->excerpt}}' })">
                        <i class="fa fa-search-plus my-2" style="color:blue"></i>
                    </button>
                </div>
            </div>




        </div>

    </article>
</div>


