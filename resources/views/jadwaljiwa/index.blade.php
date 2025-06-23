<x-app-layout>

    @include('jadwaljiwa.create')
    @include('jadwaljiwa.edit')
    @include('jadwaljiwa.delete')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('JADWAL SPESIALIS KEJIWAAN') }}
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
                                <th>NAMA KONSELOR</th>
                                <th>KATEGORI JADWAL</th>
                                <th>HARI</th>
                                <th>JAM</th>
                                <th>AKSI</th>
                            </tr>
                        </x-slot>
                        @php $num = 1; @endphp
                        @foreach ($jadwaljiwa as $data)
                        <tr class="text-center">
                            <td>{{ $num++ }}</td>
                            <td>{{ $data->spesialis->nama }}</td>
                            <td>{{ $data->kategori_jadwal }}</td>
                            <td>{{ $data->hari }}</td>
                            <td>{{ $data->jam}}</td>
                            <td>
                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $data->id_jadwaljiwa }}"><i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal_{{ $data->id_jadwaljiwa }}"><i class="fa-solid fa-trash-can"></i>
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