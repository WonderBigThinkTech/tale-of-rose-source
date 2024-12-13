
export default function imageChangeWhenUploadMultiple() {
  const image = document.getElementById("display-multiple-image");

   const button = document.getElementById("upload-button");

                                    button.addEventListener("change", function(e) { 
                                      image.innerHTML = ""                                     
                                      let fileAmount = e.target.files.length
                                                                          
                                      for(let i =0; i < fileAmount; i++) {
                                        let reader = new FileReader();
                                        reader.onload = function(event) {
                                         var box = document.createElement("div");
                                          let html = `
                                                                                  
                                          <img src='${event.target.result}' style="margin: 5px 5px;" alt="image" width="100" />
                                                                                    
                                          `;                                           
                                          var deleteImg = document.createElement('p');
                                         deleteImg.innerHTML = "Remove";
                                         deleteImg.style.display = "flex";
                                         deleteImg.style.cursor = "pointer";
                                         deleteImg.style.justifyContent = "center";
                                          deleteImg.style.alignItems = "center";
                                         deleteImg.style.backgroundColor = "red";
                                         deleteImg.style.color = "white";
                                          deleteImg.onclick = function() {this.parentNode.remove()};
                                          box.innerHTML = html;                                           
                                          image.append(box); 
                                          box.append(deleteImg); 

                                        }  
                                                                            
                                        reader.readAsDataURL(e.target.files[i]);
                                        
                                      }                                       
                                    })
}