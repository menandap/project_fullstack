@extends('layouts.admin')
@section('title', 'Undangan')
@section('page1', 'Undangan')
@section('page2', 'Undangan Product')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table">
                            <div class="row">
                                <div class="col-6 align-items-center">
                                    <h2 class="mb-0">Detail Undangan</h2>
                                </div>
                                <div class="col-6 text-end align-items-center">
                                    <a class="btn bg-gradient-warning mb-0" href="/myundangan"><i class="material-icons text-sm">arrow_back</i>&nbsp;&nbsp;Back</a>
                                </div>
                            </div>
                            <br>  

                            <div class="row">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="form-group">
                                            <label class="form-control-label">Judul</label>
                                            <input type="text" id="" class="form-control" value="{{ $undangans->title }}" disabled readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Tanggal</label>
                                            <input type="text" id="" class="form-control" value="{{ $undangans->wedding_date }}" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Lokasi</label>
                                            <input type="text" id="" class="form-control" value="{{ $undangans->wedding_location }}" disabled readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Deskripsi</label>
                                            <textarea class="form-control" id="" rows="14" disabled readonly>{{$undangans->desc_wedding}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-control-label">Cover</label>
                                        <div class="thumbnail">
                                            <img class="img-fluid-left img-thumbnail" src="{{ asset('dashboard/assets/img/team/team-0.jpg') }}" alt="light" style="width:600px; height:300px;">                                                                
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Nama Penggantin Pria</label>
                                            <input type="text" id="" class="form-control" value="{{ $undangans->person_1_name }}" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Nama Penggantin Wanita</label>
                                            <input type="text" id="" class="form-control" value="{{ $undangans->person_2_name }}" disabled readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                         
                                    <div class="col-lg">
                                        <label class="form-control-label">Foto Pengantin Pria (Rasio : 1X1)</label>                                        
                                        <div class="thumbnail">
                                            <img class="img-fluid-left img-thumbnail" src="{{ asset('dashboard/assets/img/team/team-0.jpg') }}" alt="light" style="width:200px; height:200px;">                                                                
                                        </div>
                                    </div>	
                                    <div class="col-lg">
                                        <label class="form-control-label">Foto Pengantin Wanita (Rasio : 1X1)</label>                                        
                                        <div class="thumbnail">
                                            <img class="img-fluid-left img-thumbnail" src="{{ asset('dashboard/assets/img/team/team-0.jpg') }}" alt="light" style="width:200px; height:200px;">                                                                
                                        </div>
                                    </div>		                                                                                                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection