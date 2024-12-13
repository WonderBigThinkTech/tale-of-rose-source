import Swal from 'sweetalert2'


export default function deleteHighlight() {
   const deleteButton = document.querySelectorAll('.delete-highlight-modal')   

   for (let i = 0; i < deleteButton.length; i++) {
   
   deleteButton[i].addEventListener('click', () => {    
    const highlight = deleteButton[i].ariaValueNow
     Swal.fire({
         title: 'Are you sure you want to delete this Highlight?',
         text: 'The Highlight will be permanently deleted.',
         icon: 'question',
         showCancelButton: true,
         confirmButtonText: 'Delete',
         cancelButtonText: 'Cancel',
         cancelButtonColor: '#3085d6',
         confirmButtonColor: '#d33',
         reverseButtons: true
      }).then((result) => {
         if (result.isConfirmed) {
            axios.delete('/custom/highlights/'+ highlight).then((result) => {
              location.reload(true)
            })
            
         }
      })
  })}

 

}