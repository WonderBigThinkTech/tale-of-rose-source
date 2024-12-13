import Swal from 'sweetalert2'


export default function deleteInk() {
   const deleteButton = document.querySelectorAll('.delete-ink-modal')   

   for (let i = 0; i < deleteButton.length; i++) {
   
   deleteButton[i].addEventListener('click', () => {    
    const ink = deleteButton[i].ariaValueNow
     Swal.fire({
         title: 'Are you sure you want to delete this ink?',
         text: 'The ink will be permanently deleted.',
         icon: 'question',
         showCancelButton: true,
         confirmButtonText: 'Delete',
         cancelButtonText: 'Cancel',
         cancelButtonColor: '#3085d6',
         confirmButtonColor: '#d33',
         reverseButtons: true
      }).then((result) => {
         if (result.isConfirmed) {
            axios.delete('/account/admin/inks/'+ ink).then((result) => {
              location.reload(true)
            })
            
         }
      })
  })}

 

}