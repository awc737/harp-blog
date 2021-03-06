<!doctype html>
<html class="no-js" lang="en">
	<head>
		<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Alex Crawford</title>
		<link rel="stylesheet" href="/assets/css/app.css" />
		<link rel="stylesheet" href="/assets/css/vendor/prism.css" />
		<link rel="stylesheet" href="/assets/css/vendor/prism-okaidia.css" />
		<link rel="stylesheet" href="/assets/css/override.css" />
	    <script src="/assets/js/vendor/modernizr.js"></script>
	</head>
	<body>
		<nav id="topnav" class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<li class="name">
					<h1><a href="/">Alex Crawford</a></h1>
				</li>
				<li class="toggle-topbar menu-icon">
					<a href="#"><span>Menu</span></a>
				</li>
			</ul>

			<section class="top-bar-section">

				<ul class="right contact_icons hide-for-small">
					<li>
						<a href="http://twitter.com/awc737" target="_blank">
							<i class="fa fa-twitter fa-2x"></i>
						</a>
					</li>
					<li>
						<a href="https://github.com/awc737" target="_blank">
							<i class="fa fa-github fa-2x"></i>
						</a>
					</li>
					<li>
						<a href="https://www.linkedin.com/in/awc737" target="_blank">
							<i class="fa fa-linkedin fa-2x"></i>
						</a>
					</li>
				</ul>

				<ul class="left">
					<li class="">
						<a href="/blog">Blog</a>
					</li>
					<li class="">
						<a href="/projects">Projects</a>
					</li>
					<li class="">
						<a href="/code">Code</a>
					</li>
				</ul>

				<ul class="right mobile_contact_icons show-for-small">
					<div class="icon-bar five-up">
						<a href="http://twitter.com/awc737" class="item"><i class="fa fa-twitter fa-2x"></i></a>
						<a href="https://github.com/awc737" class="item"><i class="fa fa-github fa-2x"></i></a>
						<a href="https://www.linkedin.com/in/awc737" class="item"><i class="fa fa-linkedin fa-2x"></i></a>
					</div>
				</ul>

			</section>
		</nav>

		<div id="page">

			
				<p>&lt;?php</p>
<p>Route::group([&#39;before&#39; =&gt; &#39;auth&#39;], function(){
    Route::group([&#39;prefix&#39; =&gt; &#39;admin&#39;], function()
    {
        Route::get(&#39;articles&#39;, [&#39;as&#39; =&gt; &#39;admin_articles&#39;, &#39;uses&#39; =&gt; &#39;AdminArticleController@getIndex&#39;]);
        Route::get(&#39;articles/create&#39;, [&#39;as&#39; =&gt; &#39;create_article&#39;, &#39;uses&#39; =&gt; &#39;AdminArticleController@getCreate&#39;]);
        Route::get(&#39;articles/{alias}&#39;, [&#39;as&#39; =&gt; &#39;edit_article&#39;, &#39;uses&#39; =&gt; &#39;AdminArticleController@getUpdate&#39;]);
        Route::get(&#39;/&#39;, [&#39;as&#39; =&gt; &#39;admin&#39;, function()
        {
            return View::make(&#39;admin/index&#39;);
        }]);
        Route::group([&#39;before&#39; =&gt; &#39;csrf&#39;], function(){
            Route::post(&#39;articles/create&#39;, [&#39;uses&#39; =&gt; &#39;AdminArticleController@postCreate&#39;]);
        });
    });
});</p>
<p>Route::group([&#39;before&#39; =&gt; &#39;guest&#39;], function(){
    Route::get(&#39;login&#39;, [&#39;as&#39; =&gt; &#39;login&#39;, &#39;uses&#39; =&gt; &#39;AuthController@getLogin&#39;]);</p>
<pre><code>Route::group([&#39;before&#39; =&gt; &#39;csrf&#39;], function(){
    Route::post(&#39;login&#39;, [&#39;uses&#39; =&gt; &#39;AuthController@postLogin&#39;]);
});
</code></pre><p>});</p>
<p>Route::group([&#39;prefix&#39; =&gt; &#39;blog&#39;], function()
{<br>    Route::get(&#39;/&#39;, [&#39;as&#39; =&gt; &#39;blog&#39;, &#39;uses&#39; =&gt; &#39;BlogController@getIndex&#39;]);
    Route::get(&#39;/{alias}&#39;, [&#39;as&#39; =&gt; &#39;blog_post&#39;, &#39;uses&#39; =&gt; &#39;BlogController@getPost&#39;]);
});</p>
<p>Route::get(&#39;logout&#39;, [&#39;as&#39; =&gt; &#39;logout&#39;, &#39;uses&#39; =&gt; &#39;AuthController@getLogout&#39;]);</p>
<p>Route::get(&#39;/&#39;, [&#39;as&#39; =&gt; &#39;home&#39;, &#39;uses&#39; =&gt; &#39;HomeController@getIndex&#39;]);</p>
			

		</div>

		<div id="footer">
			<div class="row">
				<div id="built_with_title" class="medium-8 columns text-right hide-for-small">
					This site is built with:
				</div>
				<div id="built_with_title_small" class="large-12 columns text-right show-for-small">
					This site is built with:
				</div>
				<div id="built_with" class="medium-4 columns pull-right">
					<div class="icon-bar four-up">
						<a href="http://harpjs.com/" target="_blank" class="item has-tip tip-top" data-tooltip aria-haspopup="true" title="Harp Web Server">
							<img src="/assets/img/vendor/harp.svg">
						</a>
						<a href="http://foundation.zurb.com/" target="_blank" class="item has-tip tip-top" data-tooltip aria-haspopup="true" title="Foundation Zurb 5">
							<img src="/assets/img/vendor/yeti.svg">
						</a>
						<a href="http://bower.io/" target="_blank" class="item has-tip tip-top" data-tooltip aria-haspopup="true" title="Bower Package Manager">
							<img src="/assets/img/vendor/bower.svg">
						</a>
						<a href="http://gruntjs.com/" target="_blank" class="item has-tip tip-top" data-tooltip aria-haspopup="true" title="Grunt Task Runner">
							<img src="/assets/img/vendor/grunt.png">
						</a>
					</div>
				</div>
			</div>
		</div>

		<script src="/assets/js/vendor/jquery.min.js"></script>
		<script src="/assets/js/vendor/foundation.min.js"></script>
		<script src="/assets/js/vendor/slick.min.js"></script>
		<script src="/assets/js/vendor/prism/prism-core.min.js"></script>
		<script src="/assets/js/vendor/prism/prism-php.min.js"></script>
		<script src="/assets/js/vendor/prism/prism-javascript.min.js"></script>
		<script src="/assets/js/app.js"></script>
	</body>
</html>
