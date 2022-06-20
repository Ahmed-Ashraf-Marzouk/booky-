const genreFilter = document.querySelector("#genre")
const genreCheckbox = document.querySelectorAll(".genre_checkbox");
const searchContainer = document.querySelector("#search");
const searchBar = searchContainer.querySelector("input");
const searchButton = searchContainer.querySelector("button");

let currentURL = document.URL;
let startGenre = document.URL.indexOf("=") + 1
let endGenre = document.URL.indexOf("#");

for(let checkbox of genreCheckbox){
    checkbox.style.border = '1px silid black'
    checkbox.addEventListener("click", toggleSelection);
    checkbox.addEventListener("mouseenter", highlight);
    checkbox.addEventListener("mouseout", highlight);
    
    if(checkbox.innerText.toLocaleLowerCase().trim() === currentURL.slice(startGenre, endGenre)){
        checkbox.classList.toggle('selected');
    }
}

function toggleSelection(event){
    if(event.button !== 0){
        return null
    }
    if(event.target.innerText){
        event.target.classList.toggle('selected');
    }
}

function highlight(event){
    event.target.classList.toggle('hovered')
}

// searchButton.addEventListener("mouseover", function(event){
//     if(searchBar.value === ''){
        
//     }else{
//         searchButton.style.pointerEvents = "all"
//         searchButton.removeAttribute("disabled")
//     }
// })

searchBar.addEventListener("input", function(){
    if(searchBar.value === ''){
        searchButton.style.cursor = "not-allowed"
        searchButton.setAttribute("disabled", "disabled")
    }else{
        searchButton.removeAttribute("disabled")
        searchButton.style.cursor = "pointer"
    }
})