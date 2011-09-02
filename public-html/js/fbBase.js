window.fbAsyncInit = function() {
    FB.init({
		appId: 'xxx', 
		status: true, 
		cookie: true, 
        xfbml: false,
		channelUrl: document.location.protocol + 'xxx'
	});
	FB.Canvas.setSize({ width: 520, height: 1400 });
};

(function() {
	var e = document.createElement('script'); e.async = true;
	e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
	document.getElementById('fb-root').appendChild(e);
}());