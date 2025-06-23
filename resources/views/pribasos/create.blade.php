<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-bold" id="tambahModalLabel">TAMBAH DATA BK- PRIBADI DAN SOSIAL</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('pribasos.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    <div class="max-w-xl">
                        <x-input-label for="tanggal" value="TANGGAL" />
                        <x-text-input id="tanggal" type="date" name="tanggal" class="mt-1 block w-full" value="{{ old('tanggal')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="nama_siswa" value="NAMA SISWA" />
                        <x-text-input id="nama_siswa" type="text" name="nama_siswa" class="mt-1 block w-full" value="{{ old('nama_siswa')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nama_siswa')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="kelas" value="KELAS" />
                        <x-select-input id="kelas" name="kelas" class="mt-1 block w-full" required>
                            <option value="">Pilih Kelas</option>
                            <option value="X ATPH" {{ old('kelas') === 'X' ? 'selected' : '' }}>X ATPH</option>
                            <option value="X APHP" {{ old('kelas') === 'X' ? 'selected' : '' }}>X APHP</option>
                            <option value="X TKJ" {{ old('kelas') === 'X' ? 'selected' : '' }}>X TKJ</option>
                            <option value="X TKRO" {{ old('kelas') === 'X' ? 'selected' : '' }}>X TKRO</option>
                            <option value="X AKL" {{ old('kelas') === 'X' ? 'selected' : '' }}>X AKL</option>
                            <option value="X APAT" {{ old('kelas') === 'X' ? 'selected' : '' }}>X APAT</option>

                            <option value="XI ATPH" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI ATPH</option>
                            <option value="XI APHP" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI APHP</option>
                            <option value="XI TKJ" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI TKJ</option>
                            <option value="XI TKRO" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI TKRO</option>
                            <option value="XI AKL" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI AKL</option>
                            <option value="XI APAT" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI APAT</option>

                            <option value="XII ATPH" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII ATPH</option>
                            <option value="XII APHP" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII APHP</option>
                            <option value="XII TKJ" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII TKJ</option>
                            <option value="XII TKRO" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII TKRO</option>
                            <option value="XII AKL" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII AKL</option>
                            <option value="XII APAT" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII APAT</option>
                        </x-select-input>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="permasalahan" value="PERMASALAHAN" />
                        <x-text-input id="permasalahan" type="text" name="permasalahan" class="mt-1 block w-full" value="{{ old('permasalahan')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('permasalahan')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="penyelesaian" value="PENYELESAIAN" />
                        <x-text-input id="penyelesaian" type="text" name="penyelesaian" class="mt-1 block w-full" value="{{ old('penyelesaian')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('penyelesaian')" />
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