@extends('layouts.admin')
@section('title', 'Story')
@section('page1', 'Story')
@section('page2', 'Story Add')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table">
                            <div class="row">
                                <div class="col-6 align-items-center">
                                    <h2 class="mb-0">Add Story</h2>
                                </div>
                                <div class="col-6 text-end align-items-center">
                                    <a class="btn bg-gradient-warning mb-0" href="/mystory"><i class="material-icons text-sm">arrow_back</i>&nbsp;&nbsp;Back</a>
                                </div>
                            </div>
                            <br>
                            <form action="/mystory/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="row">
                                    <div class="col-lg-6 mt-3">
                                        <div class="input-group input-group-static mb-4">
                                        <label class="form-control-label">Pilih Undangan</label>
                                        <select class="form-control" name="id_undangan">
                                            @foreach($undangan as $undangans)
                                                <option value="{{$undangans->id}}">{{$undangans->title}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="input-group input-group-static mb-4">
                                            <label class="form-control-label">Nama Story</label>
                                            <input type="text" name="title" id="" class="form-control">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-lg-6 mt-3">
                                        <div class="input-group input-group-static mb-4">
                                            <label class="form-control-label">Date</label>
                                            <input type="date" name="date" id="" class="form-control" placeholder="Masukkan Tanggal">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="input-group input-group-static mb-4">
                                            <label class="form-control-label">Images</label>
                                            <div class="input-group input-group-outline my-3">                                    
                                                <input type="file" class="form-control" placeholder="" name="images" multiple>
                                            </div>   
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="input-group input-group-static mb-4">
                                            <label class="form-control-label">Deskripsi</label>
                                            <textarea class="form-control" name="desc" id="" rows="3"></textarea>
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
