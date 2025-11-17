<section id="cookienotice">
    <p>This site uses cookies to improve your experience. Read our cookie policy <a href="{{url('privacy')}}" style="color:red; text-decoration:underline">here</a>.</p>
    <a class="cta-iunderstand prime-cta-black" style="padding:20px 40px; text-align:center;"><span>I understand</span><div class="overlay"></div></a>

    <style>
        #cookienotice {display:none; position: fixed; bottom: 50px; right:50px; text-align: left; z-index: 11; background: white; color: #333333; padding: 40px; color:#eee; width:300px;
            border: 1px solid #e8e8e8;}
        #cookienotice p{color:#333; font-size: .9rem; line-height: 1.6em;margin-top: 0px;}
        #cookienotice- a{color:red; cursor: pointer;}
        #cookienotice- a:hover {text-decoration: underline;}
        @media screen and (max-width:400px){
            #cookienotice {right:50%; transform:translateX(50%);}
        }
    </style>
    <script>
        $(document).ready(function(){
            var cnoticename = 'hondamyweb_cnotice';
            var cnotice = readCookie(cnoticename);
            if(cnotice==null){
                $('#cookienotice').show('fast');
                $('.cta-iunderstand').click(function(){
                    createCookie(cnoticename, 1, 365);
                    $('#cookienotice').hide('fast');
                })
            }
        })
    </script>
</section>
