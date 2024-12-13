import Swal from 'sweetalert2'

export default function createColor() {
  
   const createButton = document.querySelector('.create-color-modal') 
   
  //edit type
    
   createButton.addEventListener('click', () => { 
     Swal.fire({
  title: "Create new Color:",
  input: "text", 
  showCancelButton: true,
  confirmButtonText: "Create",
  showLoaderOnConfirm: true,  
  allowOutsideClick: () => !Swal.isLoading()
}).then((result) => { 
    
  if (result.isConfirmed) {
    const link = `${window.location.origin}/account/admin/colors`;    
    axios.post(link, {name: result.value, headers:
      
      { 'Content-Type': 'application/json' }
     } ). then (() => {   
      
       location.reload(true)     
     
    })
  }
  
});
  })
 

}