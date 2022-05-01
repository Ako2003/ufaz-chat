const form = document.querySelector(".acc_images form");
shareBtn = document.querySelector(".share");
errorText = document.querySelector(".error-text");
imageList = document.querySelector(".images");

form.onsubmit = (e)=>{
    e.preventDefault();
}


shareBtn.onclick= ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/upload_image.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data === "success"){
                    location.href="my-account.php";
                }else{
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            }
            
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/images.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                imageList.innerHTML = data;
            }
        }
    }
    xhr.send();
}, 500);

// Get the modal
var modal = document.getElementById('myModal');
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    modalImg.alt = this.alt;
    captionText.innerHTML = this.alt;
}
 
// When the user clicks on <span> (x), close the modal
modal.onclick = function() {
    img01.className += " out";
    setTimeout(function() {
       modal.style.display = "none";
       img01.className = "modal-content";
     }, 400);
    
 } 