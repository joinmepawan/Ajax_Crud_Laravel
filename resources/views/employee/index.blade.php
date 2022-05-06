@extends('sidebar')

@section ('content')
@if (session('success'))
    <div class="alert alert-success" id="message">
        {{ session('success') }}
    </div>
@endif

    <a href="{{url('/upload')}}" class="btn btn-primary float-end">Add Employee</a>  
      <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col" width="10%">Phone</th>
                <th scope="col" width="10%">Image</th>
                <th scope="col" width="1%" colspan="3">Action</th>    
            </tr>
            </thead>
            <tbody>
            <?php $i=1; ?>
                @foreach($employees as $emp)
                    <tr>
                        <th scope="row"><?php echo $i++;?></th>
                        <td>{{ $emp->name }}</td>
                        <td>{{ $emp->phone }}</td>
                        <td><img src="{{ asset('/uploads/employee/' . $emp->image) }}" height="50px" width="50px" /></td>
                        <td><a href="{{url('/updateusr')}}/{{$emp->id}}" class="btn btn-primary" style="width:90px"><i class="fa fa-pencil"></i>Edit</a>
                        <a onclick="return confirm('Are you sure?')" href="{{url('/deleteuser')}}/{{$emp->id}}" class="btn btn-danger" style="width:90px; margin-top:6px"><i class="fa fa-trash"></i>Delete</a></td>
                     </tr>
                @endforeach
            </tbody>
        </table>


<script type="text/javascript">
$(document).ready(function() {
  
  $('#AddemployeeFORM').on('submit', function(event){
      //alert();
      event.preventDefault();
      var image= $('#image').val();
     // alert(image);
     var token= $('#token').val();
     var name= $('#name').val();
     var phone= $('#phone').val();
   
      $.ajax({
          url: "{{url('/employee')}}",
          method:"POST",
          data:{name:name,phone:phone,image:image,_token:token},
          dataType:"json",
          success:function(data)
          {
           alert('Employee Added successfully');
            //  console.log(data);
          setTimeout(()=>{
              window.location="{{url('/employee')}}";
          },2000)
         
          },
          error:function(data){
              alert('wrong'+data);
          }
      })
  });



});
</script>
@endsection
