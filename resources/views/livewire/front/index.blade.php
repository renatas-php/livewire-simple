<div class="px-[32px] md:px-[105px]">
    <div class="flex-col flex md:flex-row gap-[16px] md:gap-[32px] pt-[64px]">
        <div class="dropdown relative" x-data="{ dropdown: false, selectedValue: 'Gamintojas' }" @click.away="dropdown = false">
            <div class="rounded-[15px] px-[32px] py-[12px] border border-[#000] cursor-pointer" @click="dropdown = ! dropdown"><span x-text="selectedValue"></span></div>
            <ul class="p-4 shadow bg-base-100 rounded-[18px] w-52 z-10 overflow-y-scroll opacity-0 absolute top-[300px] z-10 bg-white border border-[#000]" :class="dropdown == true ? 'opacity-100 h-[150px] !top-[70px]' : ''">
                <li class="relative pt-[6px]">
                    <p class="hover:text-[#4a00ff]">-</p>
                    <input @click="dropdown = false; selectedValue = 'Gamintojas'" name="manufacturer" type="radio" wire:model.live="manufacturer" class="absolute top-0 left-0 opacity-0 w-full h-full cursor-pointer" value="{{ null }}">
                </li>    
                @forelse($manufacturers as $manufacturer)
                <li class="relative pt-[6px]">
                    <p class="hover:text-[#4a00ff]">{{ $manufacturer->name }}</p>
                    <input @click="dropdown = false; selectedValue = '{{ $manufacturer->name }}'" name="manufacturer" type="radio" wire:model.live="manufacturer" class="absolute top-0 left-0 opacity-0 w-full h-full cursor-pointer" value="{{ $manufacturer->id }}">
                </li>
                @empty 
                @endforelse
            </ul>
        </div>
        <div class="dropdown relative" x-data="{ dropdown: false, selectedValue: 'Likutis' }" @click.away="dropdown = false">
            <div class="rounded-[15px] px-[32px] py-[12px] border border-[#000] cursor-pointer" @click="dropdown = ! dropdown"><span x-text="selectedValue"></span></div>
            <ul class="p-4 shadow bg-base-100 rounded-[18px] w-52 z-10 overflow-y-scroll opacity-0 absolute top-[300px] z-10 bg-white border border-[#000] flex flex-col gap-[6px]" :class="dropdown == true ? 'opacity-100 max-h-[150px] !top-[70px]' : ''">
                <li class="relative">
                    <p class="hover:text-[#4a00ff]">-</p>
                    <input name="stock" @click="dropdown = false; selectedValue = 'Likutis'" type="radio" wire:model.live="stock" class="absolute top-0 left-0 opacity-0 w-full h-full cursor-pointer" value="{{ null }}">
                </li>    
                <li class="relative">
                    <p class="hover:text-[#4a00ff]">Turime</p>
                    <input name="stock" @click="dropdown = false; selectedValue = 'Turime'" type="radio" wire:model.live="stock" class="absolute top-0 left-0 opacity-0 w-full h-full cursor-pointer" value="2">
                </li>
                <li class="relative">
                    <p class="hover:text-[#4a00ff]">Neturime</p>
                    <input name="stock" @click="dropdown = false; selectedValue = 'Neturime'" type="radio" wire:model.live="stock" class="absolute top-0 left-0 opacity-0 w-full h-full cursor-pointer" value="1">
                </li>
            </ul>
        </div>
    </div>
    <div class="mt-[32px] gap-x-[32px] gap-y-[32px] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @forelse($items as $item)
        <div class="card bg-base-100 shadow-xl rounded-[18px]">
            <div class="card-body p-[32px]">
                <h2 class="text-[22px] font-medium">{{ $item->name }}</h2>
                <p>{{ $item->description }}</p>
                <span class="text-[14px] font-medium">Likutis: {{ $item->stock }}</span>
                <div class="flex justify-end items-center gap-[16px]">
                    <p class="text-[22px] font-medium">{{ $item->formated_price }}</p>
                    <button class="btn btn-primary hover:text-[#fff]">Pirkti</button>
                </div>
            </div>
        </div>
        @empty 
        <div class="text-[22px] text-center font-medium grid-column-3 py-[64px]">
            Rezultatų nerasta
        </div>
        @endforelse
    </div>
</div>