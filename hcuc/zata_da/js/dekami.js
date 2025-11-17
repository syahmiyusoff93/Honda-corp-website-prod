(function ($) {
    $.fn.dekami = function (opts) {
        let set = $.extend({
            id: '',
            subject: false,
            done: '',
            dot: '',
            licht: false,
            type: 'POST',
            processData: false,
            contentType: false,
            link: false,
            submittingText: 'Submitting'
        }, opts);

        let obj = {};

        obj.exe = set.link ? `${set.link}?id=${set.id}` : `${set.dot}zata_da/mn/mn.dkm.php?id=${set.id}`; 
        obj.form = $(this);
        obj.name = []; 

        // setInterval(() => {
        //     obj.name = [];
            
        //     $('[name]', obj.form).each(function () {
        //         let d = $(this),
        //             str = d.attr('name');
        //         str = str.replace(/ /g, '%');
        //         d.attr('name', str);
        //         obj.name.push(str);
        //     });
        // }, 1000); 

        obj.form.submit(function (e) {
            e.preventDefault();
            obj.form.append(`<textarea name="que" style="display: none;">${obj.name.join('($$)')}</textarea>`);
            let mn = set.licht ? set.licht : $(`[mn][da-id="${set.id}"], .licht`);
            uiaddLoad(mn, set.submittingText);
            $('button', obj.form).attr('disabled', 'disabled');
            let info = new FormData(this);
            if(set.subject != false) 
                info.append('subject', set.subject);
                
            $('<div style="color:var(--clr01x, #fff);text-align:center;"><span class="progesspercent"></span>%</div>').insertBefore($('.msg',mn));
            $.ajax({
                url: obj.exe,
                type: set.type,
                data: info,
                processData: set.processData,
                contentType: set.contentType,
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                
                    xhr.upload.addEventListener("progress", function(evt) {
                      if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        console.log(percentComplete);
                        $('.progesspercent').html(percentComplete);
                        if (percentComplete === 100) {
                            
                        }
                
                      }
                    }, false);
                
                    return xhr;
                  },
                success: function (erg) {
                    obj.res = erg;

                    let Hm = 0;
                    if($('[mn="menu"]').length) Hm += $('[mn="menu"]').outerHeight() 
                    if($('.mob-nav').length) Hm += $('.mob-nav').outerHeight();
                    uifadeRemove($('.loader',mn));

                    if(mn.offset()?.top)
                        $('body, html').animate({scrollTop: mn.offset().top - Hm}, 900, 'linear');
                    if ($.isFunction(set.done)) set.done.call(this, obj);
                }
            });

            return false;
        });
    };
}(jQuery));