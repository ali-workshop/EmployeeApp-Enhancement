

<!DOCTYPE html>
<html lang="en">
<head>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
  .error{
   color: #FF0000; 
  }
</style>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Account Updated Form</title>
</head>
<body>

<h2>Account Updated Form</h2>

<form name='udpdateajaxform' id='udpdateajaxform' action="{{route('manager.update.name',['sname' =>$user->sname])}}" method="post">
  @csrf
  @method("PUT")
  <label for="name">Name:</label><br>
  <input value={{$user->name}} type="text" placeholder="name" name="name" required><br><br>
  <label for="name">Second Name:</label><br>
  <input value={{$user->sname}} type="text" placeholder="name" name="sname" required><br><br>

  <label for="password">Password:</label><br>
  <input value={{$user->password}}  type="password" placeholder="password" name="password" required><br><br>

  <label for="email">Email:</label><br>
  <input value={{$user->email}} type="email" placeholder="email" name="email" required><br><br>

  <label for="role">Role:</label><br>
  <select placeholder="role" name="role" required>
    <option value="{{$user->role}}">Select Role</option>
    <option value="manager">Manager</option>
    <option value="employee">Employee</option>
  </select><br><br>

  <input type="submit" value="Update Account">
</form>

</body>
</html>

<script>
  if ($("#udpdateajaxform").length > 0) {
  $("#udpdateajaxform").validate({
    rules: {
      name: {
      required: true,
      maxlength: 50
    },
    sname:{
      required: true,
      maxlength: 50

    },
    email: {
      required: true,
      maxlength: 50,
      email: true,
    },  
    password: {
      required: true,
      maxlength: 50
    }, 
    role:{
      required:true,
      
    }  
    },
    messages: {
    name: {
      required: "Please enter name it is required",
      maxlength: "Your name maxlength should be 50 characters long."
    },
    email: {
      required: "Please enter valid email",
      email: "Please enter valid email",
      maxlength: "The email name should less than or equal to 50 characters",
    },   
    password: {
      required: "Please enter the password it's required man",
      maxlength: "Your password  maxlength should be 50 characters long."
    },
    role:{
      required:'please enter role for the user'

    },
    },
    submitHandler: function(form) {
    $.ajaxSetup({
   
    });
  
    $('#submit').html('Please Wait...');
    $("#submit"). attr("disabled", true);
  
    $.ajax({
      url: {{ route('manager.update.name', ['sname' => $user->name]) }},
      type: "POST",
      data: $('#udpdateajaxform').serialize(),
      success: function( response ) {
        $('#submit').html('Submit');
        $("#submit"). attr("disabled", false);
        alert(response.message);
        document.getElementById("udpdateajaxform").reset(); 
      },
      error: function( response ) {
        $('#submit').html('Submit');
        $("#submit"). attr("disabled", false);
        console.log(response.responseJSON.message);
        alert(response.responseJSON.message);
        document.getElementById("udpdateajaxform").reset(); 
      }
     });
    }
    })
  }
  </script>
