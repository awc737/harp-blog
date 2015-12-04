<!doctype html>
<html class="no-js" lang="en">
	<head>
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
						<a href="http://steamcommunity.com/id/artificialex" target="_blank">
							<i class="fa fa-steam fa-2x fa-spin"></i>
						</a>
					</li>
					<li>
						<a href="https://www.linkedin.com/profile/view?id=104963465&trk=nav_responsive_tab_profile" target="_blank">
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
						<a href="#" class="item"><i class="fa fa-twitter fa-2x"></i></a>
						<a href="#" class="item"><i class="fa fa-github fa-2x"></i></a>
						<a href="#" class="item"><i class="fa fa-steam fa-2x fa-spin"></i></a>
						<a href="#" class="item"><i class="fa fa-linkedin fa-2x"></i></a>
						<a href="#" class="item"><i class="fa fa-facebook fa-2x"></i></a>
					</div>
					<!-- That was ugly.
					<form>
						<div class="row">
						<br>
							<div class="large-12 columns">
								<textarea placeholder="Message"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="small-8 columns">
								<div class="row">
									<div class="small-2 columns">
										<span class="label">From:</span>
									</div>
									<div class="small-10 columns">
										<input type="text" id="right-label" placeholder="Email address">
									</div>
								</div>
							</div>
							<div class="small-4 columns">
								<button class="button expand success"><i class="fa fa-send-o"></i> Contact Me!</button>
							</div>
						</div>
					</form>
					<hr>
					-->
				</ul>

			</section>
		</nav>

		<div id="page">
			
			
				<p>&lt;?php</p>
<p>defined(&#39;_JEXEC&#39;) or die(&#39;Restricted access&#39;);
jimport(&#39;joomla.application.component.modelitem&#39;);</p>
<p>class Jw_findstoreModelJw_findstore extends JModelItem
{
        protected $filters;
        protected $collections;</p>
<pre><code>    public function getFilters() 
    {
            $db = JFactory::getDBO();
            $query = $db-&gt;getQuery(true);
            $query-&gt;select(&#39;id,title,image,ordering&#39;);
            $query-&gt;from(&#39;#__jw_findstore_categories&#39;);
            $query-&gt;where(&#39;state = 1&#39;);
            $query-&gt;order(&#39;ordering ASC&#39;);
            $db-&gt;setQuery((string)$query);
            $categories = $db-&gt;loadObjectList();

            foreach ($categories as $category){
                    $db = JFactory::getDBO();
                    $query = $db-&gt;getQuery(true);
                    $query-&gt;select(&#39;id,title,collections,category,uris,ordering&#39;);
                    $query-&gt;from(&#39;#__jw_findstore_mappings&#39;);
                    $query-&gt;where(&#39;state = 1&#39;);
                    $query-&gt;where(&#39;category = &#39;.$category-&gt;id);
                    $query-&gt;order(&#39;ordering ASC&#39;);
                    $db-&gt;setQuery((string)$query);
                    $mappings = $db-&gt;loadObjectList();
                    $filters[] = array($category-&gt;id =&gt; $category-&gt;title, &quot;image&quot; =&gt; $category-&gt;image, &quot;mappings&quot; =&gt; $mappings);
            }

            return $filters;
    }

    public function getCollections() 
    {
            $db = JFactory::getDBO();
            $query = $db-&gt;getQuery(true);
            $query-&gt;select(&#39;id,title,col_id,ordering&#39;);
            $query-&gt;from(&#39;#__jw_findstore_collections&#39;);
            $query-&gt;where(&#39;state = 1&#39;);
            $query-&gt;order(&#39;ordering ASC&#39;);
            $db-&gt;setQuery((string)$query);
            $collections = $db-&gt;loadObjectList();

            //$collections = json_encode($collections);
            return $collections;
    }

    public function getMappings() 
    {
            $db = JFactory::getDBO();
            $query = $db-&gt;getQuery(true);
            $query-&gt;select(&#39;id,collections,category, uris&#39;);
            $query-&gt;from(&#39;#__jw_findstore_mappings&#39;);
            $query-&gt;where(&#39;state = 1&#39;);
            $db-&gt;setQuery((string)$query);
            $mappings = $db-&gt;loadObjectList();

            return $mappings;
    }

    public function getUris() 
    {
            $db = JFactory::getDBO();
            $query = $db-&gt;getQuery(true);
            $query-&gt;select(&#39;id,collections,category,uris&#39;);
            $query-&gt;from(&#39;#__jw_findstore_mappings&#39;);
            $query-&gt;where(&#39;state = 1&#39;);
            $db-&gt;setQuery((string)$query);
            $mappings = $db-&gt;loadObjectList();

            foreach ($mappings as $mapping){
                    $db = JFactory::getDBO();
                    $query = $db-&gt;getQuery(true);
                    $query-&gt;select(&#39;id,title,collections,category,ordering&#39;);
                    $query-&gt;from(&#39;#__jw_findstore_mappings&#39;);
                    $query-&gt;where(&#39;state = 1&#39;);
                    $query-&gt;where(&#39;category = &#39;.$category-&gt;id);
                    $query-&gt;order(&#39;ordering ASC&#39;);
                    $db-&gt;setQuery((string)$query);
                    $mappings = $db-&gt;loadObjectList();
                    $filters[] = array($category-&gt;id =&gt; $category-&gt;title, &quot;image&quot; =&gt; $category-&gt;image, &quot;mappings&quot; =&gt; $mappings);
            }

            return $filters;
    }
</code></pre><p>}</p>
			

		</div>

		<div id="footer">
			<div class="row">
				<div id="built_with_title" class="medium-8 columns text-right hide-for-small">
					This site is proudly built using:
				</div>
				<div id="built_with_title_small" class="large-12 columns text-right show-for-small">
					This site is proudly built using:
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