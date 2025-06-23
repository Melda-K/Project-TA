<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">TAMBAH DATA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('jadwaljiwa.store') }}" enctype="multipart/form-data"
                    class="mt-6 space-y-6">
                    @csrf

                    <div class="max-w-xl">
                        @php
                        $spesialis = \App\Models\Spesialis::all();
                        @endphp
                        <x-input-label for="nama" value="NAMA SPESIALIS KEJIWAAN" />
                        <select id="id_spesialis_kejiwaan" name="id_spesialis_kejiwaan" class="block rounded-lg w-full" required>
                            <option value="">Pilih Spesialis</option>
                            @foreach ($spesialis as $item)
                            <option value="{{ $item->id_spesialis_kejiwaan }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="kategori_jadwal" value="KATEGORI JADWAL" />
                        <x-select-input id="kategori_jadwal" name="kategori_jadwal" class="mt-1 block w-full" required>
                            <option value="">Pilih Jadwal Spesialis</option>
                            <option value="Psikolog" {{ old('kategori_jadwal') === 'Psikolog' ? 'selected' : '' }}>Psikolog</option>
                            <option value="Psikiater" {{ old('kategori_jadwal') === 'Psikiater' ? 'selected' : '' }}>Psikiater</option>
                        </x-select-input>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="hari" value="HARI" />
                        <x-text-input id="hari" type="text" name="hari" class="mt-1 block w-full" value="{{ old('hari')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('hari')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="jam" value="JAM" />
                        <x-text-input id="jam" type="text" name="jam" class="mt-1 block w-full" value="{{ old('jam')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('jam')" />
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