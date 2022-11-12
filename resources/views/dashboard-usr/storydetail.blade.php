@extends('layouts.admin')
@section('title', 'Story')
@section('page1', 'Story')
@section('page2', 'Story Detail')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table">
                            <div class="row">
                                <div class="col-6 align-items-center">
                                    <h2 class="mb-0">Detail Story</h2>
                                </div>
                                <div class="col-6 text-end align-items-center">
                                    <a class="btn bg-gradient-warning mb-0" href="/mystory"><i class="material-icons text-sm">arrow_back</i>&nbsp;&nbsp;Back</a>
                                </div>
                            </div>
                            <br>  

                            <div class="row">
                            <div class="row">
                                    @php
                                        $undangans = App\Models\Undangan::where('id', '=', $storys->id_undangan)->first();
                                    @endphp
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Undangan</label>
                                            <input type="text" id="" class="form-control" value="{{ $undangans->title }}" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Story</label>
                                            <input type="text" id="" class="form-control" value="{{ $storys->title }}" disabled readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="form-group">
                                            <label class="form-control-label">Date</label>
                                            <input type="text" id="" class="form-control" value="{{ $storys->date }}" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg">
                                        <div class="form-group">
                                            <label class="form-control-label">Deskripsi</label>
                                            <textarea class="form-control" id="" rows="9" disabled readonly>{{$storys->desc}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg">
                                        <label class="form-control-label">Images</label>
                                        <img class="img-fluid-left img-thumbnail" src="{{ url('/db/'.$storys->images) }}" alt="light" style="width:400px; height:200px;">    
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