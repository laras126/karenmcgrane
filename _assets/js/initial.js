(function( win, undefined ){

    // Enable JS strict mode
    "use strict";

    // Environment variables
    var PP = win.PP,
        utils = PP.utils,
        docClasses = [];

    if ( "sessionStorage" in window ) {

        // Font loading!
        var fontsClass = "fonts-loaded";

        if ( sessionStorage.getItem( "fontsLoaded" ) === "loaded" ) {
            docClasses.push( fontsClass );
        } else {
            // Okay! Let’s watch for font events!
            var avenir = new FontFaceObserver( "Avenir W01", {
                weight: 500
            } );
            var avenirItalic = new FontFaceObserver( "Avenir W01", {
                style: "italic",
                weight: 500
            } );
            var avenirBlack = new FontFaceObserver( "Avenir W01", {
                weight: 900
            } );
            var avenirBlackItalic = new FontFaceObserver( "Avenir W01", {
                style: "italic",
                weight: 900
            } );

            // When the fonts above are loaded, we'll attach a .fonts-loaded class to the document. (Per https://www.filamentgroup.com/lab/font-events.html) We'll also append the class to the `html`.
            win.Promise
                .all( [
                    avenir.load(),
                    avenirItalic.load(),
                    avenirBlack.load(),
                    avenirBlackItalic.load(),
                ] )
                .then( function() {
                    win.document.documentElement.className += " " + fontsClass;
                    sessionStorage.setItem( "fontsLoaded" , "loaded" );
                } );
        }
    }

    // Add scoping classes to HTML element
    win.document.documentElement.className += " " + docClasses.join(" ");

}( this ));
