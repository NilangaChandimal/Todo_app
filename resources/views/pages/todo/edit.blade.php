<form action="{{ route('todo.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                    <input class="form-control" type="text" name="title" placeholder="Enter the Task"
                        aria-label="default input example">
                </div>
            </div>
            <div class="col-lg-4">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</form>
