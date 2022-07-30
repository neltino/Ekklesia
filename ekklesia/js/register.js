var app = new Vue({
    el: "#app",
    data: {
            fullname: "",
    },
    methods: {
        oninp: function(){
            if(this.fullname. length> 0){
                sub.disabled = false;
            }else{
                sub.disabled = true;
            }
        },
        onsub: async (e)=>{
            e.preventDefault();
            const formdata = new FormData(reg);
                const reply = await fetch('view/register.php', {
                    method: 'POST',
                    body: formdata
                  });
                 
                   location.reload(true);

        }
    }
});
