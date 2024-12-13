import Swal from 'sweetalert2'

export default function createShape() {
  
   const createButton = document.querySelector('.create-shape-modal') 
     
    
   createButton.addEventListener('click', () => { 
     Swal.fire({
  title: "Create new Shape:",
  input: "text", 
  showCancelButton: true,
  confirmButtonText: "Create",
  showLoaderOnConfirm: true,  
  allowOutsideClick: () => !Swal.isLoading()
}).then((result) => { 
    
  if (result.isConfirmed) {
    const link = `${window.location.origin}/account/admin/shapes`;  
    axios.post(link, {name: result.value} ). then (() => {   
      
       location.reload(true)     
     
    })
  }
  
});
  })
 

}