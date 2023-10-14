@extends('layouts.base')

@section('title')
    Homepage
@endsection

@section('main')
    <div class="container-fluid text-center text-bg-info ">
        <h3>Welcome to Hospital Management</h3>
    </div>
@endsection

@section('page_active')
    <li class="nav-item">
        <a class="nav-link active" href="">Trang chủ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('doctors.index') }}">Bác sĩ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('patients.index')}}">Bệnh nhân</a>
    </li>
@endsection
