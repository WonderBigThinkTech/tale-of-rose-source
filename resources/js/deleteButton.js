import Swal from 'sweetalert2'

export default function handleDelete() {
   const deleteButton = document.querySelectorAll('.delete-modal')   

   for (let i = 0; i < deleteButton.length; i++) {
   
   deleteButton[i].addEventListener('click', () => {    
    const user = deleteButton[i].ariaValueNow
     Swal.fire({
         title: 'Are you sure you want to delete this user?',
         text: 'The user will be permanently deleted.',
         icon: 'question',
         showCancelButton: true,
         confirmButtonText: 'Delete',
         cancelButtonText: 'Cancel',
         cancelButtonColor: '#3085d6',
         confirmButtonColor: '#d33',
         reverseButtons: true
      }).then((result) => {
         if (result.isConfirmed) {
            axios.delete('/account/admin/users/'+ user).then((result) => {
              location.reload(true)
            })
            
         }
      })
  })}

 

}