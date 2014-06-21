jQuery( function ( $ ) {
    $( "area" ).each( function () {
        if( $( this ).attr( "href" ).toLowerCase().search( ".jpg" ) === -1 ) {
            return;
        }
        var $this = $( this );
        var $td = $this.closest( "td" );
        var $img = $td.find( "img" );

        var $div = $( "<div />" ).addClass( "image" );
        var title = $img.attr( "alt" );
        $( '<img />' ).addClass( "small" ).attr( "src", $img.attr( "src" ) ).appendTo( $div );
        $( '<img />' ).addClass( "large" ).attr( "src", $this.attr( "href" ) ).appendTo( $div );

        if( typeof title !== "undefined" ) {
            $( "<div />" ).addClass( "large comment" ).html( title ).appendTo( $div );
        }

        $td.html( "" ).append( $div );


    } );

    $( document ).ready( function () {

        var $table = $( "body>table" );
        var max_bottom = $table.height() + $table.offset().top;
        var max_right = $table.width() + $table.offset().left;
        $( ".image" ).hover( function () {
            $( this ).addClass( "over" );
            
            var $large = $( ".over .large" ).click( function () {
                $( this ).parent( ".over" ).removeClass( "over" );
            } );

            var bottom = $large.height() + $large.offset().top;
            var right = $large.width() + $large.offset().left;

            if( bottom > max_bottom ) {
                $large.css( "top", $large.css( "top" ).replace( "px", "" ) - bottom + max_bottom );
            }

            if( right > max_right ) {
                $large.css( "left", $large.css( "left" ).replace( "px", "" ) - right + max_right );
            }

        }, function () {
            $( this ).removeClass( "over" );
        } );

//            on("mouseover", function ( ){
//
//        })

    } );
} );