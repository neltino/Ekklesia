var app = new Vue({
    el: "#app",
    data: {
       church: "",
       report: "",
       user: "",
       pass1: "",
       pass2: "",
       security: "",
       answer: "",
       up1: "",
       up2: "",
    },
    methods:{
        expand1: ()=>{
           
           if(accordion1.style.display == "" || accordion1.style.display == "none"){
               accordion1.style.display = "block";
               ang1.className = "fas fa-angle-double-right";
            }else{
                accordion1.style.display = "none";
                ang1.className = "fas fa-angle-double-down";
           }
           },
        oninp1: function (){
                    
                    if(this.church. length > 0 && this.report != ""){
                        sub.disabled = false;
                    }else{
                        sub.disabled = true;

                    }
        },
        expand2: ()=>{
           
            if(accordion2.style.display == "" || accordion2.style.display == "none"){
                accordion2.style.display = "block";
                ang2.className = "fas fa-angle-double-right";
             }else{
                 accordion2.style.display = "none";
                 ang2.className = "fas fa-angle-double-down";
            }
            },
        checkPass: function(){
            if(this.pass1.length > 0 && this.pass2.length > 0 && this.pass1 != this.pass2){
                error.style.display = "block";
            }else{
                error.style.display = "none";

            }
           
        },
        activate: function(){
                if(this.user.length>0 && this.pass1.length>0 && this.pass2.length>0 && this.security.length>0 && this.answer.length>0 && this.pass1 == this.pass2){
                    sub2.disabled = false;
                }else{
                    sub2.disabled = true;
                }
        },
        dbsub: async (e)=>{
            e.preventDefault();
            const formdata = new FormData(info);
           
            
                const reply = await fetch('view/settings.php', {
                    method: 'POST',
                    body: formdata
                  });
               
                    result = await reply.text();
                    alert(result);
                    location.reload(true);
            
        },
        filesub: async(e)=>{
            e.preventDefault();
            const formdata = new FormData(file);
           
            
                const reply = await fetch('view/settings.php', {
                    method: 'POST',
                    body: formdata
                  });
                file.reset();
                    result = await reply.text();
                    alert(result);
                    window.location.href = 'index.php';
            
        },
        reveal: ()=>{
            edit.style.display = "block";
        },
        show: ()=>{
            edit.style.display = "none";
        },
        onupdate: function (){
                    
            if(this.up1. length > 0 && this.up2 != ""){
                updat.disabled = false;
            }else{
                updat.disabled = true;

            }
        },
        subupdate: async (e)=>{
            e.preventDefault();
            const formdata = new FormData(update);
                const reply = await fetch('view/settings.php', {
                    method: 'POST',
                    body: formdata
                  });
                    result = await reply.text();
                    alert(result);
                    location.reload(true);
        }
    }
}

);