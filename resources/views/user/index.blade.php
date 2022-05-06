@extends('sidebar')


@section('content')

<div class="bg-light p-4 rounded">
        <h3>Users</h3>
        <!-- <div class="lead">
            Users
            <a href="{{url('/addUser')}}" class="btn btn-primary btn-sm float-right">Add new user</a>
        </div> -->
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col">Email</th>
                <th scope="col" width="10%">Address</th>
                <th scope="col" width="10%">Mobile</th>
                <th scope="col" width="1%" colspan="3">Action</th>    
            </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach($users as $user)
                    <tr>
                        <th scope="row"><?php echo $i++;?></th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td><a href="{{url('/updateuser')}}/{{$user->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                        <td><a onclick="return confirm('Are you sure?')" href="{{url('/userdelete')}}/{{$user->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
