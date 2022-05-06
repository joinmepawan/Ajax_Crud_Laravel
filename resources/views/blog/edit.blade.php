@extends('sidebar')
@section('content')

         <form method="post" id="student_form">
              
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                    <input type="hidden" name="id" value="{{$blog->id}}" id="title" class="form-control" />
                        <label>Title</label>
                        <input type="text" name="title" value="{{$blog->title}}" id="title" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" value="{{$blog->description}}" id="description" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    
                    <input type="submit" name="submit" id="action" value="Edit Blog" class="btn btn-primary" />
                    
                </div>
            </form>

<script type="text/javascript">
$(document).ready(function() {
    
    $('#student_form').on('submit', function(event){
        //alert();
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            //url:"updateblogtest",
            url: "{{url('/updateblogtest')}}",
            method:"POST",
            data:form_data,
            dataType:"json",
            success:function(data)
            {
             alert('Blog updated successfully');
            //    console.log(data);
            setTimeout(()=>{
                window.location="{{url('/blog')}}";
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
