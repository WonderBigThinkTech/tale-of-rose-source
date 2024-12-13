import Swal from 'sweetalert2'

export default function createEvent() {
  
   const createButton = document.querySelector('.create-event-modal') 
   
  //edit type
    
   createButton.addEventListener('click', () => { 
     Swal.fire({
  title: "Create new Event:",
  html:
                '<input name="name" class="swal2-input" placeholder="Event Name" >' +
                '<input name="event_group" class="swal2-input" placeholder="Event Group" >',
  // input: "text", 
  showCancelButton: true,
  confirmButtonText: "Create",
  showLoaderOnConfirm: true,  
  allowOutsideClick: () => !Swal.isLoading()
}).then((result) => { 
    
  if (result.isConfirmed) {
    const json = JSON.stringify(result)
    alert(json)
    const link = `${window.location.origin}/account/admin/events`;    
    axios.post(link, {json, headers:
      
      { 'Content-Type': 'application/json' }
     } ). then (() => {   
      
       location.reload(true)     
     
    })
  }
  
});
  })
 

}