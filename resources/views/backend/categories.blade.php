@extends('backend.layout.master')
@section('content')

    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Categories</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-dashboard"></i>
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                        <!-- Notifications Dropdown -->
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                              Notifications <i class="fa fa-bell"></i>
                              <span class="badge">{{ count($notifications) }}</span>
                          </a>
                          <ul class="dropdown-menu">
                              @foreach($notifications as $notification)
                                  <li>
                                      <a href="{{route('job_detail' , [$notification->job_id])}}">
                                          {{ $notification->admin_message ?? 'No message available' }}
                                      </a>
                                  </li>
                              @endforeach
                          </ul>
                  
                    <li>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Category
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="content">
        <div class="container-fluid">
            <div class="row">

            <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Categories</h4>
            </div>
            <div class="content table-responsive table-full-width" >
                <table class="table table-hover table-striped" >
                    <thead>
                    <th>S.No</th>
                    <th>Category Name</th>
                    <th>Created Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $items)
                        <tr>
                            <td>{{ $items->id }}</td>
                            <td>{{ $items->categoryname }}</td>
                            <td>{{ $items->created_at }}</td>
                            <td>{{ $items->status }}</td>
                            <td>
                                <a class="btn btn-info editModal" data-id={{$items->id}} data-name={{ $items->categoryname }} data-status={{$items->status}}>Edit</a>
                                {{-- <a href="{{ route('delete_category', $items->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a> --}}
                            </td>
                            <td>
                                <form action="{{ route('delete_category', $items->id) }}" method="post" onsubmit="return confirm('are you want sure')         ">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">delete</button>
                                </form>
                            </td>
                           </tr>
                        @endforeach


                    </tbody>
                </table>

            </div>
        </div>
    </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal exampleModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="myForm" id="myForm" method="post" action="{{route('store_category')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Category</label>
                            <input type="text" class="form-control" name="name" id="category" placeholder="Enter Category" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option selected disabled>Select Status</option>
                                <option name="status" value="active">Active</option>
                                <option name="status" value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- Edit Modal -->
    <div class="modal exampleModal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="myForm" id="myForm" method="post" action="{{route('update_category')}}">
                        @csrf
                        <input name="id" type="hidden" id="categoryId">
                        <div class="form-group">
                            <label for="name">Category</label>
                            <input type="text" class="form-control" name="name" id="categoryName" placeholder="Enter Category" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="categoryStatus" required>
                                <option name="status" value="active">Active</option>
                                <option name="status" value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')


    <script>
        $(document).ready(function() {
            $('.myForm').submit(function(event) {
                if ($('#status').val() === '') {
                    event.preventDefault();
                    alert('Please select a status.');
                }
            });
            $('.exampleModal').on('hide.bs.modal', function (e) {
                if ($('#status').val() === '') {
                    alert('Please select a status.');
                    return false;
                }
            });
        });
    </script>
<script>
      $(document).on('click', '.editModal', function () {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var status = $(this).data('status');
        $('#categoryId').val(id);
        $('#categoryName').val(name);
        $('#categoryStatus').val(status);
        $('#editModal').modal('show');
    });
</script>
@endpush