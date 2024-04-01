<!-- resources/views/comment_form.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Comment</div>

                <div class="card-body">
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                        </div>
                        <input type="hidden" name="id_tracking" value="{{ $id_tracking }}">
                        <!-- Add other fields as needed -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
