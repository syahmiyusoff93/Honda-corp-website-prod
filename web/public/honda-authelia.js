// Replace occurrences of 'Authelia' with 'Honda' and remove any footer branding at runtime
(function(){
  try {
    // Replace title if set by client-side JS
    if (typeof document !== 'undefined') {
      document.addEventListener('DOMContentLoaded', function(){
        try {
          if (document.title && /Authelia/i.test(document.title)) {
            document.title = document.title.replace(/Authelia/gi, 'Honda');
          }
          // Also observe title changes (SPA behaviour)
          var titleObserver = new MutationObserver(function(){
            if (document.title && /Authelia/i.test(document.title)) {
              document.title = document.title.replace(/Authelia/gi, 'Honda');
            }
          });
          var titleEl = document.querySelector('title') || (function(){
            var t = document.createElement('title'); document.head.appendChild(t); return t; })();
          titleObserver.observe(titleEl, { characterData: true, childList: true, subtree: true });

          // Remove any 'Powered by Authelia' anchors or branding elements
          var selectors = ["a[href*='authelia']", "[data-testid='powered-by']", ".authelia-branding", "footer", ".powered-by", ".authelia-footer"];
          selectors.forEach(function(sel){
            document.querySelectorAll(sel).forEach(function(el){
              try{ el.remove(); }catch(e){}
            });
          });
        } catch(e){}
      });
    }
  } catch(e){}
})();
