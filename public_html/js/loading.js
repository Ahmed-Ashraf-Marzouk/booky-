// const content = document.querySelector("#load_content")
const loading = document.querySelector("#loading")
window.scrollTo(0, 0);
window.addEventListener("load", function(){
    
    window.scrollTo(0, 0);
    loading.style.opacity = "0"
    setTimeout(function(){
        document.body.style.overflow = "overlay";
    }, 190)
    setTimeout(function(){
        loading.style.display = "none"
    }, 310)
    
    setTimeout(function(){
        document.querySelector(".disclaimer").setAttribute("style", "display:None");
    }, 5000)
})
// document.addEventListener("load", function(){
//     setInterval(function(){
//         content.style.display = "block"
//         loading.style.display = "none"
//     }, 500)
    
// })

// document.addEventListener("load", function(){
//     content.style.display = "block"
// })