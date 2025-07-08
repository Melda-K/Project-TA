@foreach($belajar as $data)
<div class="modal fade" id="exampleModal_{{$data->id_belajar}}" tabindex="-1" aria-labelledby="exampleModalLabel_{{$data->id_belajar}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-bold" id="exampleModalLabel_{{$data->id_belajar}}">EDIT DATA BK-BELAJAR</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('belajar.update', $data->id_belajar) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('PATCH')
                    <div class="max-w-xl">
                        <x-input-label for="tanggal" value="TANGGAL" />
                        <x-text-input id="tanggal" type="date" name="tanggal" class="mt-1 block w-full" value="{{ old('tanggal', $data->tanggal)}}"
                            required />
                        <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="nama_siswa" value="NAMA SISWA" />
                        <x-text-input id="nama_siswa" type="text" name="nama_siswa" class="mt-1 block w-full" value="{{ old('nama_siswa', $data->nama_siswa)}}"
                            required />
                        <x-input-error class="mt-2" :messages="$errors->get('nama_siswa')" />
                    </div>
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
                        <x-input-label for="permasalahan" value="PERMASALAHAN" />
                        <x-text-input id="permasalahan" type="text" name="permasalahan" class="mt-1 block w-full" value="{{ old('permasalahan', $data->permasalahan)}}" />
                        <x-input-error class="mt-2" :messages="$errors->get('permasalahan')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="mapel" value="MAPEL" />
                        <x-text-input id="mapel" type="text" name="mapel" class="mt-1 block w-full" value="{{ old('mapel', $data->mapel)}}" />
                        <x-input-error class="mt-2" :messages="$errors->get('mapel')" />
                    </div>

                    <div class="max-w-xl">
                        @php
                        $guru = App\Models\Guru::where('jabatan', 'LIKE', '%Wali Kelas%')->get();
                        @endphp

                        <x-input-label for="id_guru" value="NAMA GURU MATAPELAJARAN" />
                        <select id="id_guru" name="id_guru" class="block rounded-lg w-full" required>
                            <option value="">Pilih Guru Matapelajaran</option>
                            @foreach ($guru as $item)
                            <option value="{{ old('id_guru',$data->id_guru) }}" required>{{ $item->nama_guru }}</option>
                            <x-input-error class="mt-2" :messages="$errors->get('id_guru')" />
                            @endforeach
                        </select>
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="keterangan" value="KETERANGAN" />
                        <x-text-input id="keterangan" type="text" name="keterangan" class="mt-1 block w-full" value="{{ old('keterangan', $data->keterangan)}}" />
                        <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
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