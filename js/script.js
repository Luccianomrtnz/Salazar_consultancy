function Msidebar(local){
    var width = document.body.clientWidth;
    var aside = document.getElementById('aside');
    if(local=='L'){
        aside.style.left = '0px';
    }else if(local=='R'){
        aside.style.left = (width - 250) + 'px'; 

    }else{//Close
        aside.style.left = '-250px';
    }
}