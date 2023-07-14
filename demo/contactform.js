$(document).ready(function () {
    $("#contact_msg").hide();
   $.validator.addMethod(
      "notplaceholder", 
      function(value, element){
        return ($(element).attr("placeholder") != value);
      }, 
         "Please enter a value"
      );
      $("#contact_form").validate({
      rules:  {
        name:  {
       required    : true,
       notplaceholder  : true
               },
       
       email:  {
       required    : true,
       email: true,
       notplaceholder  : true
       },
     
                   },
              messages: {
                name:"Please enter your First Name",

                  email: { 
                  required : "Please enter your Email ",
                  email : "Please enter a valid Email",
                  },
                 
              },
               submitHandler: function(form) { 
           $("#contact_msg").show();
          $.ajax({
             type: "POST",
             url: "contactform.php",
            data:  $(form).serialize(), // serializes the form's elements.
            success: function(data)
             {
                 $("#contact_msg").html(data);
                  $('#contact_form').trigger("reset");  // show response from the php script.
             }
           });
    }		
   }); 
  });



  