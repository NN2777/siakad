@extends('template_backend.home')
@section('heading', 'Edit Mapel')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('mapel.index') }}">Mapel</a></li>
  <li class="breadcrumb-item active">Edit Mapel</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-teal">
      <div class="card-header">
        <h3 class="card-title">Edit Data Mapel</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('mapel.store') }}" method="post">
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="mapel_id" value="{{ $mapel->id }}">
                <div class="form-group">
                  <label for="nama_mapel">Nama Pelajaran</label>
                  <input type="text" id="nama_mapel" name="nama_mapel" value="{{ $mapel->nama_mapel }}" class="form-control @error('nama_mapel') is-invalid @enderror" placeholder="{{ __('Nama Pelajaran') }}">
                </div>
                <div class="form-group">
                  <label for="paket_id">Paket</label>
                  <select id="paket_id" name="paket_id" class="form-control @error('paket_id') is-invalid @enderror select2bs4">
                    <option value="">-- Pilih Jenis Pelajaran --</option>
                    <option value="4"
                        @if ($mapel->paket_id == '4')
                            selected
                        @endif
                    >Semua</option>
                    @foreach ($paket as $data)
                      <option value="{{ $data->id }}"
                        @if ($mapel->paket_id == $data->id)
                            selected
                        @endif
                      >{{ $data->ket }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="kelompok">Jenis Santri</label>
                    <select id="kelompok" name="kelompok" class="select2bs4 form-control @error('kelompok') is-invalid @enderror">
                        <option value="">-- Pilih Jenis Santri --</option>
                        <option value="A"
                            @if ($mapel->kelompok == 'A')
                                selected
                            @endif
                        >Hufadz</option>
                        <option value="B"
                            @if ($mapel->kelompok == 'B')
                                selected
                            @endif
                        >Diniyah</option>
                        <option value="C"
                            @if ($mapel->kelompok == 'C')
                                selected
                            @endif
                        >Umum</option>
                    </select>
                </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <a href="#" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
          <button name="submit" class="btn btn-teal"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#back').click(function() {
        window.location="{{ route('mapel.index') }}";
        });
    });
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataMapel").addClass("active");
</script>
@endsection