<div>

    <div class="px-28 sm:block bg-gray-50 py-3 lg:flex lg:justify-around">
        <div class="border-2 rounded-lg">
            <div class=" flex flex mx-4 my-4">
                {{-- Tipos de Trabajo --}}
                <div>

                    <label class="block text-xs font-bold ">Tipo de Trabajo</label>
                    <select wire:model="selectedTipoTrabajo" class="cursor-pointer select-nuevo text-xs">
                        @foreach ($tiposTrabajos as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>

                </div>


                {{-- Autonomias --}}
                <div class="ml-2">
                    <label class="block text-xs font-bold">Autonomía</label>
                    <select wire:model="selectedAutonomia"
                    wire:loading.class="animate-pulse cursor-wait"
                    wire:target="selectedTipoTrabajo"
                    class="select-nuevo cursor-pointer text-xs">
                        <option value="todas">Todas las Autonomias</option>
                        @foreach ($autonomias as $item)
                            <option value="{{ $item->id}}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex mx-4 my-4">
                {{-- Provincias --}}
                <div>
                    <label class="block font-bold text-xs ">Provincia</label>
                    <select wire:model="selectedProvincia"
                    wire:loading.class="animate-pulse cursor-wait"
                    wire:target="selectedAutonomia"
                    @if (is_null($provincias))
                    class="select-nuevo cursor-not-allowed text-xs"
                    disabled>
                    @else
                    class="select-nuevo cursor-pointer text-xs">
                    @endif

                        <option value="todas">Todas las Provincias</option>
                        @if (!is_null($provincias))
                            @foreach ($provincias as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>


                {{-- Localidades --}}

                <div class="ml-2">
                    <label class="block text-xs font-bold">Localidad</label>
                    <select wire:model="selectedLocalidad"
                    @if (is_null($localidades))
                        disabled
                        class ="select-nuevo cursor-not-allowed text-xs"
                    @else
                        class ="select-nuevo cursor-pointer text-xs "
                    @endif
                        wire:loading.class="animate-pulse cursor-wait" wire:target="selectedProvincia">
                        <option value="todas">Todas las Localidades</option>
                        @if (!is_null($localidades))
                            @foreach ($localidades as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @endif
                    </select>

                </div>
            </div>
            <div class="flex justify-center items-center bg-gray-50">
                <button wire:click="clickBuscar" class="w-48 h-8 px-4 mt-2 mb-3 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">Buscar ofertas</button>
            </div>

        </div>

    </div>


</div>

