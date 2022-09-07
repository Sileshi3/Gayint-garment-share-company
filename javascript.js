function login_validate(){  
var name=document.login.username.value;  
var password=document.login.password.value;  
var status=false;  
if(name==""){  
document.getElementById("username").innerHTML=" <img src='images/unchecked.gif'/> Please Enter your Username";  
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
var cname=document.Register.Cname.value;  
var phone=document.Register.phone.value;
var Email=document.Register.Email.value;
var pass=document.Register.pass.value;
var passagain=document.Register.passagain.value;
var username=document.Register.username.value;
var status=false; 
if(name==""){  
document.getElementById("name").innerHTML="Please Enter Fullname";  
status=false;
}else{  
document.getElementById("name").innerHTML=" <img src='images/checked.gif'/>";  
status=true;
}  
if(cname==""){  
document.getElementById("companyname").innerHTML="Please Enter Companyname";  
status=false; 
}else{  
document.getElementById("companyname").innerHTML=" <img src='images/checked.gif'/>"; 
status=true;  
}  
if(phone==""){
document.getElementById("id").innerHTML="Please Enter Phone Number"; 
status=false;
}
 else{  
document.getElementById("id").innerHTML=" <img src='images/checked.gif'/>"; 
status=true;  
}   
 if(Email==""){
document.getElementById("email").innerHTML="Please Enter Valid Email"; 
status=false;
}
 else{  
document.getElementById("email").innerHTML=" <img src='images/checked.gif'/>"; 
status=true;  
}
if(pass==""){
document.getElementById("pass").innerHTML="Please Enter password"; 
status=false;
}
 else{  
document.getElementById("pass").innerHTML=" <img src='images/checked.gif'/>"; 
status=true;  
}
if(pass!=passagain){
document.getElementById("passagain").innerHTML="Password Do Not Match"; 
status=false;
}
else if(passagain==""){
document.getElementById("passagain").innerHTML="Enter Password"; 
status=false;
}
 else{  
document.getElementById("passagain").innerHTML=" <img src='images/checked.gif'/>"; 
status=true;  
}
if(username==""){
document.getElementById("username").innerHTML="Please Enter Username"; 
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
    document.getElementById("name").innerHTML=" <img src='images/unchecked.gif'/> Please Enter your Name";  
  status=false;
}else{  
document.getElementById("name").innerHTML=" <img src='images/checked.gif'/>";  
status=true;
}
if (document.contact.email.value=="") {
    document.getElementById("email").innerHTML=" <img src='images/unchecked.gif' />Please enter valid Email Address";
 status=false;
} 
else{
document.getElementById("name").innerHTML=" <img src='images/checked.gif'/>";  
status=true;
}
if (document.contact.subject.value=="") {
    document.getElementById("subject").innerHTML=" <img src='images/unchecked.gif' />Please enter subject";
status=false;
} 
else{
document.getElementById("subject").innerHTML=" <img src='images/checked.gif'/>";  
status=true;
}
return status;
}