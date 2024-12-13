import Swal from 'sweetalert2'





export default function deleteColor() {

   const deleteButton = document.querySelectorAll('.delete-color-modal')   



   for (let i = 0; i < deleteButton.length; i++) {

   

   deleteButton[i].addEventListener('click', () => {    

    const color = deleteButton[i].ariaValueNow

     Swal.fire({

         title: 'Are you sure you want to delete this color?',

         text: 'The color will be permanently deleted.',

         icon: 'question',

         showCancelButton: true,

         confirmButtonText: 'Delete',

         cancelButtonText: 'Cancel',

         cancelButtonColor: '#3085d6',

         confirmButtonColor: '#d33',

         reverseButtons: true

      }).then((result) => {

         if (result.isConfirmed) {

            axios.delete('/account/admin/colors/'+ color).then((result) => {

               window.location.reload(true);

            })

            

         }

      })

  })}



 



}