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
            <form action="{{ route('patients.store') }}" method="post">
                @csrf
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Tên bệnh nhân</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="name">
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Ngày khám</span>
                    <input type="date" class="form-control" aria-describedby="basic-addon1" name="date">
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Triệu chứng</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="symptom">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Bác sĩ khám</label>
                    <select class="form-select" name="nameDoctor" id="inputGroupSelect01">
                        @foreach ($doctors as $doctor)
                            <option>{{ $doctor->tenBacSi }}</option>;
                        @endforeach
                    </select>
                </div>
                <div class="d-flex gap-2 justify-content-end ">
                    <input type="submit" name="btnAdd" value="Thêm" class="btn btn-success"></input>
                    <a href="" class="btn btn-warning">Quay lại</a>
                </div>
            </form>
        </div>
    </main>
@endsection
