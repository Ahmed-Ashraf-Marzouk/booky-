let profile_img = document.getElementById('profile-img');
let pen = document.getElementById('edit-pen');
let file_container = document.getElementById('file-container');
let submit = document.getElementById('image-submit');
let file_inp = document.getElementById('file-input');

let adb = document.getElementById('adb');
let add_form = document.getElementById('add-book-form');

add_form.style.display ='none';

adb.onclick = function(){
    add_form.style.display ='block';
    adb.style.display = 'none';
}

file_container.style.display = 'none';
let desc = document.getElementById('profile-desc');
let in_desc = document.getElementById('in-desc');
let ed_but = document.getElementById('bb');
let sub_but = document.getElementById('sub');
in_desc.style.display = 'none';
sub_but.style.display = 'none';
ed_but.onclick = function(){
    in_desc.style.display = 'block';
    ed_but.style.display ='none';
    sub_but.style.display ='block'
}




sub_but.onclick = function(){
    ed_but.style.display ='block';
    in_desc.style.display = 'none';
    sub_but.style.display ='none';
    desc.innerHTML = in_desc.value;

    
}


// profile_img.onmouseover = function(){
    
//     pen.style.display = 'inline-block';
    
// }

// pen.onmouseover = function(){
    
//     pen.style.display = 'inline-block';
    
// }

// profile_img.onmouseleave = function(){
    
//     pen.style.display = 'none';
    
// }


pen.onclick = function(){
    // file_container.style.display = 'block';
    file_inp.click();
}
file_inp.onchange = function(){
     submit.click();
}