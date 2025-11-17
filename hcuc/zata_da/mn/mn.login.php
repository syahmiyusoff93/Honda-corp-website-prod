<style>
    .loginform {
        max-width: 500px;
        margin: 0 auto
    }
    .loginform .notimsg {
        color: orangered;
        font-weight: bold;
    }
</style>  

<div class="wrap loginform">
  <h2>Member Login</h2>
   <p>The contents herein is for the exclusive used for MITBA members only. As a best practice, the MITBA Secretariat will from time to time change the User Name and Password. MITBA members to contact the Secretariat in the event members forgot the password</p>
   <div class="wrap">
        <div class="notiwell"></div>
        <div class="notimsg"></div>
    </div>
    <form>
        <div class="wrap">
            <label>Email</label>
            <input type="text" name="username" required>
        </div>
        
        <div class="wrap">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="wrap">
            <button class="btn-gen">Submit</button>
        </div>
    </form>
</div>
<script>
$(()=>{
    let main = $('.loginform'),
        form = $('form',main);
    form.submit( function(e) {
        e.preventDefault();
        
        let data = new FormData(this);
            
        $.ajax({
            url: `${DOT}/zata_da/mn/mn.login.verify.php`,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: async (erg) => {
                let json = JSON.parse(erg);
                
                $('.notiwell, .notimsg',main).html('');
                if(json.feed == 200){
                    location.reload();
               } else if(json.feed == 400){
                    $('.notimsg',main).html(json.msg);
                }
            }
        });
        return false;
        
    });
})
</script>