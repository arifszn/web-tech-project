function indexValidate(){
       

     if(document.getElementById('id').value=="")
        {
            alert("Id is Empty");
            return false;
        }
    
    if(document.getElementById('password').value=="")
        {
            alert("Password is Empty");
            return false;
        }
    
    
    
}


function createNewStudentValidate(){
    if(!isNaN(document.getElementById('name').value))
        {
            alert("Invalid Name");  
            return false;
        }
    
    if(document.getElementById('name').value=="")
        {
            alert("Name is Empty");
            return false;
        }
     if(document.getElementById('password').value=="")
        {
            alert("Password is Empty");
            return false;
        }
   
     if(document.getElementById('id').value=="")
        {
            alert("Id is Empty");
            return false;
        }
    
   
    
    if(document.getElementById('email').value=="")
        {
            alert("Email is Empty");
            return false;
        }
    if(document.getElementById('birthdate').value=="")
        {
            alert("Birthdate is Empty");
            return false;
        }
    if(document.getElementById('bloodgroup').value=="")
        {
            alert("Blood Group is Empty");
            return false;
        }  
    var re=/\S+@\S+\.\S+/;
     if (!re.test(document.getElementById('email').value))  
     {  
         alert("Invalid Email");
        return false;  
    } 
    
    
    
    
    
}
function editStudentValidate()
{
     if(document.getElementById('name').value=="")
        {
            alert("Name is Empty");
            return false;
        }
		if(document.getElementById('email').value=="")
        {
            alert("Email is Empty");
            return false;
        }
   
     if(document.getElementById('birthdate').value=="")
        {
            alert("Birthdate is Empty");
            return false;
        }
     if(document.getElementById('bloodgroup').value=="")
        {
            alert("Blood Group is Empty");
            return false;
        }
    
	if(document.getElementById('gender').value=="")
        {
            alert("Gender is Empty");
            return false;
        }
 }


function assignCourse(){
   if(document.getElementById('sId').value=="")
        {
            alert("Student ID is Empty");
            return false;
        }
     
    
    
    
}


function addCourse(){
    
     if(document.getElementById('courseName').value=="")
        {
            alert("Course Name is Empty");
            return false;
        }
    
    if(document.getElementById('courseId').value=="")
        {
            alert("Course ID is Empty");
            return false;
        }
    if(document.getElementById('description').value=="")
        {
            alert("Description is Empty");
            return false;
        }
    
}
function editCourse()
{
   
     if(document.getElementById('courseName').value=="")
        {
            alert("Course Name is Empty");
            return false;
        }
    if(document.getElementById('courseDescription').value=="")
        {
            alert("Description is Empty");
            return false;
        }
    
}

function createNewTurorial(){
   
     
    
    if(document.getElementById('tutorialTitle').value=="")
        {
            alert("Title is Empty");
            return false;
        }
    if(document.getElementById('tutorialLink').value=="")
        {
            alert("Link is Empty");
            return false;
        }
    
}
function editTurorial(){
   if(document.getElementById('courseId').value=="")
        {
            alert("Course Id is Empty");
            return false;
        }
     
    
    if(document.getElementById('tutorialTitle').value=="")
        {
            alert("Title is Empty");
            return false;
        }
    if(document.getElementById('tutorialLink').value=="")
        {
            alert("Link is Empty");
            return false;
        }
    
}


function changePassword(){
   if(document.getElementById('oldPassword').value=="")
        {
            alert("Old Password is Empty");
            return false;
        }
     
    
    if(document.getElementById('newPassword').value=="")
        {
            alert("New Password is Empty");
            return false;
        }
    if(document.getElementById('confirmPassword').value=="")
        {
            alert("Confirm Password is Empty");
            return false;
        }
    

    if(document.getElementById('confirmPassword').value!=document.getElementById('newPassword').value)
        {
            alert("Passwords do not match");
            return false;
        }
    
    
}
