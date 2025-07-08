<x-app-layout>

    @include('pelanggaran.create')
    @include('pelanggaran.edit')
    @include('pelanggaran.delete')
    @include('pelanggaran.detail')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DATA PELANGGARAN') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @hasanyrole('Admin|Guru BK')
                    <button type="button" class="btn btn-outline-warning m-4" data-bs-toggle="modal" data-bs-target="#tambahModal">
                        TAMBAH DATA
                    </button>
                    @endhasanyrole

                    <x-table :tableId="'myTable_' . uniqid()">
                        <x-slot name="header">
                            <tr class="bg-gray-400 text-center">
                                <th>NO</th>
                                <th>NAMA SISWA</th>
                                <th>KELAS</th>
                                <th>TANGGAL</th>
                                <th>NOMOR POIN PELANGGARAN</th>
                                <th>SALDO PELANGGARAN</th>
                                <th>KETERANGAN</th>
                                <th>AKSI</th>
                            </tr>
                        </x-slot>

                        @php $num = 1; @endphp
                        @foreach ($pelanggarans as $data)
                        <tr class="text-center">
                            <td>{{ $num++ }}</td>
                            <td>{{ $data->siswa->nama_siswa }}</td>
                            <td>{{ $data->siswa->kelas }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>{{ $data->jmlh_pelanggaran }}</td>
                            <td>{{ $data->saldo_pelanggaran }}</td>
                            <td>
                                @php
                                $ket = '-';
                                if ($data->saldo_pelanggaran >= 70 && $data->saldo_pelanggaran <= 100) {
                                    $ket='Dikembalikan kepada Orang Tua' ;
                                    } elseif ($data->saldo_pelanggaran >= 30 && $data->saldo_pelanggaran < 70) {
                                        $ket='Pemanggilan Orang Tua / Wali' ;
                                        }
                                        @endphp
                                        {{ $ket }}
                                        </td>
                                        @hasanyrole('Admin|Guru BK')
                            <td>
                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal_{{ $data->id_pelanggaran }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal_{{ $data->id_pelanggaran }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#openModel_{{ $data->id_pelanggaran }}">
                                    <i class="fa-solid fa-folder"></i>
                                </button>
                            </td>
                            @endhasanyrole
                        </tr>
                        @endforeach

                    </x-table>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>