@include('partials.headerdashboardoperator')

@extends('layouts.operator')

@section('content')
    <div class="rows">
        <div class="column">
            <a href="/" class="card credentialing">
                <div class="overlay"></div>
                <div class="circle">
                    <img src="img/home-network.svg">
                </div>
                <p>Halaman Profil</p>
            </a>
        </div>
        <div class="column">
            <a href="/daftarpenyewa" class="card credentialing">
                <div class="overlay"></div>
                <div class="circle">
                    <img src="img/schedule-admin.svg">
                </div>
                <p>Daftar Penjadwalan</p>
            </a>
        </div>
        <div class="column">
            <a href="/tambahsewa" class="card credentialing">
                <div class="overlay"></div>
                <div class="circle">
                    <img src="img/tambahsewa-admin.svg">
                </div>
                <p>Tambah Sewa</p>
            </a>
        </div>
        <div class="column">
            <a href="/rekap" class="card credentialing">
                <div class="overlay"></div>
                <div class="circle">
                    <img src="img/rekap-admin.svg">
                </div>
                <p>Rekap</p>
            </a>
        </div>
    </div>
@endsection
