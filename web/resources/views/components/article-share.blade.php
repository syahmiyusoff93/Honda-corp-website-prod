<div class="news-details-icon center">
    <ul>
        <li>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&display=popup" target="_blank">
                <img class="" src="{{versioned_asset('img/interface/Icon_FB.svg')}}" alt="">
            </a>
        </li>
        <li>
            <a class="" href="https://twitter.com/intent/tweet?text={{urlencode($item->title)}}&url={{url()->current()}}" target="_blank">
                <img class="" src="{{versioned_asset('img/interface/Icon_Twitter.svg')}}" alt="">
            </a>
        </li>
        <li>
            <a href="mailto:?subject={{('Honda Malaysia Press Release: '.$item->title)}}&body={{('Check out this press release by Honda Malaysia: '.url()->current())}}"
            title="Share by Email">
                <img class="" src="{{versioned_asset('img/interface/Icon_Mail.svg')}}" alt="">
            </a>
        </li>
        <li class="popupcopied">
            <span class="copytoclipboard"><img class="" src="{{versioned_asset('img/interface/Icon_Link.svg')}}" alt=""></span>
            <span class="popupcopiedtext">Copied to clipboard</span>
        </li>
    </ul>
</div>

<script>
    if(sai_link_copy_initialised==undefined || sai_link_copy_initialised!=1){
        $(document).ready(function(){
            $('.copytoclipboard').click(function(){
                var pop = $(this).siblings('.popupcopiedtext');
                copyToClipboard('{{url()->current()}}');
                pop.fadeIn('fast', function(){
                    setTimeout(function(){
                        pop.fadeOut('fast');
                    }, 1000);
                });

            })
        })
        var sai_link_copy_initialised = 1;

    }
</script>
