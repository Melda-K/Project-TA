<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">TAMBAH DATA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('jadwalbk.store') }}" enctype="multipart/form-data"
                    class="mt-6 space-y-6">
                    @csrf

                    <div class="max-w-xl">
                        <x-input-label for="id_guru" value="NAMA GURU BK" />
                        <x-select-input id="id_guru" name="id_guru" class="mt-1 block w-full" required>
                            <option value="">Pilih Guru BK</option>
                            <option value="1">Lina Elyana, S.Pd., MM.Pd</option>
                            <option value="2">Dian Rusdianto, S.Pd</option>
                            <option value="3">Yuliastuti Dewi Y, S.Si</option>
                            <option value="4">Desy Rosita Nuriswandi, S.Pd</option>
                            <option value="5">Yani Agustiani, S.Pd</option>
                        </x-select-input>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="hari" value="HARI" />
                        <x-select-input id="hari" name="hari" class="mt-1 block w-full" required>
                            <option value="">Pilih Hari</option>
                            <option value="Senin" {{ old('hari') === 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ old('hari') === 'Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ old('hari') === 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ old('hari') === 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ old('hari') === 'Jumat' ? 'selected' : '' }}>Jumat</option>
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