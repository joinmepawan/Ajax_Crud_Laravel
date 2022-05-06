@extends('sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    .modal {
        display:    none;
        position:   fixed;
        z-index:    1000;
        top:        0;
        left:       0;
        height:     100%;
        width:      100%;
        background: rgba( 255, 255, 255, .8 ) 
                url('http://i.stack.imgur.com/FhHRx.gif') 
                50% 50% 
                no-repeat;
        }

        /* When the body has the loading class, we turn
        the scrollbar off with overflow:hidden */
        body.loading .modal {
            overflow: hidden;   
        }

        /* Anytime the body has the loading class, our
        modal element will be visible */
        body.loading .modal {
            display: block;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="con">
    <form  id="form" enctype="multipart/form-data" >
        @csrf
        
        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" class="form-control" required id="name" name="name">
         
        </div>
       <div class="form-group mb-3">
            <label>Phone</label>
            <input type="text" id="phone" name="phone"class="form-control" required>
       </div>
       <div class="form-group">
       <label>Chose FIle</label>
       <input type="file" name="image" onchange="loadFile(event)" id="image" class="form-control"required>
       
      
       </div>
       <div class="form-group">
       <img src="" id="image1" alt="">
       <span></span>
       <span style="display:none;" id="remove" class="fa fa-trash" onclick="Remove()"></span>
       </div>
      
       <input type="submit">
      
    
</form>

<div class="modal"><!-- Place at bottom of page --></div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $(document).ready(function(){
            if($('#form').length>0){
                $('#form').validate({
                    rules:{
                        name :{
                            required:true,
                            maxlength: 50
                        },
                        mobile:{
                            required:true,
                            maxlength: 10
                        },
                        image:{
                            required:true,
                            extension: "jpg|jpeg|png|ico|bmp"
                        },
                        message:{
                            name:{
                                required: 'Enter Name',
                                
                            }
                        }
                    }
                })
            }
        })
    function Remove(){
      //  alert()
        var output = document.getElementById('image1');
      output.src = "";
      $('#image').val("")
      $('#remove').hide()
    }
    var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('image1');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
    $('#remove').show()

  };
    $('#form').on('submit', function(event){
        $body = $("body");
        $body.addClass("loading"); 
        event.preventDefault();
        console.log(new FormData(this))
        var form=new FormData(this)  
              $.ajax({
              url: "{{url('/employee')}}",
              type:"POST",
              data:form,
              processData: false,
              contentType: false,
          success:function(data)
          {
            $("#form")[0].reset();
            $("body").removeClass("loading");
            
            setTimeout(()=>{
                alert('User added successfully');
                $("#form")[0].reset();
                //form.reset('#form');
                window.location="{{url('/employee')}}";
            },500)
          }
        })

    })


        </script>
</body>
</html>
@endsection