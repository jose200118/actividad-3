<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        crear nueva jornada
    </x-jet-danger-button>

    <div>

        <x-jet-dialog-modal wire:model="open">

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
                <x-jet-secondary-button wire:click="$set('open',false)">
                    cancelar
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="save" wire:loading.remove wire:target='save'>
                    crear Jornada
                </x-jet-danger-button>


                <samp wire:loading wire:target='save'>Cargando ...</samp>
            </x-slot>

        </x-jet-dialog-modal>

    </div>
</div>
