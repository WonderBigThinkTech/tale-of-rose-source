import Swal from 'sweetalert2'

export default function editColor() {
  
   const editButton = document.querySelectorAll('.edit-color-modal') 
   
  //edit type
  for (let t = 0; t < editButton.length; t++) {
   
   editButton[t].addEventListener('click', () => {    
    const color = editButton[t].ariaValueNow
   
     Swal.fire({
  title: "Enter new Color name:",
  input: "text", 
  title: "Upload another image:",
  showCancelButton: true,
  confirmButtonText: "Change Name",
  showLoaderOnConfirm: true,  
  allowOutsideClick: () => !Swal.isLoading()
}).then((result) => {  
    
  if (result.isConfirmed) {
    const link = `${window.location.origin}/account/admin/colors/`+ color;    
    axios.put(link, {name: result.value, headers: 
      { 'Content-Type': 'application/json' }
     } ). then ((response) => {   
       location.reload(true)     
     
    })
  }
  
});
  })}
 

}