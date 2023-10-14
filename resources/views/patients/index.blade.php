@extends('layouts.base')

@section('title')
    Bệnh nhân
@endsection

@section('page_active')
    <li class="nav-item">
        <a class="nav-link" href="">Trang chủ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('doctors.index') }}">Bác sĩ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('patients.index') }}">Bệnh nhân</a>
    </li>
@endsection

@section('main')
    <main class="container vh-100 mt-5">
        <div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <a href="{{ route('patients.create') }}" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên bệnh nhân</th>
                        <th scope="col">Ngày khám</th>
                        <th scope="col">Triệu chứng</th>
                        <th scope="col">Bác sĩ khám</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xoá</th>
                    </tr>
                </thead>
                @foreach ($patients as $patient)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $patient->id }}</th>
                            <td>{{ $patient->tenBenhNhan }}</td>
                            <td>{{ $patient->ngayKham }}</td>
                            <td>{{ $patient->trieuChung }}</td>
                            <td>{{ $patient->doctor_name }}</td>
                            <td><a href="{{ route('patients.edit', ['patient' => $patient]) }}"><i
                                        class="bi bi-pencil-square"></i></a></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#patient{{ $patient->id }}"><i class="bi bi-trash-fill"></i>
                                </button>
                                <div class="modal fade" id="patient{{ $patient->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Delete the patient has id: {{ $patient->id }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('patients.destroy', ['patient' => $patient]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">OK</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach

            </table>
        </div>

        {{ $patients->links() }}
    </main>
@endsection
