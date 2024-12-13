import Swal from 'sweetalert2'

export default function createSize() {
  
   const createButton = document.querySelector('.create-size-modal') 
   
  //edit type
    
   createButton.addEventListener('click', () => { 
     Swal.fire({
  title: "Create new Size:",
  input: "text", 
  showCancelButton: true,
  confirmButtonText: "Create",
  showLoaderOnConfirm: true,  
  allowOutsideClick: () => !Swal.isLoading()
}).then((result) => { 
    
  if (result.isConfirmed) {
    const link = `${window.location.origin}/account/admin/sizes`;    
    axios.post(link, {name: result.value, headers:
      
      { 'Content-Type': 'application/json' }
     } ). then (() => {   
      
       location.reload(true)     
     
    })
  }
  
});
  })
 

}