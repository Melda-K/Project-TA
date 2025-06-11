@foreach ($siswas as $siswa)
<div class="modal fade" id="openModel_{{ $siswa->id_siswa }}" tabindex="-1" aria-labelledby="openModalLabel_{{ $siswa->id_siswa }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-bold" id_siswa="openModalLabel_{{ $siswa->id_siswa }}">DATA SISWA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h1 class="modal-title fs-5 font-bold">INFORMASI DATA SISWA</h1>
                <br>
                <div class="flex">
                    <div class="w-64">
                        <div class="font-bold">
                            <label>NAMA SISWA</label>
                        </div>
                        <div>
                            <p>{{ $siswa->nama_siswa }}</p>
                        </div>
                    </div>

                    <div class="w-64">
                        <div class="font-bold">
                            <label>NIS</label>
                        </div>
                        <div>
                            <p>{{ $siswa->nis }}</p>
                        </div>
                    </div>

                    <div class="w-64">
                        <div class="font-bold">
                            <label>TEMPAT TANGGAL LAHIR</label>
                        </div>
                        <div>
                            <p>{{ $siswa->ttl }}</p>
                        </div>
                    </div>
                </div>

                <br>

                <div class="flex">
                    <div class="w-64">
                        <div class="font-bold">
                            <label>JENIS KELAMIN</label>
                        </div>
                        <div>
                            <p>{{ $siswa->jenis_kelamin }}</p>
                        </div>
                    </div>

                    <div class="w-64">
                        <div class="font-bold">
                            <label>AGAMA</label>
                        </div>
                        <div>
                            <p>{{ $siswa->agama }}</p>
                        </div>
                    </div>

                    <div class="w-64">
                        <div class="font-bold">
                            <label>PENDIDIKAN SEBELUMNYA</label>
                        </div>
                        <div>
                            <p>{{ $siswa->pendik_sebelumnya }}</p>
                        </div>
                    </div>
                </div>

                <br>

                <div class="flex">
                    <div class="w-64">
                        <div class="font-bold">
                            <label>ANAK KE</label>
                        </div>
                        <div>
                            <p>{{ $siswa->jmlh_sodara }}</p>
                        </div>
                    </div>
                    <div class="w-64">
                        <div class="font-bold">
                            <label>ALAMAT SISWA</label>
                        </div>
                        <div>
                            <p>{{ $siswa->alamat }}</p>
                        </div>
                    </div>
                </div>

                <br>

                <div class="flex">
                    <div class="w-64">
                        <div class="font-bold">
                            <label>NAMA ORANG TUA : </label>
                        </div>
                        <div class="flex">
                            <div class="w-80">
                                <div class="font-bold">
                                    <label>AYAH</label>
                                </div>
                                <div>
                                    <p>{{ $siswa->nama_ayah }}</p>
                                </div>
                            </div>
                            <div class="w-80">
                                <div class="font-bold">
                                    <label>IBU</label>
                                </div>
                                <div>
                                    <p>{{ $siswa->nama_ibu }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-64">
                        <div class="font-bold">
                            <label>PEKERJAAN ORANG TUA : </label>
                        </div>
                        <div class="flex">
                            <div class="w-80">
                                <div class="font-bold">
                                    <label>AYAH</label>
                                </div>
                                <div>
                                    <p>{{ $siswa->pekerjaan_ayah }}</p>
                                </div>
                            </div>
                            <div class="w-80">
                                <div class="font-bold">
                                    <label>IBU</label>
                                </div>
                                <div>
                                    <p>{{ $siswa->pekerjaan_ibu }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <br>

                <div class="flex">
                    <div class="w-64">
                        <div class="font-bold">
                            <label>NAMA WALI SISWA</label>
                        </div>
                        <div>
                            <p>{{ $siswa->wali_siswa }}</p>
                        </div>
                    </div>

                    <div class="w-64">
                        <div class="font-bold">
                            <label>KELAS</label>
                        </div>
                        <div>
                            <p>{{ $siswa->kelas }}</p>
                        </div>
                    </div>

                    <div class="w-64">
                        <div class="font-bold">
                            <label>WALI KELAS </label>
                        </div>
                        <div>
                            <p>{{ $siswa->guru->nama_guru }}</p>
                        </div>
                    </div>

                    <div class="w-64">
                        <div class="font-bold">
                            <label>TAHUN PELAJARAN </label>
                        </div>
                        <div>
                            <p>{{ $siswa->tahun_pelajaran }}</p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach