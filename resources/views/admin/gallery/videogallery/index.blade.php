@extends('admin.layout.admin')
@section('title')
    Video Gallery
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Video Gallery</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Video Gallery</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Add Video</h5>
                        </div>
                        <form class="form theme-form" method="post" action="{{route('admin.gallery.video.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="image">Video</label>
                                            <div class="inner-form">
                                                <input class="form-control w-50" name="video" type="file"  accept="video/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <input class="btn btn-light" type="reset" value="Cancel">
                                </div>
                        </form>
                        <hr>
                        @include('admin.layout.includes.message')
                        <div class="card-body">
                            <div class="card-header">
                                <h3>Video Gallery</h3>
                            </div>
                            <div class="table-responsive">
                                    <table class="display" id="data-source-1" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Video</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($videos as $item)
                                            <tr>
                                            <td>{{$loop -> index +1}}</td>
                                                <td><video width="320" height="240" controls src="{{asset('uploads/gallery/video/'.$item->video)}}" width="70px" height="80px" type="video/*" >Your browser doesnt support this video</video></td>
                                                <td>  {{-- delete data --}}
                                                    <form action="{{ route('admin.gallery.video.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" id="confirm_delete"
                                                            class="btn btn-danger confirm_delete" style="margin-left: 2px" data-name="this image">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </form></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SN</th>
                                                <th>Video</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    </div>
@endsection
@section('js')

<script>
$('.confirm_delete').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Are you sure you want to delete ${name}?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        form.submit();
      }
    });
});
</script>
    
@endsection

