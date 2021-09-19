<x-app-layout>
    <section>
        <div class="mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-10">
            <div class="flex">
                <div class=flex-1>
                    <h1 class="pb-6  text-3xl md:text-4xl lg:text-6xl font-extrabold text-black tracking-wider leading-loose ">¿Estás buscando empleo?</h1>
                   <span class="">IMFORMATE SOBRE</span>
                    <ul class="ml-4">
                        <li>Cursos gratuitos para desempleados</li>
                        <li>Cursos gratuitos para ocupados</li>
                        <li>Contratos de formación y apredizaje</li>
                        <li>Certificados de profesionalidad</li>
                    </ul>

                </div>
                <div class="flex items-center ml-10">
                    <div class="bg-gray-100 border-2 rounded-lg shadow-lg">
                        <div class="container mx-auto text-center px-4 py-6">
                            <h2 class="text-2xl md:text-4xl font-medium">Ofertas de trabajo</h2>
                            <p class="mt-3">Ofertas publicadas en España en los últimos treinta días</p>


                            <div class="flex items-center justify-center mt-4">
                                <a class="text-mx text-center font-extrabold text-white transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                                href="{{Route('ofertas')}}"><span class=" flex mx-5 py-1 ">Ver todas las ofertas</span>
                                </a>
                            </div>
                        </div>
                      </div>
                </div>
                <!-- component -->
            </div>

    </section>

    <section class="bg-white pb-4">
        <h1 class="text-gray-600 text-center text-3xl mb-6 pt-10 ">FORMACIÓN PARA EL EMPLEO</h1>
        <div
            class="mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>

                    <a href="#">
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('storage/img/home/img1.jpg') }}" alt="">
                    </a>
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Formación gratuita para desempleados</h1>

                    <p class="text-sm text-gray-500">100% Subvencionados por el Ministerio de Trabajo, Migraciones y Seguridad Social

                    </p>

                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('storage/img/home/img2.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Formación gratuita para ocupados</h1>
                    <p class="text-sm text-gray-500">Pensados para responder a las necesidades formativas de un trabajador en activo.</p>

                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('storage/img/home/img3.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Contratos de Formación y apredizaje</h1>
                    <p class="text-sm text-gray-500">Cualificación profesional de los trabajadores, en un régimen de alternancia de actividad laboral retribuida en una empresa, con actividad formativa</p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('storage/img/home/img4.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Certificados de Profesionalidad</h1>
                    <p class="text-sm text-gray-500">Instrumento de acreditación oficial de las cualificaciones profesionales del Catálogo Nacional de Cualificaciones Profesionales en el ámbito de la administración laboral</p>
                </header>
            </article>
        </div>
    </section>
    <section class="bg-gray-100">
        <h1 class="text-gray-600 text-center text-3xl mb-6 pt-10 ">OFERTAS DE TRABAJO EN ESPAÑA</h1>
        <div
            class="mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('storage/img/home/Discapacidad.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Trabajos para personas con <strong>discapacidad</strong></h1>

                    <p class="text-sm text-gray-500">100% Subvencionados por el Ministerio de Trabajo, Migraciones y Seguridad Social

                    </p>

                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('storage/img/home/Practicas.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Trabajos en <strong>prácticas</strong></h1>
                    <p class="text-sm text-gray-500">Pensados para responder a las necesidades formativas de un trabajador en activo.</p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('storage/img/home/Teletrabajo.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Trabajos con <strong>teletrabajo</strong></h1>
                    <p class="text-sm text-gray-500">Cualificación profesional de los trabajadores, en un régimen de alternancia de actividad laboral retribuida en una empresa, con actividad formativa</p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('storage/img/home/Todoteletrabajo.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Trabajos <strong>100% teletrabajo</strong></h1>
                    <p class="text-sm text-gray-500">Instrumento de acreditación oficial de las cualificaciones profesionales del Catálogo Nacional de Cualificaciones Profesionales en el ámbito de la administración laboral</p>
                </header>
            </article>
        </div>
    </section>
</x-app-layout>
