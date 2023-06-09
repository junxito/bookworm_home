
    var cookie_box = document.getElementById('cookie_box'),
    activeBtn = document.getElementById('activeBtn');
    
    activeBtn.addEventListener('click',function(){
        
        document.cookie = "CookieBy=InventionTricks; ";
        if(document.cookie){
           // Ocultar el cuadro emergente
            cookie_box.classList.add('hide');
        }else{
            // Si bloqueamos la configuración de cookies, mostramos este mensaje
            alert("cookie not set! Please allow this site from your browser cookie setting");
        }
    
    })
    
    function getCookieName(name) {
        var r = document.cookie.match("\\b" + name + "=([^;]*)\\b");
        return r ? r[1] : '';
    }
    var getCookieName = getCookieName('CookieBy');
    //alert(getCookieName)
    if(getCookieName === 'InventionTricks'){
        // Ocultar todo el tiempo el cuadro emergente
        cookie_box.classList.add('hide');
    }