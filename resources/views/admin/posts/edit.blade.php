<x-admin-master>

    @section('content')

        <h1 class="h3 mb-4 text-gray-800">Create Post</h1>

        <form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')
            <div class="form-group" >
                <label for="">Title</label>
                <input  value="{{$post->title}}" type="text" name="title" class="form-control" aria-describedby="" id="title">
            </div>
            <dix class="form-group">
                <label for="">File</label>
                <img src="{{$post->post_image}}" height="100px" alt="" class="">
                <input type="file" name="post_image" class="form-control-file" id="post_image">
            </dix>
            <div class="form-group">
                <label for="" class="">Body</label>
                <textarea type="text" class="form-control" name="body" id="body" cols="30" rows="10">value="{{$post->title}}"</textarea>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>

        </form>

    @endsection

</x-admin-master>
