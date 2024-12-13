import Swal from 'sweetalert2'


export default function deleteReview() {
   const deleteButton = document.querySelectorAll('.delete-review-modal')   

   for (let i = 0; i < deleteButton.length; i++) {
   
   deleteButton[i].addEventListener('click', () => {    
    const review = deleteButton[i].ariaValueNow
     Swal.fire({
         title: 'Are you sure you want to delete this Review?',
         text: 'The Review will be permanently deleted.',
         icon: 'question',
         showCancelButton: true,
         confirmButtonText: 'Delete',
         cancelButtonText: 'Cancel',
         cancelButtonColor: '#3085d6',
         confirmButtonColor: '#d33',
         reverseButtons: true
      }).then((result) => {
         if (result.isConfirmed) {
            axios.delete('/custom/reviews/'+ review).then((result) => {
              location.reload(true)
            })
            
         }
      })
  })}

 

}