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

            <form action="{{ route('patients.update', ['patient' => $patient]) }}" method="post">
                @csrf
                @method('PUT')
                <h3 class="text-center">SỬA THÔNG TIN bệnh nhân</h3>
                <div class="mt-4">
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text" id="basic-addon1">Mã bệnh nhân</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="id"
                            value="{{ $patient->id }}" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Tên bệnh nhân</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="name"
                            value="{{ $patient->tenBenhNhan }}">
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text" id="basic-addon1">Ngày khám</span>
                        <input type="date" class="form-control" aria-describedby="basic-addon1" name="date"
                            value="{{ $patient->ngayKham }}">
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text" id="basic-addon1">Triệu chứng</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="symptom"
                            value="{{ $patient->trieuChung }}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Bác sĩ khám</label>
                        <select class="form-select" name="nameDoctor" id="inputGroupSelect01">
                            <option selected>{{ $doctor->tenBacSi }}</option>
                            @foreach ($doctors as $doctor)
                                <option>{{ $doctor->tenBacSi }}</option>;
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex gap-2 justify-content-end ">
                        <button type="submit" name="btnEdit" class="btn btn-success">Lưu lại</button>
                        <a href="" class="btn btn-warning">Quay lại</a>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
