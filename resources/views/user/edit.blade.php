@extends('sidebar')
@section('content')
    <div class="bg-light p-4 rounded">
        <h3>Edit user</h3>
        <div class="lead">
            
        </div>
        <div class="container mt-4">
            <form method="post" action="{{url('/updateuser/'.$user->id)}}">
                @method('post')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $user->name }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ $user->email }}"
                        type="email" 
                        class="form-control" 
                        name="email" 
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input value="{{ $user->address }}"
                        type="text" 
                        class="form-control" 
                        name="address" 
                        placeholder="Address" required>
                    @if ($errors->has('address'))
                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input value="{{ $user->mobile }}"
                        type="text" 
                        class="form-control" 
                        name="mobile" 
                        placeholder="Mobile" required>
                    @if ($errors->has('mobile'))
                        <span class="text-danger text-left">{{ $errors->first('mobile') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update user</button>
                <a href="" class="btn btn-default">Cancel</button>
            </form>
        </div>

    </div>
@endsection