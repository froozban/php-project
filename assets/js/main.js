var dates=document.querySelectorAll('.reg-date');
if(dates){
    dates.forEach(item=>{
        item.innerText=moment(item.innerText).locale('fa').format('YYYY/MM/DD HH:mm:ss');
    })

}
    



// async function getData(){

//     if(window.location.pathname=='/form-2-php/news.php'){
//         debugger
//     let res = await fetch('api-posts.php',{
//         metod:'GET',
//     });
//     let data = await res.then(res=> res.json());
       
//     }

// }

async function removeUserData(iduser,ev){
   
let res = await fetch('api-remove-user.php',{
    method:"POST",
    body:JSON.stringify({
        id:iduser
    })
});

let data=await res.json();

if(data.statuse==200){
    ev.parentElement.parentElement.remove();
}else{
alert(data.response);
}

};

async function editUser(idUser){
   
    let body={
         id:idUser,
        username:document.querySelector('#username').value,
        email:document.querySelector('#email').value,
       // pass:document.querySelector('#pass').value
  

    };
    console.log(body);
   
    let res = await fetch('api-update-User.php',{
        method:"POST",
        body:JSON.stringify(body)
          
       
    });
    
    let data=await res.json();
   console.log(data);
    if(data.statuse==200){
   window.location.href=`profile.php?update=true&userId=${idUser}`;
    }else{
    alert(data.response);
    }
    
    };

    
    