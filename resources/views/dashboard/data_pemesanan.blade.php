@extends('dashboard.layout.main')

@section('title','Kokonseran - Admin|Data Pemesanan')

@section('page-heading','Data Pemesanan')

@section('css')
     <!-- Custom styles for this page -->
     <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        
    </div>
    <div class="card-body">
        @if (session()->has('sukses'))
                                    
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             {{ session('sukses') }}
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id Tiket</th>
                        <th>Nama Lengkap</th>
                        <th>No Hp</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id Tiket</th>
                        <th>Nama Lengkap</th>
                        <th>No Hp</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->ticket_id}}</td>
                            <td>{{ $reservation->name}}</td>
                            <td>{{ $reservation->no_hp}}</td>
                            <td>{{ $reservation->email}}</td>
                            <td>{{ $reservation->status}}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#UbahDataPemesanan{{ $reservation->id }}">Ubah</button>
                                <form action="/admin/data_pemesanan/{{ $reservation->id }}" class="d-inline-flex" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        {{-- modal ubah status --}}
                        <div class="modal fade" id="UbahDataPemesanan{{ $reservation->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data Pemesanan</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/admin/data_pemesanan/{{ $reservation->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Id Tiket</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $reservation->ticket_id }} " readonly>
                                          </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $reservation->name }}">
                                          </div>
                                          <div class="mb-3">
                                            <label for="no_hp" class="form-label">No HP</label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp"  value="{{ $reservation->no_hp}}">
                                          </div>
                                          <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"  value="{{ $reservation->email }}">
                                          </div>
                                          <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <input type="text" class="form-control" id="status" name="status"  value="{{ $reservation->status }}">
                                          </div>
                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                            
                                            
                                          
                                    </form>
                                </div>
                               
                              </div>
                            </div>
                          </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


@section('js')
     <!-- Page level plugins -->
     <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
     <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>
@endsection