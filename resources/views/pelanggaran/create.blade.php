<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">TAMBAH DATA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('pelanggaran.store') }}" enctype="multipart/form-data"
                    class="mt-6 space-y-6">
                    @csrf

                    @csrf
                    <div class="max-w-xl">
                        @php
                        use App\Models\Guru;
                        $guru = Guru::where('jabatan', 'LIKE', '%Wali Kelas%')->get();
                        @endphp

                        <x-input-label for="id_guru" value="NAMA WALI KELAS" />
                        <select id="id_guru" name="id_guru" class="block rounded-lg w-full" required>
                            <option value="">Pilih Wali Kelas</option>
                            @foreach ($guru as $item)
                            <option value="{{ $item->id_guru }}">{{ $item->nama_guru }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="tanggal" value="TANGGAL" />
                        <x-text-input id="tanggal" type="date" name="tanggal" class="mt-1 block w-full" value="{{ old('tanggal')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                    </div>
                    @php
                    use App\Models\Siswa;
                    $siswas = Siswa::all();
                    @endphp
                    <x-input-label for="id_siswa" value="NAMA SISWA" />
                    <select id="id_siswa" name="id_siswa" class="mt-1 block w-full" required>
                        <option value="">Pilih Siswa</option>
                        @foreach ($siswas as $siswa)
                        <option value="{{ $siswa->id_siswa }}">{{ $siswa->nama_siswa }}</option>
                        @endforeach
                    </select>
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
                        <x-input-label for="point_pelanggaran" value="NOMOR POIN PELANGGARAN" />
                        <x-text-input id="point_pelanggaran" type="text" name="point_pelanggaran" class="mt-1 block w-full" value="{{ old('point_pelanggaran')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('point_pelanggaran')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="jmlh_pelanggaran" value="JUMLAH POIN PELANGGARAN" />
                        <x-text-input id="jmlh_pelanggaran" type="text" name="jmlh_pelanggaran" class="mt-1 block w-full" value="{{ old('jmlh_pelanggaran')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('jmlh_pelanggaran')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="keterangan" value="KETERANGAN" />
                        <x-text-input id="keterangan" type="text" name="keterangan" class="mt-1 block w-full" value="{{ old('keterangan')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
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