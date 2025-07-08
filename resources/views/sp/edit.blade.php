@foreach($sp as $data)
<div class="modal fade" id="exampleModal_{{$data->id_sp}}" tabindex="-1" aria-labelledby="exampleModalLabel_{{$data->id_sp}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-bold" id="exampleModalLabel_{{$data->id_sp}}">EDIT DATA TINDAK LANJUT SP</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('sp.update', $data->id_sp) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('PATCH')

                    <div class="max-w-xl">
                        <x-input-label for="tanggal" value="TANGGAL" />
                        <x-text-input id="tanggal" type="date" name="tanggal" class="mt-1 block w-full" value="{{ old('tanggal', $data->tanggal)}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="nis" value="NIS" />
                        <x-text-input id="nis" type="text" name="nis" class="mt-1 block w-full" value="{{ old('nis', $data->nis)}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nis')" />
                    </div>

                    @php
                    $siswas = App\Models\Siswa::all();
                    @endphp
                    <x-input-label for="id_siswa" value="NAMA SISWA" />
                    <select id="id_siswa" name="id_siswa" class="mt-1 block w-full" required>
                        <option value="">Pilih Siswa</option>
                        @foreach ($siswas as $siswa)
                        <option value="{{ old('id_siswa', $data->id_siswa) }}">{{ $siswa->nama_siswa }}</option>
                        @endforeach
                    </select>

                    <div class="max-w-xl">
                        <x-input-label for="kelas" value="KELAS" />
                        <x-select-input id="kelas" name="kelas" class="mt-1 block w-full" required>
                            <option value="">PILIH KELAS</option>
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
                        <x-input-label for="jenis_sp" value="TAHUN PELAJARAN" />
                        <x-select-input id="jenis_sp" name="jenis_sp" class="mt-1 block w-full" required autocomplete>
                            <option value="">Pilih Tahun Pelajaran</option>
                            <option value="2025" {{ old('jenis_sp') === '2025' ? 'selected' : '' }}>2025</option>
                            <option value="2026" {{ old('jenis_sp') === '2026' ? 'selected' : '' }}>2026</option>
                        </x-select-input>
                    </div>
                    <div class="modal-footer">
                        <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                    </div>
                </form>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
@endsection