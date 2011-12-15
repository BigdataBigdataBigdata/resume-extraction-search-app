

function search()
{
    
   alert($('#searchfirst_name').val);
     if($('#city').val)
         {
             city= $('#city').val;
             alert(city);
         }
         if($('#first_name').val)
         {
             first_name = $('#first_name').val;
         }
         if($('#last_name').val)
         {
             last_name= $('#last_name').val;
         }
         if($('#email').val)
         {
             email= $('#email').val;
         }
         if($('#zip').val)
         {
             zip= $('#zip').val;
         }
         if($('#degree').val)
         {
             degree= $('#degree').val;
         }
        if($('#college').val)
         {
             college = $('#college').val;
         }
         if($('#skills').val)
         {
             skills= $('#skills').val;
         }
         if($('#exp').val)
         {
             exp = $('#exp').val;
         }
         if($('#state').val)
         {
             state = $('#state').val;
         }
         
         $.get("search.php", { first_name: first_name, last_name: last_name, email: email, city: city,state: state,
             zip: zip, degree: degree, college: college, skills: skills,exp: exp
     },
   function(data){
     alert("Data Loaded: " + data);
   });
}