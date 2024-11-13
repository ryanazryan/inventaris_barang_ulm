<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="grid grid-cols-2 gap-4">

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nama')" />
                <x-text-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Username -->
            <div>
                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username" class="block w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email (Opsional)')" />
                <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Kata Sandi')" />
                <x-text-input id="password" class="block w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
                <x-text-input id="password_confirmation" class="block w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Gedung -->
            <div>
                <x-input-label for="gedung" :value="__('Gedung')" />
                <select id="gedung" name="gedung_id" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                    <option value="">{{ __('-- Pilih Gedung --') }}</option>
                    @foreach ($gedung as $gedung)
                        <option value="{{ $gedung->id }}">{{ $gedung->nama_gedung }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('gedung_id')" class="mt-2" />
            </div>

            <!-- Lantai -->
            <div>
                <x-input-label for="lantai" :value="__('Lantai')" />
                <select id="lantai" name="lantai_id" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required disabled>
                    <option value="">{{ __('-- Pilih Lantai --') }}</option>
                </select>
                <x-input-error :messages="$errors->get('lantai_id')" class="mt-2" />
            </div>

            <!-- Ruangan -->
            <div>
                <x-input-label for="ruangan" :value="__('Ruangan')" />
                <select id="ruangan" name="ruangan_id" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required disabled>
                    <option value="">{{ __('-- Pilih Ruangan --') }}</option>
                </select>
                <x-input-error :messages="$errors->get('ruangan_id')" class="mt-2" />
            </div>

        </div>

        <!-- Tombol Submit -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Sudah terdaftar?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#gedung').change(function() {
                var gedungId = $(this).val();
                $('#lantai').prop('disabled', true).empty().append('<option value="">{{ __('-- Pilih Lantai --') }}</option>');
                $('#ruangan').prop('disabled', true).empty().append('<option value="">{{ __('-- Pilih Ruangan --') }}</option>');
                
                if (gedungId) {
                    $.ajax({
                        url: "{{ route('lantai.byGedung') }}",
                        method: "GET",
                        data: { gedung_id: gedungId },
                        success: function(data) {
                            $('#lantai').prop('disabled', false);
                            $.each(data, function(key, value) {
                                $('#lantai').append('<option value="'+ value.id +'">'+ value.nomor_lantai +'</option>');
                            });
                        }
                    });
                }
            });

            $('#lantai').change(function() {
                var lantaiId = $(this).val();
                $('#ruangan').prop('disabled', true).empty().append('<option value="">{{ __('-- Pilih Ruangan --') }}</option>');
                
                if (lantaiId) {
                    $.ajax({
                        url: "{{ route('ruangan.byLantai') }}",
                        method: "GET",
                        data: { lantai_id: lantaiId },
                        success: function(data) {
                            $('#ruangan').prop('disabled', false);
                            $.each(data, function(key, value) {
                                $('#ruangan').append('<option value="'+ value.id +'">'+ value.kode_ruangan +'</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>
</x-guest-layout>
