<form method="POST" action="{{route('family.delete',$model->id)}}">
    @csrf
    @method("DELETE")
    <button class="btn btn-danger" type="submit">Delete</button>
    <button class="btn btn-primary btn-edit-familly" data-id="{{$model->id}}">Update</button>
</form>
