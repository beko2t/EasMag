var loginButton = document.getElementById('LoginBtn'),
    link = document.querySelectorAll('.collapse .nav-link'),
    logForm = document.getElementById('logForm');
//login show start
loginButton.onclick = function (){
    logForm.classList.toggle('hide');
};
//login show end
//click link start
for (let i=0; i<link.length; i++)
{
    link[i].onclick = function (){
        let j =0;
        while(j < link.length){
            link[j++].className = 'nav-link';
        }
        link[i].className = 'nav-link active';
    }
}
//click link end