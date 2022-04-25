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