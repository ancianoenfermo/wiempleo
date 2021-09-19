<div>
    <div class="pl-28 sm:block  lg:flex lg:justify-around">
        <div class="rounded-lg bg-gray-100 bg-opacity-50">
            <div class="flex space-x-6">

                {{-- Tipos de Trabajo --}}
                <div class="ml-4 my-3">

                    <label class="block text-xs font-bold ">Tipo de Trabajo</label>
                    <select wire:model="selectedTipoTrabajo" class="cursor-pointer select-nuevo text-xs">
                        @foreach ($tiposTrabajos as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>

                </div>


                {{-- Autonomias --}}
                <div class="ml-2 my-3">
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

                {{-- Provincias --}}
                <div class="ml-2 my-3">
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

                <div class="ml-2 my-3">
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

                <div class="flex  bg-gray-50">

                    <button wire:click="clickBuscar" class="w-48 h-full  text-xl text-indigo-100 transition-colors duration-150
                    bg-indigo-700 rounded-r-md focus:shadow-outline hover:bg-indigo-800">
                    <i class="fas fa-search mr-4"></i>
                    Buscar ofertas
                    </button>
                </div>

            </div>

        </div>
    </div>
</div>

