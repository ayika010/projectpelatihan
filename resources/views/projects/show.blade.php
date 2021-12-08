@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <br><br>
                <h2> Detail Barang</h2>
            </div>
            <div class="pull-right">
            <br>
                <a class="btn btn-success" href="{{ route('projects.index') }}" title="Go back"> <i
                        class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>
<table class="table table-light table-striped">
    <td>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama :</strong>
                {{ $project->nama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Deskripsi :</strong>
                {{ $project->deskripsi }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah :</strong>
                {{ $project->jumlah }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Harga :</strong>
                {{ $project->total }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal :</strong>
                {{ date_format($project->created_at, 'jS M Y') }}
            </div>
        
            <div class="form-group">
                <strong>Barang :</strong><br>
                <img src="{{ asset('photobrg/'.$project->photo) }}" style ="width: 200px" alt="">
            </div>
        
        </div>
    </div>
    </td>
</table>

@endsection
