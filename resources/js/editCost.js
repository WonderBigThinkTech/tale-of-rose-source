import Swal from 'sweetalert2'

export default function editCost() {
  
   const editButton = document.querySelectorAll('.cost-edit-button') 
    const saveButton = document.querySelectorAll('.cost-save-button') 
   const standards = document.querySelectorAll('.standard-cost') 
   const expresses = document.querySelectorAll('.express-cost') 
   
  
  //edit type
  for (let t = 0; t < editButton.length; t++) {
    
   editButton[t].addEventListener('click', () => { 
    
    standards[t].disabled = false;
    expresses[t].disabled = false;
    saveButton[t].style.display = 'block';
    editButton[t].style.display = 'none';
    
    
   
     
  })}
 

}