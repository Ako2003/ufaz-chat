pageImagesList = document.querySelector(".img");

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/page-images.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            pageImagesList.innerHTML = data;
          }
      }
    }
    xhr.send();
  }, 500);