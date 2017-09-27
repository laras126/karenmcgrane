(function( win, undefined ){

    var PP = win.PP;

    // loadJS: load a JS file asynchronously. Included from https://github.com/filamentgroup/loadJS/
    function loadJS( src, cb ){
        "use strict";
        var ref = window.document.getElementsByTagName( "script" )[ 0 ];
        var script = window.document.createElement( "script" );
        script.src = src;
        script.async = true;
        ref.parentNode.insertBefore( script, ref );
        if (cb && typeof( cb ) === "function") {
            script.onload = cb;
        }
        return script;
    }

    PP.utils.loadJS = loadJS;

    // cookie function from https://github.com/filamentgroup/cookie/
    function cookie( name, value, days ){
        // if value is undefined, get the cookie value
        if( value === undefined ){
            var cookiestring = "; " + window.document.cookie;
            var cookies = cookiestring.split( "; " + name + "=" );
            if ( cookies.length === 2 ){
                return cookies.pop().split( ";" ).shift();
            }
            return null;
        } else {
            var expires;
            // if value is a false boolean, we'll treat that as a delete
            if( value === false ){
                days = -1;
            }
            if ( days ) {
                var date = new Date();
                date.setTime( date.getTime() + ( days * 24 * 60 * 60 * 1000 ) );
                expires = "; expires="+date.toGMTString();
            }
            else {
                expires = "";
            }
            window.document.cookie = name + "=" + value + expires + "; path=/";
        }
    }

    // expose it
    PP.utils.cookie = cookie;

}( this ));
