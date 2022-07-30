var myApp = new Vue({
    el:'#app',
    data: {
        username: "",
        password: "",
    },
    methods:{
        alter: ()=>{
           if(pass.type == 'password'){
               pass.type = 'text';
               show.className = "fas fa-eye-slash fa-lg";
            }else{
                pass.type = 'password';
                show.className = "fas fa-eye fa-lg";
           }
           
        },
        onin: function(){
           
            if(this.username.length > 0 && this.password.length > 0){
                
                sub.disabled = false;
            }else{
                sub.disabled = true;
            }
        },
        onsub: async (e)=>{
            sub.value = "Processing...";
            spinner.className = "fa fa-spinner fa-spin fa-2x";
            sub.disabled = true;
            e.preventDefault();
            const formdata = new FormData(login);

            const reply = await fetch('login.php', {
                method: 'POST',
                body: formdata
              });
              const result = await reply.text();
              
              if(result == 'redirect'){
                  setTimeout(()=>{
                      //display success and redirect to landing page
                    callout2.style.display = 'block';
                    sub.value = "Login";
                    spinner.className = "";
                  }, 2000);

                  setTimeout(()=>{
                    
                    window.location.href='inlog.php';
                  }, 4000);
              }else if(result == 'incorrect'){
                  //display error for incorrect username
                  setTimeout(()=>{
                    callout1.style.display = 'block';
                    sub.value = "Login";
                    spinner.className = "";
        
                  }, 1000);

                  setTimeout(()=>{
                    
                    window.location.reload(true);
                  }, 4000);
              }else{
                  //display connection error
                  alert("There is problem with the connection, please try again later!");
                 
                    window.location.reload(true);
               
                  
              }
        }
    }
});