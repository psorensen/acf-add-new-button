jQuery( function( $ ) {

	$( '.acf-relationship' ).each( function( i, e ) {
		//Get the post types associated with the relationship field.
		var posttypes = $( this ).attr( 'data-post_type' ).split( ',' );

		//Only works with a single post type. Others are ignored.
		if ( posttypes.length == 1 ) {
			//Add the Colobox link and button to the proper location and fix the line up of the label.
			$( this ).append( '<a href="' + asran_custom.admin_url + 'post-new.php?post_type=post_type&asran-colorbox=true" class="btn btn-default add-post cboxElement iframe non-repeater">Add New ' + $( this ).attr( 'data-post_type' ) + '</a>' );
			$( '.iframe' ).colorbox( { iframe:true, width:"90%", height:"90%" } );
		}
	} );

} );
