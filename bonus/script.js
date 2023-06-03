let bulbi = document.getElementById("malv")
// var video = document.createElement("video");
// video.setAttribute("src", "Download.mp4");


bulbi.addEventListener("click", ()=>{
    // <video src="/bonus/Download.mp4" width="400px" height="400px"></video>
    bulbi.innerHTML='<video width="400" height="400" controls><source src="Download.mp4" type="video/mp4"></source>';
    body.style.filter="invert(1)";
})