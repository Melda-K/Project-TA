<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">TAMBAH DATA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('spesialis.store') }}" enctype="multipart/form-data"
                    class="mt-6 space-y-6">
                    @csrf
                    <div class="max-w-xl">
                        <x-input-label for="username" value="NAMA PENGGUNA" />
                        <x-text-input id="username" type="text" name="username" class="mt-1 block w-full" value="{{ old('username')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('username')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="nama" value="NAMA" />
                        <x-text-input id="nama" type="text" name="nama" class="mt-1 block w-full" value="{{ old('nama')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="spesialis" value="SPESIALIS" />
                        <x-select-input id="spesialis" name="spesialis" class="mt-1 block w-full" required>
                            <option value="">Pilih Spesialis</option>
                            <option value="Psikolog" {{ old('spesialis') === 'Psikolog' ? 'selected' : '' }}>Psikolog</option>
                            <option value="Psikiater" {{ old('spesialis') === 'Psikiater' ? 'selected' : '' }}>Psikiater</option>
                        </x-select-input>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="jenis_kelamin" value="JENIS KELAMIN" />
                        <x-select-input id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full" required autocomplete>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan</option>
                            <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        </x-select-input>
                    </div>
                    <div class="modal-footer">
                        <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>