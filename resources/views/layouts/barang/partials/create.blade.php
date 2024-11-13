<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Barang') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('barang.store') }}" method="POST" class="space-y-6">
                    @csrf
        
                    <div>
                        <x-input-label for="kode_barang" :value="__('Kode Barang')" />
                        <x-text-input id="kode_barang" class="block mt-1 w-full" type="text" name="kode_barang" required />
                        <x-input-error :messages="$errors->get('kode_barang')" class="mt-2" />
                    </div>
        
                    <div>
                        <x-input-label for="nama" :value="__('Nama Barang')" />
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" required />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>
        
                    <div>
                        <x-input-label for="merk" :value="__('Merk')" />
                        <x-text-input id="merk" class="block mt-1 w-full" type="text" name="merk" />
                        <x-input-error :messages="$errors->get('merk')" class="mt-2" />
                    </div>
        
                    <div>
                        <x-input-label for="harga" :value="__('Harga')" />
                        <x-text-input id="harga" class="block mt-1 w-full" type="number" step="0.01" name="harga"
                            required />
                        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                    </div>
        
                    <div>
                        <x-input-label for="jumlah" :value="__('Jumlah')" />
                        <x-text-input id="jumlah" class="block mt-1 w-full" type="number" name="jumlah" required />
                        <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
                    </div>
        
                    <div>
                        <x-input-label for="tipe_jumlah" :value="__('Tipe Jumlah')" />
                        <select id="tipe_jumlah" name="tipe_jumlah" required
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="set">Set</option>
                            <option value="buah">Buah</option>
                            <option value="unit">Unit</option>
                        </select>
                        <x-input-error :messages="$errors->get('tipe_jumlah')" class="mt-2" />
                    </div>
                    
                    <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                        <a href="{{ route('barang.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                            {{ __('Kembali') }}
                        </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
