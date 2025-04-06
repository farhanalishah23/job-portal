@extends('backend.layout.master')
@section('content')

    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Add Data</a>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Add Data</h4>
                        </div>
                        <div class="content">
                            <form method="post" action="" >
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="status">Categories</label>
                                        <select class="form-control"  required>
                                            <option>Category One</option>
                                            <option>Category Two</option>
                                            <option>Category Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter Title" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea rows="5" name="description" class="form-control" placeholder="Here can be your description" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <a type="button" href="{{route('data')}}" class="btn btn-info btn-info">Cancel</a>
                                <button type="submit" class="btn btn-primary">Add Data</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
