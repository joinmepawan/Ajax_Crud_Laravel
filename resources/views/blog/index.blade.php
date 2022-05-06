@extends('sidebar')


@section('content')

<div class="bg-light p-4 rounded">
        <h3>Blogs</h3>
        <a style="float:right" class="btn btn-primary" href="{{url('/blogform')}}">Add Blog</a>
        <!-- <div class="lead">
            Users
            <a href="{{url('/addUser')}}" class="btn btn-primary btn-sm float-right">Add new user</a>
        </div> -->
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Title</th>
                <th scope="col" width="10%">Description</th>
                <th scope="col" width="1%" colspan="3">Action</th>    
            </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach($blog as $blogs)
                    <tr>
                        <th scope="row"><?php echo $i++;?></th>
                        <td>{{ $blogs->title }}</td>
                        <td>{{ $blogs->description }}</td>
                        <td><a href="{{url('/updateblog')}}/{{$blogs->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                        <td><a onclick="return confirm('Are you sure?')" href="{{url('/blogdelete')}}/{{$blogs->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
