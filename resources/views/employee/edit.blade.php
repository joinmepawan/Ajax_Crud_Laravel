@extends('sidebar')
@section('content')

         <form id="student_form" enctype="multipart/form-data">
              
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                    <input type="hidden" name="id" value="{{$emp->id}}" id="Name1" class="form-control" />
                        <label>Name</label>
                        <input type="text"class="form-control @error('name') is-invalid @enderror" name="name" value="{{$emp->name}}" id="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{$emp->phone}}" id="phone" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                        <label>Chose FIle</label>
                        <input type="file" name="image" value="{{$emp->image}}" id="image" class="form-control">
                        <img src="{{ asset('uploads/employee/' . $emp->image) }}" height="50px" width="50px" />
      
                </div>
                <div class="modal-footer">
                    
                    <input type="submit" name="submit" id="action" value="Update User" class="btn btn-primary" />
                    
                </div>
            </form>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $('#student_form').on('submit', function(event){

        event.preventDefault();
        console.log(new FormData(this))
        var form=new FormData(this)  
              $.ajax({
            url: "{{url('/updateuserr')}}",
          type:"POST",
          data:form,
          processData: false,
    contentType: false,

          success:function(data)
          {
            alert('User Updated successfully');
            //    console.log(data);
            setTimeout(()=>{
                window.location="{{url('/employee')}}";
            },2000)
           
            // },
            // error:function(data){
            //     alert('wrong'+data);
            // }
            // console.log(data)
          }
        })

    })


    </script>
@endsection
