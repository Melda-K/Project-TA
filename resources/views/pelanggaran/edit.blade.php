@foreach($pelanggarans as $data)
<div class="modal fade" id="editModal_{{$data->id_pelanggaran}}" tabindex="-1" aria-labelledby="editModalLabel_{{$data->id_pelanggaran}}" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-bold" id="editModalLabel_{{$data->id_pelanggaran}}">EDIT DATA PELANGGARAN</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="post" action="{{ route('pelanggaran.update', $data->id_pelanggaran) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('PATCH')
                    <div class="max-w-xl">
                        @php
                        $guru = App\Models\Guru::where('jabatan', 'LIKE', '%Wali Kelas%')->get();
                        $selectedGuru = old('id_guru', $data->id_guru ?? '');
                        @endphp

                        <x-input-label for="id_guru" value="NAMA WALI KELAS" />
                        <select id="id_guru" name="id_guru" class="block rounded-lg w-full" required>
                            <option value="">Pilih Wali Kelas</option>
                            @foreach ($guru as $item)
                            <option value="{{ $item->id_guru }}" {{ $selectedGuru == $item->id_guru ? 'selected' : '' }}>
                                {{ $item->nama_guru }}
                            </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('id_guru')" />
                    </div>


                    <div class="max-w-xl">
                        <x-input-label for="tanggal" value="TANGGAL" />
                        <x-text-input id="tanggal" type="date" name="tanggal" class="mt-1 block w-full"
                            value="{{ old('tanggal', isset($data) ? $data->tanggal : '') }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
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
                        <x-input-label for="point_pelanggaran" value="NOMOR POIN PELANGGARAN" />
                        <x-text-input id="point_pelanggaran" type="text" name="point_pelanggaran" class="mt-1 block w-full" value="{{ old('point_pelanggaran', $data->point_pelanggaran)}}"
                            required />
                        <x-input-error class="mt-2" :messages="$errors->get('point_pelanggaran')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="jmlh_pelanggaran" value="JUMLAH POIN PELANGGARAN" />
                        <x-text-input id="jmlh_pelanggaran" type="text" name="jmlh_pelanggaran" class="mt-1 block w-full" value="{{ old('jmlh_pelanggaran', $data->jmlh_pelanggaran)}}"
                            required />
                        <x-input-error class="mt-2" :messages="$errors->get('jmlh_pelanggaran')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="saldo_pelanggaran" value="SALDO PELANGGARAN" />
                        <x-text-input id="saldo_pelanggaran" type="text" name="saldo_pelanggaran" class="mt-1 block w-full" value="{{ old('saldo_pelanggaran', $data->saldo_pelanggaran)}}"
                            required />
                        <x-input-error class="mt-2" :messages="$errors->get('saldo_pelanggaran')" />
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
@endforeach