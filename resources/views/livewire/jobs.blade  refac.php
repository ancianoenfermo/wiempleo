<div>

    <div wire:init="loadEmpleos" class=" relative">
        {{--<div class=" border-gray-100 border-opacity-50 rounded-lg

            @if (!$showSearch) hidden @endif relative">

            @livewire('filter-jobs')

        </div>
        --}}

        <div class="container bg-withe mx-auto mt-10">
            @if (count($jobs))

                <span class="">
                    Hemos encontrado {{ $jobs->links()->paginator->total() }} ofertas
                </span>


                <div x-data='{openModal:false}' class="mt-10">

                    <div class="px-6 py-3 flex">
                        <x-jet-input class="w-full" placeholder="Escriba que está buscando y pulse ENTER" type=text
                            name="pp" wire:model.defer="search" wire:keydown.enter="search" />

                    </div>

                    @foreach ($jobs as  $job)

                        @if($loop->index != 9999)
                        @php
                            $tt = $loop->index
                        @endphp
                        <x-cardjob :job=$job :index=$tt/>
                        @endif

                    @endforeach
                    {{--<x-cardjob :job=$job />--}}

                    @if ($jobs->hasPages())
                        <div
                            class="bg-gray-50 px-4 py-3 mt-5 mb-5 mr-2 items-center justify-between border-t border-gray-200 sm:px-6">
                            {{ $jobs->links() }}
                        </div>

                    @endif
                    {{-- MODAL --}}
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div x-show='openModal' class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                        aria-modal="true">
                        <div
                            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <!--
        Background overlay, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
      -->
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
                            </div>

                            <!-- This element is to trick the browser into centering the modal contents. -->
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                aria-hidden="true">&#8203;</span>

                            <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
                            <div
                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div
                                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <!-- Heroicon name: outline/exclamation -->
                                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title" x-ref="titulo">
                                                Deactivate account
                                            </h3>
                                            <hr>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500" x-ref="descripcionOferta">
                                                    MI TEXTO
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                                    <button type="button"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                        x-on:click='openModal = false'>
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- FIN MODAL --}}
                </div>





            @else
            <div class="px-6 py-3 flex">
                <x-jet-input class="w-full" placeholder="Escriba que está buscando y pulse ENTER" type=text
                    name="pp" wire:model.defer="search" wire:keydown.enter="search" />

            </div>
                <div class="px-4 py-3 mt-5 ">
                    No existen registros
                </div>


            @endif

            <div wire:loading class="backdrop-filter backdrop-blur-sm absolute inset-x-0  top-0 h-full w-full">
                <div style="color: #283618" class="la-line-scale-pulse-out items-center absolute top-6 left-1/2">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>

        </div>
    </div>

</div>
