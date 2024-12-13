import Swal from 'sweetalert2'

export default function editType() {
  
   const editTypeButton = document.querySelectorAll('.edit-type-modal') 
   
  //edit type
  for (let t = 0; t < editTypeButton.length; t++) {
   
   editTypeButton[t].addEventListener('click', () => {    
    const type = editTypeButton[t].ariaValueNow
   
     Swal.fire({
  title: "Enter new Name:",
  input: "text", 
  showCancelButton: true,
  confirmButtonText: "Change Name",
  showLoaderOnConfirm: true,  
  allowOutsideClick: () => !Swal.isLoading()
}).then((result) => {  
    
  if (result.isConfirmed) {
    const link = `${window.location.origin}/account/admin/types/`+ type;    
    axios.put(link, {name: result.value, headers: 
      { 'Content-Type': 'application/json' }
     } ). then ((response) => {   
       location.reload(true)     
     
    })
  }
  
});
  })}
 

}