@extends('admin.layout.admin')
@section('title')
    Gallery
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Gallery</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Gallery</li>
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
                            <h5>Add Images</h5>
                        </div>
                        <form class="form theme-form" method="post" action="{{route('admin.gallery.store')}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="image">Images</label>
                                            <div class="inner-form">
                                                <input class="form-control w-50" id="image-input" name="image[]" type="file"
                                                    accept="image/*" multiple="multiple">
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
                                <h3>Gallery</h3>
                            </div>
                            <div class="table-responsive">
                                    <table class="display" id="data-source-1" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($images as $item)
                                            <tr>
                                            <td>{{$loop -> index +1}}</td>
                                                <td><img src="{{asset('uploads/gallery/'.$item->image)}}" width="70px" height="80px" alt=""></td>
                                                <td>  {{-- delete data --}}
                                                    <form action="{{ route('admin.gallery.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
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
                                                <th>Image</th>
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

