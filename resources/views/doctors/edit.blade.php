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
        <a class="nav-link" href="{{ route('patients.index') }}">Bệnh nhân</a>
    </li>
@endsection

@section('main')
<main class="container vh-100 mt-5">
    <div>    
        <form action="{{route('doctors.update', ['doctor' => $doctor])}}" method="post">
            @csrf
            @method('PUT')
            <h3 class="text-center">SỬA THÔNG TIN BÁC SĨ</h3>
            <div class="mt-4">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Mã bác sĩ</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="id" value="{{$doctor->id}}" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Tên bác sĩ</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="name" value="{{$doctor->tenBacSi}}">
                </div>       
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Chuyên khoa</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="special" value="{{$doctor->chuyenKhoa}}">
                </div>           
            </div>
                <div class="d-flex gap-2 justify-content-end ">
                    <button type="submit" class="btn btn-success">Lưu lại</button>
                    <a href="{{route('doctors.index')}}" class="btn btn-warning">Quay lại</a>
                </div>
            </div>
        </form>
    </div>
</main>   
@endsection
