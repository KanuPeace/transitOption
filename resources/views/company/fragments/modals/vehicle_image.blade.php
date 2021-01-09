<div class="modal fade" id="editImageModal_{{ $image->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Edit Vehicle Image</h4>
            </div>
            <form action="{{ route('company.vehicles.images.update', $image->id) }}" method="post"
                enctype="multipart/form-data">@csrf @method("put")
                <div class="modal-body">
                    <label for="">Select Image</label>
                    <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}" id="" required>
                    <input type="file" name="image" class="form-control" id="" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                    <button type="submit" class="btn btn-success">Proceed</button>
                </div>
            </form>
        </div>
    </div>
</div>
