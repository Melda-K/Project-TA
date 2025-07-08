@foreach($karier as $data)
<div class="modal fade" id="exampleModal_{{$data->id_karier}}" tabindex="-1" aria-labelledby="exampleModalLabel_{{$data->id_karier}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-bold" id="exampleModalLabel_{{$data->id_karier}}">EDIT DATA BK-KARIER</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('karier.update', $data->id_karier) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('PATCH')

                    <div class="max-w-xl">
                        <x-input-label for="tanggal" value="TANGGAL" />
                        <x-text-input id="tanggal" type="date" name="tanggal" class="mt-1 block w-full"
                            value="{{ old('tanggal', isset($data) ? $data->tanggal : '') }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="nis" value="NIS" />
                        <x-text-input id="nis" type="text" name="nis" class="mt-1 block w-full" value="{{ old('nis')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nis')" />
                    </div>

                    @php
                    $siswas = App\Models\Siswa::all();
                    @endphp

                    <x-input-label for="id_siswa" value="NAMA SISWA" />
                    <select id="id_siswa" name="id_siswa" class="mt-1 block w-full rounded-md" required>
                        <option value="">Pilih Siswa</option>
                        @foreach ($siswas as $siswa)
                        <option value="{{ $siswa->id_siswa }}"
                            @if (old('id_siswa', isset($data) ? $data->id_siswa : '') == $siswa->id_siswa) selected @endif>
                            {{ $siswa->nama_siswa }}
                        </option>
                        @endforeach
                    </select>

                    <div class="max-w-xl">
                        <x-input-label for="kelas" value="KELAS" />

                        @php
                        $kelasList = [
                        'X ATPH', 'X APHP', 'X TKJ', 'X TKRO', 'X AKL', 'X APAT',
                        'XI ATPH', 'XI APHP', 'XI TKJ', 'XI TKRO', 'XI AKL', 'XI APAT',
                        'XII ATPH', 'XII APHP', 'XII TKJ', 'XII TKRO', 'XII AKL', 'XII APAT'
                        ];
                        $selectedKelas = old('kelas', $data->kelas ?? '');
                        @endphp

                        <select id="kelas" name="kelas" class="mt-1 block w-full rounded-md" required>
                            <option value="">Pilih Kelas</option>

                            @foreach ($kelasList as $kelas)
                            <option value="{{ $kelas }}" {{ $selectedKelas === $kelas ? 'selected' : '' }}>
                                {{ $kelas }}
                            </option>
                            @endforeach
                        </select>

                        <x-input-error class="mt-2" :messages="$errors->get('kelas')" />
                    </div>


                    <div class="max-w-xl">
                        <x-input-label for="kampus" value="KAMPUS" />
                        <x-text-input id="kampus" type="text" name="kampus" class="mt-1 block w-full" value="{{ old('kampus')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('kampus')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="prodi" value="PROGRAM STUDI" />
                        <x-text-input id="prodi" type="text" name="prodi" class="mt-1 block w-full" value="{{ old('prodi')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('prodi')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="keterangan" value="KETERANGAN" />

                        @php
                        $selectedKeterangan = old('keterangan', isset($data) ? $data->keterangan : '');
                        @endphp

                        <select id="keterangan" name="keterangan" class="mt-1 block w-full rounded-md" required>
                            <option value="">Pilih Keterangan</option>
                            <option value="SNBP" {{ $selectedKeterangan === 'SNBP' ? 'selected' : '' }}>
                                Seleksi Nasional Berdasarkan Prestasi (SNBP)
                            </option>
                            <option value="SNBT" {{ $selectedKeterangan === 'SNBT' ? 'selected' : '' }}>
                                Seleksi Nasional Berdasarkan Tes (SNBT)
                            </option>
                            <option value="MANDIRI" {{ $selectedKeterangan === 'MANDIRI' ? 'selected' : '' }}>
                                Seleksi Mandiri
                            </option>
                        </select>
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