import Swal from 'sweetalert2'

export default function handleChangePass() {
   const changePassButton = document.querySelectorAll('.changePass-modal')   

   for (let i = 0; i < changePassButton.length; i++) {
   
   changePassButton[i].addEventListener('click', () => {    
    const user = changePassButton[i].ariaValueNow
   
     Swal.fire({
  title: "Enter the user's new password:",
  input: "password", 
  showCancelButton: true,
  confirmButtonText: "Change Password",
  showLoaderOnConfirm: true,  
  allowOutsideClick: () => !Swal.isLoading()
}).then((result) => {  
    
  if (result.isConfirmed) {
    const link = `${window.location.origin}/admin/users/update/`+ user;
    axios.put(link, {password: result.value} ). then ((response) => {
      location.reload(true)
    })
  }
});
  })}

 

}