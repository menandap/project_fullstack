@extends('layouts.admin')
@section('title', 'Transaction')
@section('page1', 'Transaction')
@section('page2', 'Transaction Edit')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table">
                            <div class="row">
                                <div class="col-6 align-items-center">
                                    <h2 class="mb-0">Edit Transaction</h2>
                                </div>
                                <div class="col-6 text-end align-items-center">
                                    <a class="btn bg-gradient-warning mb-0" href="/mytransaction"><i class="material-icons text-sm">arrow_back</i>&nbsp;&nbsp;Back</a>
                                </div>
                            </div>
                            <br>
                            <form action="/mytransaction/{{$transaction->id}}/update" method="POST">
                            @csrf
                            <div class="row">
                                <div class="row">
                                    <div class="col-lg-4 mt-3">
                                        <div class="input-group input-group-static mb-4">
                                        <label class="form-control-label">Pilih Undangan</label>
                                        <select class="form-control" name="id_undangan">
                                            <option selected value="{{$undangan_select->id}}">{{$undangan_select->title}}</option>
                                            @foreach($undangan as $undangans)
                                                @if($undangans->id==$undangan_select->id)

                                                @else
                                                    <option value="{{$undangans->id}}">{{$undangans->title}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-3">
                                        <div class="input-group input-group-static mb-4">
                                            <label class="form-control-label">Keyword Khusus Undangan</label>
                                            <input type="text" name="keyword" id="" class="form-control" value="{{$transaction->keyword}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 mt-3">
                                        <div class="input-group input-group-static mb-4">
                                            <label class="form-control-label">Mulai</label>
                                            <input type="date" name="date_start" id="" class="form-control" placeholder="Masukkan Waktu Mulai" value="{{$transaction->date_start}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-3">
                                        <div class="input-group input-group-static mb-4">
                                            <label class="form-control-label">Berakhir</label>
                                            <input type="date" name="date_end" id="" class="form-control" placeholder="Masukkan Waktu Berakhir" value="{{$transaction->date_end}}">
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
