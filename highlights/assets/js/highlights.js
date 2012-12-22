// Load jQuery if it's not available.

if (typeof jQuery == 'undefined') {


	function getScript(url, success) {

		var script     = document.createElement('script');
		script.src = url;

		var head = document.getElementsByTagName('head')[0],
		done = false;

		// Attach handlers for all browsers
		script.onload = script.onreadystatechange = function() {

	    if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {

		    done = true;

		    // callback function provided as param
		    success();

		    script.onload = script.onreadystatechange = null;
		    head.removeChild(script);

			};

		};

		head.appendChild(script);

	};

	getScript('//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', function() {
		$.noConflict()																				  

		if (typeof jQuery=='undefined') {

			alert('jQuery failed to load');

		} else {

			transform_socialplugin();

		}

	});

} else { 
   transform_socialplugin();

};

function transform_socialplugin(){
    //console.log('load jQuery');
    /*
FB.init({appId: "484910454894809", status: true, cookie: true});
    
    jQuery('.facebook_button a').each(function(){
        jQuery(this).on('click', function(event){
            event.preventDefault();
            var sharelink = jQuery(this).data('shareurl');
            var sharetext = jQuery(this).data('sharetext');
            console.log(sharelink+' '+sharetext);
            var obj = {
              method: 'feed',
              //redirect_uri: sharelink,
              link: sharelink,
              //picture: 'http://fbrell.com/f8.jpg',
              name: sharetext,
              //caption: 'Reference Documentation',
              description: sharetext
            };
            function callback(response) {
              console.log(response);
            }
    
            FB.ui(obj, callback);
            return false;
        });
    });
*/
    
}



function postToFeed() {
        // calling the API ...
        var obj = {
          method: 'feed',
          redirect_uri: 'YOUR URL HERE',
          link: 'https://developers.facebook.com/docs/reference/dialogs/',
          picture: 'http://fbrell.com/f8.jpg',
          name: 'Facebook Dialogs',
          caption: 'Reference Documentation',
          description: 'Using Dialogs to interact with users.'
        };

        function callback(response) {
          document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        }

        FB.ui(obj, callback);
}