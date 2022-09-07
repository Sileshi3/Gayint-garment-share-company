//function login_form(){
	//var x = document.forms["login_form"]["username"].value;
    //if (x == "") {
      //  alert("Username must be filled out");
    //    return false;
  //  }
//}

function login_validate(){  
var name=document.login_form.username.value;  
var password=document.login_form.password.value;  
var status=false;  
if(name==""){  
document.getElementById("username").innerHTML=" <img src='images/unchecked.gif'/> Please Enter Username";  
status=false;
}
else{  
document.getElementById("username").innerHTML=" <img src='images/checked.gif'/>";  
status=true;
}  
if(password.length==""){  
document.getElementById("password").innerHTML="<img src='images/unchecked.gif'/> Please Enter Password";  
status=false; 
}
else{  
document.getElementById("password").innerHTML=" <img src='images/checked.gif'/>";  
}  
return status;  
}  
function register_validate(){  
var name=document.Register.Fname.value;  
var fname=document.Register.lname.value;  
var id=document.Register.id.value;
var Email=document.Register.email.value;
var pass=document.Register.pass.value;
var passagain=document.Register.passagain.value;
var username=document.Register.username.value;
var status=false; 
if(name==""){  
document.getElementById("name").innerHTML=" <img src='images/unchecked.gif'/> Please Enter your Username";  
status=false;
}else{  
document.getElementById("name").innerHTML=" <img src='images/checked.gif'/>";  
status=true;
}  
if(fname==""){  
document.getElementById("lastname").innerHTML="<img src='images/unchecked.gif'/> Please Enter your Father Name";  
status=false; 
}else{  
document.getElementById("lastname").innerHTML=" <img src='images/checked.gif'/>"; 
status=true;  
}  
if(id==""){
document.getElementById("id").innerHTML="<img src='images/unchecked.gif'/> Please Enter ID Number"; 
status=false;
}
 else{  
document.getElementById("id").innerHTML=" <img src='images/checked.gif'/>"; 
status=true;  
}   
 if(Email==""){
document.getElementById("email").innerHTML="<img src='images/unchecked.gif'/> Please Enter Valid Email"; 
status=false;
}
 else{  
document.getElementById("email").innerHTML=" <img src='images/checked.gif'/>"; 
status=true;  
}
if(pass==""){
document.getElementById("pass").innerHTML="<img src='images/unchecked.gif'/> Please Enter password"; 
status=false;
}
 else{  
document.getElementById("pass").innerHTML=" <img src='images/checked.gif'/>"; 
status=true;  
}
if(pass!=passagain){
document.getElementById("passagain").innerHTML="<img src='images/unchecked.gif'/> Password Do Not Match"; 
status=false;
}
else if(passagain==""){
document.getElementById("passagain").innerHTML="<img src='images/unchecked.gif'/> Enter Password"; 
status=false;
}
 else{  
document.getElementById("passagain").innerHTML=" <img src='images/checked.gif'/>"; 
status=true;  
}
if(username==""){
document.getElementById("username").innerHTML="<img src='images/unchecked.gif'/> Please Enter Username"; 
status=false;
}
else{  
document.getElementById("username").innerHTML=" <img src='images/checked.gif'/>"; 
status=true;  
}
return status;

}



function contact_validate(){
var status=false;
if (document.contact.name.value=="") {
    document.getElementById("name").innerHTML=" <img src='image/unchecked.gif'/> Please Enter your Name";  
  status=false;
}else{  
document.getElementById("name").innerHTML=" <img src='image/checked.gif'/>";  
status=true;
}
if (document.contact.email.value=="") {
    document.getElementById("email").innerHTML=" <img src='image/unchecked.gif' />Please enter valid Email Address";
 status=false;
} 
else{
document.getElementById("name").innerHTML=" <img src='image/checked.gif'/>";  
status=true;
}
if (document.contact.subject.value=="") {
    document.getElementById("subject").innerHTML=" <img src='image/unchecked.gif' />Please enter subject";
status=false;
} 
else{
document.getElementById("subject").innerHTML=" <img src='image/checked.gif'/>";  
status=true;
}
return status;
}