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
                        <x-input-label for="nama_guru" value="NAMA GURU BK" />
                        <x-text-input id="nama_guru" type="text" name="nama_guru" class="mt-1 block w-full" value="{{ old('nama_guru')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nama_guru')" />
                    </div>
                     <div class="max-w-xl">
                        <x-input-label for="nama" value="NAMA KONSELOR" />
                        <x-text-input id="nama" type="text" name="nama" class="mt-1 block w-full" value="{{ old('nama')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nama')" />
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