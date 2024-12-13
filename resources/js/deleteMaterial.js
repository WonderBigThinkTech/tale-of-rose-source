import Swal from 'sweetalert2'

export default function deleteMaterial() {
   const deleteButton = document.querySelectorAll('.delete-material-modal')   

   for (let i = 0; i < deleteButton.length; i++) {
   
   deleteButton[i].addEventListener('click', () => {    
    const material = deleteButton[i].ariaValueNow
     Swal.fire({
         title: 'Are you sure you want to delete this material?',
         text: 'The material will be permanently deleted.',
         icon: 'question',
         showCancelButton: true,
         confirmButtonText: 'Delete',
         cancelButtonText: 'Cancel',
         cancelButtonColor: '#3085d6',
         confirmButtonColor: '#d33',
         reverseButtons: true
      }).then((result) => {
         if (result.isConfirmed) {
            axios.delete('/account/admin/materials/'+ material).then((result) => {
              location.reload(true)
            })
            
         }
      })
  })}

 

}