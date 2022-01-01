//click sidebar link start
let sidebarLink = document.querySelectorAll('section a.nav-link');
for (let x=0; x < sidebarLink.length; x++)
{
    sidebarLink[x].onclick = function (){
        let y =0;
        while(y < sidebarLink.length){
            sidebarLink[y++].className = 'nav-link';
        }
        sidebarLink[x].className = 'nav-link active';
    }
}
//click sidebar link end