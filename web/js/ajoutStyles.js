
function bgOpacitymax(){
    
    var btnAdmin=document.getElementById('btnAdmin');
    btnAdmin.style.opacity='1';
    btnAdmin.style.padding='0px';
}

function bgOpacitymin(){
    
    var btnAdmin=document.getElementById('btnAdmin');
    btnAdmin.style.opacity='0.7';
    btnAdmin.style.padding='1px';
}

function showAdminAcces(){
    
   var accesAdmin=document.getElementById('accesAdmin');
   if (accesAdmin.style.visibility==='hidden') {
       accesAdmin.style.visibility='visible';
       accesAdmin.style.display='block';
   }else{
       accesAdmin.style.visibility='hidden';
       accesAdmin.style.display='none';
   }
       
}

