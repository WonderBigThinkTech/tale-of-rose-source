import Swal from 'sweetalert2'


export default function deleteDiscount() {
   const deleteButton = document.querySelectorAll('.delete-discount-modal')   

   for (let i = 0; i < deleteButton.length; i++) {
   
   deleteButton[i].addEventListener('click', () => {    
    const discount = deleteButton[i].ariaValueNow
     Swal.fire({
         title: 'Are you sure you want to delete this Voucher?',
         text: 'The Voucher will be permanently deleted.',
         icon: 'question',
         showCancelButton: true,
         confirmButtonText: 'Delete',
         cancelButtonText: 'Cancel',
         cancelButtonColor: '#3085d6',
         confirmButtonColor: '#d33',
         reverseButtons: true
      }).then((result) => {
         if (result.isConfirmed) {
            axios.delete('/custom/discounts/'+ discount).then((result) => {
              location.reload(true)
            })
            
         }
      })
  })}

 

}