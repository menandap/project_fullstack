@extends('layouts.admin')
@section('title', 'Undangan')
@section('page1', 'Undangan')
@section('page2', 'Undangan Edit')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table">
                            <div class="row">
                                <div class="col-6 align-items-center">
                                    <h2 class="mb-0">Edit Undangan</h2>
                                </div>
                                <div class="col-6 text-end align-items-center">
                                    <a class="btn bg-gradient-warning mb-0" href="/myundangan"><i class="material-icons text-sm">arrow_back</i>&nbsp;&nbsp;Back</a>
                                </div>
                            </div>
                            <br>
                            <form action="/myundangan/{{$undangan->id}}/update" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group input-group-static mb-4">
                                            <label class="form-control-label">Judul</label>
                                            <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                                            <input type="text" class="form-control" name="title" placeholder="Masukkan Judul Undangan " value="{{$undangan->title}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group input-group-static mb-4">
                                            <label class="form-control-label">Tanggal</label>
                                            <input type="datetime-local" id="" class="form-control" name="wedding_date" placeholder="Masukkan Tanggal Undangan" value="{{$undangan->wedding_date}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group input-group-static mb-4">
                                            <label class="form-control-label">Lokasi</label>
                                            <input type="text" id="" class="form-control" name="wedding_location" placeholder="Masukkan Lokasi Undangan" value="{{$undangan->wedding_location}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group input-group-static mb-4p">
                                            <label class="form-control-label">Deskripsi</label>
                                            <textarea class="form-control" name="desc_wedding" id="" rows="3" placeholder="Masukkan Deskripsi Undangan">{{$undangan->desc_wedding}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group input-group-static mb-4">
                                            <label class="form-control-label">Deskripsi Pengantin Pria</label>
                                            <textarea class="form-control" name="desc_person_1" id="" rows="3" placeholder="Masukkan Deskripsi">{{$undangan->desc_person_1}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group input-group-static mb-4">
                                            <label class="form-control-label">Deskripsi Pengantin Wanita</label>
                                            <textarea class="form-control" name="desc_person_2" id="" rows="3" placeholder="Masukkan Deskripsi">{{$undangan->desc_person_2}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-6">
                                        <div class="input-group input-group-static mb-4">
                                            <label class="form-control-label">Nama Penggantin Pria</label>
                                            <input type="text" id="" class="form-control" name="person_1_name" placeholder="Masukkan Nama Pengantin Pria Undangan" value="{{$undangan->person_1_name}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-static mb-4">
                                            <label class="form-control-label">Nama Penggantin Wanita</label>
                                            <input type="text" id="" class="form-control" name="person_2_name" placeholder="Masukkan Nama Pengantin Wanita Undangan" value="{{$undangan->person_2_name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <label class="form-control-label">Foto Pengantin Pria (Rasio : 1X1)</label>
                                        <img class="img-fluid-left img-thumbnail" src="{{ url('/db/'.$undangan->person_1_image) }}" alt="light" style="width:200px; height:200px;">    
                                        <div class="input-group input-group-outline my-3">                                    
                                            <input type="file" class="form-control" placeholder="" name="person_1_image" value="{{$undangan->person_1_image}}" multiple>
                                        </div>    
                                    </div>
                                    <div class="col-lg">
                                        <label class="form-control-label">Foto Pengantin Wanita (Rasio : 1X1)</label>
                                        <img class="img-fluid-left img-thumbnail" src="{{ url('/db/'.$undangan->person_2_image) }}" alt="light" style="width:200px; height:200px;">    
                                        <div class="input-group input-group-outline my-3">                                    
                                            <input type="file" class="form-control" placeholder="" name="person_2_image" value="{{$undangan->person_2_image}}" multiple>
                                        </div>    
                                    </div>
                                    <div class="col-lg">
                                        <label class="form-control-label">Cover Undangan</label>
                                        <img class="img-fluid-left img-thumbnail" src="{{ url('/db/'.$undangan->featured_image) }}" alt="light" style="width:400px; height:200px;">    
                                        <div class="input-group input-group-outline my-3">                                    
                                            <input type="file" class="form-control" placeholder="" name="featured_image" value="{{$undangan->featured_image}}" multiple>
                                        </div>    
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
