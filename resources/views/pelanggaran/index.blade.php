<x-app-layout>

    @include('pelanggaran.create')
    <!-- @include('pelanggaran.edit')
    @include('pelanggaran.delete') -->

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DATA PELANGGARAN') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button type="button" class="btn btn-outline-warning m-4" data-bs-toggle="modal" data-bs-target="#tambahModal">TAMBAH DATA</button>
                    <x-table :tableId="'myTable_' . uniqid()">
                        <x-slot name="header">
                            <tr class="bg-gray-400 text-center">
                                <th>NO</th>
                                <th>TANGGAL</th>
                                <th>NAMA SISWA</th>
                                <th>KELAS</th>
                                <th>JENIS PELANGGARAN</th>
                                <th>SALDO</th>
                                <th>AKSI</th>
                            </tr>
                        </x-slot>
                        @php $num = 1; @endphp
                        @foreach ($pelanggaran as $data)
                        <tr class="text-center">
                            <td>{{ $num++ }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>{{ $data->nama_siswa }}</td>
                            <td>{{ $data->kelas}}</td>
                            <td>{{ $data->jenis_pelanggaran}}</td>
                            <td>{{ $data->saldo}}</td>
                            <td>
                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $data->id_jadwal }}"><i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal_{{ $data->id_jadwal }}"><i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>