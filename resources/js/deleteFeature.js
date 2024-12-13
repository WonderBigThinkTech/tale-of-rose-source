import Swal from 'sweetalert2'


export default function deleteFeature() {
   const deleteButton = document.querySelectorAll('.delete-feature-modal')   

   for (let i = 0; i < deleteButton.length; i++) {
   
   deleteButton[i].addEventListener('click', () => {    
    const feature = deleteButton[i].ariaValueNow
     Swal.fire({
         title: 'Are you sure you want to delete this Feature?',
         text: 'The Feature will be permanently deleted.',
         icon: 'question',
         showCancelButton: true,
         confirmButtonText: 'Delete',
         cancelButtonText: 'Cancel',
         cancelButtonColor: '#3085d6',
         confirmButtonColor: '#d33',
         reverseButtons: true
      }).then((result) => {
         if (result.isConfirmed) {
            axios.delete('/custom/features/'+ feature).then((result) => {
              location.reload(true)
            })
            
         }
      })
  })}

 

}