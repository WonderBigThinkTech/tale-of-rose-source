import Swal from 'sweetalert2'


export default function deleteFaq() {
   const deleteButton = document.querySelectorAll('.delete-faq-modal')   

   for (let i = 0; i < deleteButton.length; i++) {
   
   deleteButton[i].addEventListener('click', () => {    
    const faq = deleteButton[i].ariaValueNow
     Swal.fire({
         title: 'Are you sure you want to delete this FAQ?',
         text: 'The FAQ will be permanently deleted.',
         icon: 'question',
         showCancelButton: true,
         confirmButtonText: 'Delete',
         cancelButtonText: 'Cancel',
         cancelButtonColor: '#3085d6',
         confirmButtonColor: '#d33',
         reverseButtons: true
      }).then((result) => {
         if (result.isConfirmed) {
            axios.delete('/custom/faqs/'+ faq).then((result) => {
              location.reload(true)
            })
            
         }
      })
  })}

 

}