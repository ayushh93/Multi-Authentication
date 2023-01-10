@extends('admin.layout.admin')
@section('title')
    Reviews
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Reviews</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Reviews</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <!-- HTML (DOM) sourced data  Starts-->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3>Reviews</h3>
                            <a class="btn btn-primary cart-btn-transform pull-right"
                                href="{{ route('admin.about.reviews.create') }}">Add Review</a>
                        </div>
                        @include('admin.layout.includes.message')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="data-source-1" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Exerpt</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @isset($reviews)
                                          @foreach ($reviews as $item)
                                              <tr>
                                                
                                                <td>{{$loop->index+1}}</td>
                                                <td><img src="{{ asset('uploads/about/reviews/' . $item->image) }}" width="60px"
                                                    height="60px"></td>
                                                <td>{{$item->name}}</td>
                                                <td>{!!Str::limit($item->excerpt,200)!!}</td>
                                                <td class="d-flex"> 
                                                     {{-- view data --}}
                                                     <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                     data-bs-target="#view_content{{ $item->id }}" style="margin-right: 2px">
                                                         <i class="fa fa-eye"></i>
                                                     </button>
                                                    {{-- edit data --}}
                                                    <a href="{{ route('admin.about.reviews.edit', $item->id) }}">
                                                        <button class="btn btn-success btn-sm" style="margin-left: 2px">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                    </a>
                                                    {{-- delete data --}}
                                                    <form action="{{ route('admin.about.reviews.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" id="confirm_delete"
                                                            class="btn btn-danger confirm_delete" style="margin-left: 2px" data-name="{{ $item->name }}">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                              </tr>
                                               <!-- Add Department Modal -->
                                            <div id="view_content{{ $item->id }}" class="modal fade"
                                                role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Review Details</h5>
                                                            <button type="button" class="close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body p-2">
                                                            <p><strong>Name:</strong>{{ $item->name }}
                                                            </p>
                                                            </p>
                                                            <p><strong>Excerpt: </strong>
                                                            </p>
                                                            <p>
                                                                {!! $item->excerpt !!}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          @endforeach
                                      @endisset
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Exerpt</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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