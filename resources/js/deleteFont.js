import Swal from 'sweetalert2'


export default function deleteFont() {
   const deleteButton = document.querySelectorAll('.delete-font-modal')   

   for (let i = 0; i < deleteButton.length; i++) {
   
   deleteButton[i].addEventListener('click', () => {    
    const font = deleteButton[i].ariaValueNow
     Swal.fire({
         title: 'Are you sure you want to delete this font?',
         text: 'The font will be permanently deleted.',
         icon: 'question',
         showCancelButton: true,
         confirmButtonText: 'Delete',
         cancelButtonText: 'Cancel',
         cancelButtonColor: '#3085d6',
         confirmButtonColor: '#d33',
         reverseButtons: true
      }).then((result) => {
         if (result.isConfirmed) {
            axios.delete('/account/admin/fonts/'+ font).then((result) => {
              location.reload(true)
            })
            
         }
      })
  })}

 

}