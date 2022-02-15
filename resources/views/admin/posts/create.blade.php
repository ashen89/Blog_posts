<x-admin-master>

    @section('content')

        <h1 class="h3 mb-4 text-gray-800">Create Post</h1>

        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data" >
            @csrf

            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" aria-describedby="" id="title">
            </div>
            <dix class="form-group">
                <label for="">File</label>
                <input type="file" name="post_image" class="form-control-file" id="post_image">
            </dix>
            <div class="form-group">
                <label for="" class="">Body</label>
                <textarea type="text" class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>

        </form>

    @endsection

</x-admin-master>
