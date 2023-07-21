@extends('templates.main')
@section('content')
    <a href="#" class="btn btn-success btn-sm mt-5" id="add-familly-button">Tambah</a>
    <div class="card bg-transparent border-success mt-3">
        <div class="card-header bg-secondary">
            <div class="d-flex justify-content-between text-white">
                Daftar Family
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="table-family">
                    <thead>
                    <tr>
                        <td>No</td>
                        <td>Parent</td>
                        <td>Name</td>
                        <td>Gender</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-familly-show" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/data-tables/dataTables.bootstrap5.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/data-tables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/data-tables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('scripts/familly.js')}}"></script>
    <script src="{{ asset('scripts/alert.js')}}"></script>
    <script src="{{ asset('scripts/validation.js')}}"></script>
@endpush
