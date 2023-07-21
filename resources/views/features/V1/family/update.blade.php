<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ubah Keluarga Baru</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form id="form-update-familly">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="modal-body">
        <div class="mb-3">
            <label for="title" class="form-label">Parent ID</label>
            <select class="form-control" name="parent_id">
                <option value="">Pilih Parent</option>
                @foreach($familly  as $key=> $d)
                    <option value="{{$d->id}}" {{($d->id == $data->parent_id ?"selected" :"")}}>{{$d->name}}</option>
                @endforeach
            </select>
            <span class="error text-danger d-none"></span>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" placeholder="name" id="name" value="{{$data->name}}">
            <span class="error text-danger d-none"></span>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <select class="form-control" name="gender" id="gender">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="LAKI-LAKI" {{$data->gender == "LAKI-LAKI" ? "selected" :""}}>LAKI-LAKI</option>
                <option value="PEREMPUAN" {{$data->gender == "PEREMPUAN" ? "selected" :""}}>PEREMPUAN</option>

            </select>
            <span class="error text-danger d-none"></span>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Save</button>
    </div>
</form>

