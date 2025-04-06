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
                <a class="navbar-brand" href="#">Location</a>
            </div>

            @if (session('success'))
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
                            Add Location
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
                            <h4 class="title">Location</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>S.No</th>
                                    <th>City</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($data as $items)
                                    <tr>
                                        <td>{{ $items->id }}</td>
                                        <td>{{ $items->city }}</td>
                                        <td>{{ $items->created_at }}</td>
                                        <td>{{ $items->status }}</td>
                                        <td>
                                            <a class="btn btn-info noModal" data-id={{ $items->id }}  data-name={{ $items->city }} data-status={{ $items->status }} class="">Edit</a>
                                            {{-- <a href="{{ route('delete_category', $items->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a> --}}
                                        </td>
                                        <td>
                                            <form action="{{ route('delete_location', $items->id) }}" method="post" onsubmit="return confirm('are you want sure')">
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
    <div class="modal exampleModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="myForm" id="myForm" method="post" action="{{ route('store_location') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">City</label>
                            <input type="text" class="form-control" name="name" id="city"
                                placeholder="Enter City" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option selected disabled>Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Location</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- EDIT Modal -->
    <div class="modal exampleModal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="myForm" id="myForm" method="post" action="{{ route('update_location') }}">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="name">City</label>
                            <input type="text" class="form-control" name="name" id="City" placeholder="Enter City" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="Status" required>
                                <option selected disabled>Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Location</button>
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
            $('.exampleModal').on('hide.bs.modal', function(e) {
                if ($('#status').val() === '') {
                    alert('Please select a status.');
                    return false;
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '.noModal', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var status = $(this).data('status');
            $('#id').val(id);
            $('#City').val(name);
            $('#Status').val(status);
            $('#editModal').modal('show');
        });
    </script>
@endpush
