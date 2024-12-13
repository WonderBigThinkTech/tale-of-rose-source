import Swal from 'sweetalert2'

export default function createType() {
  
   const createTypeButton = document.querySelector('.create-type-modal') 
   
  //edit type
    
   createTypeButton.addEventListener('click', () => { 
     Swal.fire({
  title: "Create new Type:",
  input: "text", 
  showCancelButton: true,
  confirmButtonText: "Create",
  showLoaderOnConfirm: true,  
  allowOutsideClick: () => !Swal.isLoading()
}).then((result) => { 
    
  if (result.isConfirmed) {
    const link = `${window.location.origin}/account/admin/types`;    
    axios.post(link, {name: result.value, headers:
      
      { 'Content-Type': 'application/json' }
     } ). then (() => {   
      
       location.reload(true)     
     
    })
  }
  
});
  })
 

}