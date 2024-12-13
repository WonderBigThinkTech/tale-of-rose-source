import Swal from 'sweetalert2'

export default function deleteShape() {
   const deleteButton = document.querySelectorAll('.delete-shape-modal')   

   for (let i = 0; i < deleteButton.length; i++) {
   
   deleteButton[i].addEventListener('click', () => {    
    const shape = deleteButton[i].ariaValueNow
     Swal.fire({
         title: 'Are you sure you want to delete this Shape?',
         text: 'The shape will be permanently deleted.',
         icon: 'question',
         showCancelButton: true,
         confirmButtonText: 'Delete',
         cancelButtonText: 'Cancel',
         cancelButtonColor: '#3085d6',
         confirmButtonColor: '#d33',
         reverseButtons: true
      }).then((result) => {
         if (result.isConfirmed) {
            axios.delete('/account/admin/shapes/'+ shape).then((result) => {
              location.reload(true)
            })
            
         }
      })
  })}

 

}