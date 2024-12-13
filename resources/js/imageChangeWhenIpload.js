
export default function imageChangeWhenUpload() {
  const image = document.getElementById("edit-image");

   const button = document.getElementById("upload-button");

                                    button.addEventListener("change", function(e) {

                                        image.src = URL.createObjectURL(e.target.files[0]);
                                    })
}