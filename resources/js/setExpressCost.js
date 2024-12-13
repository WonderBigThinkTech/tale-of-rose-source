import Swal from 'sweetalert2'

export default function setStandardCost() {
  
   const button = document.getElementById('set-express-cost') 
   const stateBox = document.getElementById('stateBox') 
   
   
   button.addEventListener('click', () => { 
     Swal.fire({
  title: "Enter Express Cost for all States:",
  input: "text", 
  showCancelButton: true,
  confirmButtonText: "Set Cost",
  showLoaderOnConfirm: true,  
  allowOutsideClick: () => !Swal.isLoading()
}).then((result) => {      
  if (result.isConfirmed) {
    const link = `${window.location.origin}/custom/shippings/express`; 
   
    axios.put(link, {state: stateBox.value, express: result.value, headers: 
      { 'Content-Type': 'application/json' }
     } ). then ((response) => {        
       location.reload(true)    
     
    })
  }
  
});
  })
 

}