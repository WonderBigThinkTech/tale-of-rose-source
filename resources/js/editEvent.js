import Swal from 'sweetalert2'

export default function editEvent() {
  
   const editButton = document.querySelectorAll('.edit-event-modal') 
   
  //edit type
  for (let t = 0; t < editButton.length; t++) {
   
   editButton[t].addEventListener('click', () => {    
    const event = editButton[t].ariaValueNow
   
     Swal.fire({
  title: "Enter new Name:",
  input: "text", 
  showCancelButton: true,
  confirmButtonText: "Change Name",
  showLoaderOnConfirm: true,  
  allowOutsideClick: () => !Swal.isLoading()
}).then((result) => {  
    
  if (result.isConfirmed) {
    const link = `${window.location.origin}/account/admin/events/`+ event;    
    axios.put(link, {name: result.value, headers: 
      { 'Content-Type': 'application/json' }
     } ). then ((response) => {   
       location.reload(true)     
     
    })
  }
  
});
  })}
 

}