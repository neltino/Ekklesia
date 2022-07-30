var app = new Vue({
    el: "#app",
    data: {
            description: "",
            amount: "",
            
           
    },
    methods: {
        oninp: function(){
            if(this.description. length> 0 && this.amount.length > 0){
                sub.disabled = false;
            }else{
                sub.disabled = true;
            }
        },
        onsub: async (e)=>{
            e.preventDefault();
            const formdata = new FormData(inc);
                const reply = await fetch('view/in-ex.php', {
                    method: 'POST',
                    body: formdata
                  });
                   location.reload(true);

        }
    }
});


let deci = document.getElementById("convert");
        deci.addEventListener("input", function(){
            let val =  document.forms['inc']['amount'].value;
            let len = val.length - 1;
            if(val[len] != "."){
               
                val = val.replace(',', '');
                val = parseFloat(val);
                if(isNaN(val)){
                        convert.value = "";
                }else{

                    document.forms['inc']['amount'].value = val.toLocaleString();
                }
                
            }
        });

       