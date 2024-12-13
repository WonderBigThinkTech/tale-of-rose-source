import Swal from 'sweetalert2'

export default function handleLogout() {
   const logoutButton = document.querySelector('#logout-modal')

   logoutButton.addEventListener('click', () => {
      Swal.fire({
         title: 'Are you sure you want to logout?',
         text: 'You will be redirected to the login page.',
         icon: 'question',
         showCancelButton: true,
         confirmButtonText: 'Logout',
         cancelButtonText: 'Cancel',
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         reverseButtons: true
      }).then((result) => {
         if (result.isConfirmed) {
            axios.post('/account/logout').then((result) => {
              window.location.href = '/'
            })
            
         }
      })
   })

}