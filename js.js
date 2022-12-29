const navig=document.querySelector('nav');

window.addEventListener('scroll',(e)=>{
    console.log(e);

if(window.scrollY>5)
{
    navig.classList.add('animNAv');
}else{
    navig.classList.remove('animNAv');
}

})
window.onload=function(){
    var imgs=["url('espace_client/images/PS5-Box-art.jpg')","url('espace_client/images/ultimate-pack-ps5-console-6-jeux-casque.jpg')"];
    const header=document.getElementById('header-wrapper');
    i=0;
    function hop(){
        header.style.backgroundImage=imgs[(i++)%imgs.length] ;
} cool=setInterval(hop,2000);
}
function valid(){
    var pseudo=document.forms["form"]["pseudo"];
    var address=document.forms["form"]["address"];
    var tel=document.forms["form"]["tel"];
    var mail=document.forms["form"]["mail"];
    var mdp=document.forms["form"]["mdp"];
    var repmdp=document.forms["form"]["repmdp"];
    
    
    if(pseudo.value==""){
        alert("saisir le pseudo!");
        pseudo.focus();
        return false;
    }else if(address.value==""){
        alert("address!!");
        address.focus()
        return false;
    }else if(tel.value==""){
        alert("numero de telephone incorrect");
        tel.focus()
        return false;
    }else if(mail.value==""){
        alert("mail !");
        mail.focus();
        return false;
    } else if(mdp.value==""){
        alert("saisir le mot de passe!");
        mdp.focus();
        return false;
    }else if(mdp.value != repmdp.value){
        alert("mot de passe incorrect");
        repmdp.focus();
        return false;
    }
    if(mdp.value.length<6){ 
        alert("Mot de passe minimum 6 caractères");
        mdp.focus();
        return false;
    }
    
    else{
        return true;
    }}
function conf(){
    var mail=document.forms["form"]["mail"];
    var mdp=document.forms["form"]["mdp"];
    if(mail.value=="" || mdp.value==""){
        alert("veuillez completer tous les champs..");
        mail.focus();
        return false;
    }
}