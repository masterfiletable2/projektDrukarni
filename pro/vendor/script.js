//Adding active element in menu

let lastURLSegment = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
$(`nav li a[href*=${lastURLSegment}]`).parent().addClass("selected")
console.log(lastURLSegment)

//SessionStorage if exsist
if(sessionStorage.getItem('test')){
    $(".urlAvatar").val(sessionStorage.getItem('test'))
$(".urlAvatar").attr('src',sessionStorage.getItem('test'))


} 
//Change image upload;

let base64;

$("#avatar").change(function(event) {  
    RecurFadeIn();
    readURL(this); 
    


  });
  $("#avatar").on('click',function(event){
    RecurFadeIn();


  });
  function readURL(input) {    
    if (input.files && input.files[0]) {   
      var reader = new FileReader();
      var filename = $("#avatar").val();
      filename = filename.substring(filename);
    //   filename = filename.substring(filename.lastIndexOf('\\')+1);

      reader.onload = function(e) {
        $('.avatar').attr('src', e.target.result);
        $('.avatar').hide();
        $('.avatar').fadeIn(500);      
        $('.custom-file-label').text(filename);    

    //adding uploaded avatar to localstorage

    base64 = e.target.result;


  //Create SessionStorage
    sessionStorage.setItem('test', base64);
    $(".urlAvatar").val(sessionStorage.getItem('test'))
    


      }
      reader.readAsDataURL(input.files[0]);    
    } 
    $(".alert").removeClass("loading").hide();


  }
  function RecurFadeIn(){ 
    console.log('ran');
    FadeInAlert("Wait for it...");  

  }
  function FadeInAlert(text){
    $(".alert").show();
    $(".alert").text(text).addClass("loading");  

  }


 

//SessionStorage if Avatar hasn't url

if($("#avatar").val() != ""){

        $(".editForm").submit(function(){
           
            sessionStorage.setItem('test', base64);
        });


}



