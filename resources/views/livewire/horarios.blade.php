<div>
    <div class='max-w-7x1 mx-auto px-4 sm:px-6 lg:px-8 py-12'>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table>

            <div class="px-6 py-4 flex items-center">
                {{-- <input type="text" wire:model='search'> --}}
                <x-jet-input class='flex-1 mr-4' placeholder="Escriba que quiere buscar" type="text" wire:model='search' />
                {{--@livewire('create-horario')--}}
                <x-jet-danger-button wire:click="save{{$tipojornada}}">
                    crear nueva jornada
                </x-jet-danger-button>
            </div>

            @if ($jornadas->count())

                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class=" w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click='order("id")'>
                                id
                                {{-- sort --}}
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class='fas fa-sort-alpha-up-alt float-right mt-1'></i>
                                    @else
                                        <i class='fas fa-sort-alpha-down-alt float-right mt-1'></i>
                                    @endif
                                @else
                                    <i class='fas fa-sort float-right mt-1'></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click='order("tipojornada")'>
                                Jornada
                                {{-- sort --}}
                                @if ($sort == 'tipojornada')
                                    @if ($direction == 'asc')
                                        <i class='fas fa-sort-alpha-up-alt float-right mt-1'></i>
                                    @else
                                        <i class='fas fa-sort-alpha-down-alt float-right mt-1'></i>
                                    @endif
                                @else
                                    <i class='fas fa-sort float-right mt-1'></i>
                                @endif
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($jornadas as $item)
                            <tr>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">{{ $item->id }}</div>
                                </td>
                                <td class="px-6 py-4 w-full">
                                    <div class="text-sm text-gray-900">{{ $item->tipojornada }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                    {{-- @livewire('edit-jornada', ['jornada' => $jornada], key($jornada->id)) --}}
                                    <button type="button" class="btn btn-success btn-sm" wire:click="edit({{$item}})">edit</button>

                                </td>
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No existe ningun registro considente
                </div>
            @endif
        </x-table>
    </div>

        <!-- donde se edita -->
    <x-jet-dialog-modal wire:model='open_edit'>

        <x-slot name='title'>
            Editar La jornada
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value="Titulo de la jornada"/>
                <x-jet-input wire:model="jornada.tipojornada" type="text" class="w-full"/>
            </div>

        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_edit',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click='update' wire:loading.attr='disabled' class="disabled:opacity-25" >
                Actualizar
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>

            <!-- donde se crear -->
        <x-jet-dialog-modal wire:model="open_save">

            <x-slot name='title'>
                crear una nueva jornada
            </x-slot>

            <x-slot name='content'>
                <div class='mb4'>
                    <x-jet-label value='titulo de la jornada' />
                    <x-jet-input type="text" class='w-full' wire:model='tipojornada' />

                    <x-jet-input-error for='tipojornada'/>

                </div>
            </x-slot>

            <x-slot name='footer'>
                <x-jet-secondary-button wire:click="$set('open_save',false)">
                    cancelar
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="save_save" wire:loading.remove wire:target='save'>
                    crear Jornada
                </x-jet-danger-button>


                <samp wire:loading wire:target='save'>Cargando ...</samp>
            </x-slot>

    </x-jet-dialog-modal>
</div>
