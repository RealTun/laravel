@extends('layouts.base')

@section('title')
    Bác sĩ
@endsection

@section('page_active')
    <li class="nav-item">
        <a class="nav-link" href="">Trang chủ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('doctors.index') }}">Bác sĩ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('patients.index')}}">Bệnh nhân</a>
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
        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif   
        <a href="{{route('doctors.create')}}" class="btn btn-success">Thêm mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên bác sĩ</th>
                    <th scope="col">Chuyên khoa</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xoá</th>
                </tr>
            </thead>
            @foreach ($doctors as $doctor)
                <tbody>
                    <tr>
                        <th scope="row">{{$doctor->id}}</th>
                        <td>{{$doctor->tenBacSi}}</td>
                        <td>{{$doctor->chuyenKhoa}}</td>
                        <td><a href="{{route('doctors.edit', ['doctor' => $doctor])}}"><i class="bi bi-pencil-square"></i></a></td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#doctor{{$doctor->id}}"><i class="bi bi-trash-fill"></i>
                            </button>
                            <div class="modal fade" id="doctor{{$doctor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Delete the doctor has id: {{$doctor->id}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{route('doctors.destroy', ['doctor' => $doctor])}}" method="post">
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

    {{$doctors->links()}}
</main>
@endsection