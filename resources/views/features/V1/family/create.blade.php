<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Tambah Keluarga Baru</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form id="form-add-familly">
    @csrf
    <div class="modal-body">
        <div class="mb-3">
            <label for="title" class="form-label">Parent ID</label>
            <select class="form-control" name="parent_id">
                <option value="">Pilih Parent</option>
                @foreach($familly  as $key=> $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>
            <span class="error text-danger d-none"></span>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" placeholder="name" id="name">
            <span class="error text-danger d-none"></span>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <select class="form-control" name="gender" id="gender">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="LAKI-LAKI">LAKI-LAKI</option>
                <option value="PEREMPUAN">PEREMPUAN</option>

            </select>
            <span class="error text-danger d-none"></span>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Save</button>
    </div>
</form>

