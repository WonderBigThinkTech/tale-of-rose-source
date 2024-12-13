import Swal from 'sweetalert2'

export default function deleteSize() {
   const deleteButton = document.querySelectorAll('.delete-size-modal')   

   for (let i = 0; i < deleteButton.length; i++) {
   
   deleteButton[i].addEventListener('click', () => {    
    const size = deleteButton[i].ariaValueNow
     Swal.fire({
         title: 'Are you sure you want to delete this size?',
         text: 'The size will be permanently deleted.',
         icon: 'question',
         showCancelButton: true,
         confirmButtonText: 'Delete',
         cancelButtonText: 'Cancel',
         cancelButtonColor: '#3085d6',
         confirmButtonColor: '#d33',
         reverseButtons: true
      }).then((result) => {
         if (result.isConfirmed) {
            axios.delete('/account/admin/sizes/'+ size).then((result) => {
              location.reload(true)
            })
            
         }
      })
  })}

 

}