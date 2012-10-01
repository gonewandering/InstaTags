<!DOCTYPE HTML>
<html> 
    <head>
        <title>InstaGrammar / ALPHA</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.1/css/bootstrap-combined.min.css" rel="stylesheet">
        <link href="css/app.css" type="text/css" rel="stylesheet" />
    </head>
<body>
    <script type="text/x-handlebars">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <div class="brand">
                        {{ Is.title }}
                    </div>
                    <div class="nav pull-right">
                        <span class="navbar-form">
                            {{view Is.searchView}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row-fluid">
                <div class="span12 center">
                    {{view Is.resultsView}}
                </div>
            </div>
        </div>
    </script>
    
    <script type="text/x-handlebars" data-template-name="search-view">
        <a class="btn disabled">
            <i class="icon-camera"></i> <strong>{{Is.currentSearch.items}} / {{ Is.currentSearch.count }}</strong> 
            <i class="icon-heart" style="margin-left:10px"></i> <strong>{{Is.currentSearch.likes}}</strong> 
            <i class="icon-comment" style="margin-left:10px"></i> <strong>{{Is.currentSearch.comments}}</strong>
        </a>
        <input type="text" placeholder="Search by #Tag" {{action edit on="keyPress"}} />
        <a class="btn btn-info" {{action reload}}>More</a>
        <a class="btn btn-info" {{action clear}}>Clear</a>
        <a id ="loadAll" class="btn btn-info" {{action all}}>All</a>
        {{#if Is.currentSearch.loading }}<a class="btn btn-warning">Loading...</a>{{/if}}
    </script>
    
    <script type="text/x-handlebars" data-template-name="results-view">
        <div class="row-fluid">
            <div class="span3">
                {{#if Is.currentSearch.col1}}
                    {{#each Is.currentSearch.col1}}
                        <div class="list-item">
                            <div class="image-cap">
                                <div>
                                    <img {{bindAttr src="images.low_resolution.url"}} />
                                </div>
                            </div>
                            <div class="item-content">
                                <p>{{caption.text}}</p>
                                <div class="row-fluid">
                                    <div class="span8">
                                        <strong>{{user.full_name}}</strong>
                                    </div>
                                    <div class="span4 pull-right">
                                        <span><strong>{{likes.count}}</strong> <i class="icon-heart"></i></span>
                                        <span style="margin-left:10px">
                                            <strong>{{comments.count}}</strong> <i class="icon-comment"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            {{#if comments.data}}
                                <div class="item-comments">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            {{#each comments.data}}
                                                <div class="row-fluid comment">
                                                    <div class="span2">
                                                        <img {{bindAttr src="from.profile_picture"}} />
                                                    </div> 
                                                    <div class="span10">
                                                        <small><strong>{{ from.full_name }}</strong> / {{text}}</small>
                                                    </div>
                                                </div>
                                            {{/each}}
                                        </div>
                                    </div>
                                </div>
                            {{/if}}
                        </div>
                    {{/each}}
                {{/if}}
            </div>
            <div class="span3">
                {{#if Is.currentSearch.col2}}
                    {{#each Is.currentSearch.col2}}
                        <div class="list-item">
                            <div class="image-cap">
                                <div>
                                    <img {{bindAttr src="images.standard_resolution.url"}} />
                                </div>
                            </div>
                            <div class="item-content">
                                <p>{{caption.text}}</p>
                                <div class="row-fluid">
                                    <div class="span8">
                                        <strong>{{user.full_name}}</strong>
                                    </div>
                                    <div class="span4 pull-right">
                                        <span><strong>{{likes.count}}</strong> <i class="icon-heart"></i></span>
                                        <span style="margin-left:10px">
                                            <strong>{{comments.count}}</strong> <i class="icon-comment"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            {{#if comments.data}}
                                <div class="item-comments">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            {{#each comments.data}}
                                                <div class="row-fluid comment">
                                                    <div class="span2">
                                                        <img {{bindAttr src="from.profile_picture"}} />
                                                    </div> 
                                                    <div class="span10">
                                                        <small><strong>{{ from.full_name }}</strong> / {{text}}</small>
                                                    </div>
                                                </div>
                                            {{/each}}
                                        </div>
                                    </div>
                                </div>
                            {{/if}}
                        </div>
                    {{/each}}
                {{/if}}
            </div>
            <div class="span3">
                {{#if Is.currentSearch.col3}}
                    {{#each Is.currentSearch.col3}}
                        <div class="list-item">
                            <div class="image-cap">
                                <div>
                                    <img {{bindAttr src="images.standard_resolution.url"}} />
                                </div>
                            </div>
                            <div class="item-content">
                                <p>{{caption.text}}</p>
                                <div class="row-fluid">
                                    <div class="span8">
                                        <strong>{{user.full_name}}</strong>
                                    </div>
                                    <div class="span4 pull-right">
                                        <span>
                                            <i class="icon-heart"></i> {{likes.count}}
                                        </span>
                                        <span style="margin-left:10px">
                                            <i class="icon-comment"></i> {{comments.count}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            {{#if comments.data}}
                                <div class="item-comments">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            {{#each comments.data}}
                                                <div class="row-fluid comment">
                                                    <div class="span2">
                                                        <img {{bindAttr src="from.profile_picture"}} />
                                                    </div> 
                                                    <div class="span10">
                                                        <small><strong>{{ from.full_name }}</strong> / {{text}}</small>
                                                    </div>
                                                </div>
                                            {{/each}}
                                        </div>
                                    </div>
                                </div>
                            {{/if}}
                        </div>
                    {{/each}}
                {{/if}}
            </div>
            <div class="span3">
                {{#if Is.currentSearch.col4}}
                    {{#each Is.currentSearch.col4}}
                        <div class="list-item">
                            <div class="image-cap">
                                <div>
                                    <img {{bindAttr src="images.standard_resolution.url"}} />
                                </div>
                            </div>
                            <div class="item-content">
                                <p>{{caption.text}}</p>
                                <div class="row-fluid">
                                    <div class="span8">
                                        <strong>{{user.full_name}}</strong>
                                    </div>
                                    <div class="span4 pull-right">
                                        <span>
                                            <i class="icon-heart"></i> {{likes.count}}
                                        </span>
                                        <span style="margin-left:10px">
                                            <i class="icon-comment"></i> {{comments.count}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            {{#if comments.data}}
                                <div class="item-comments">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            {{#each comments.data}}
                                                <div class="row-fluid comment">
                                                    <div class="span2">
                                                        <img {{bindAttr src="from.profile_picture"}} />
                                                    </div> 
                                                    <div class="span10">
                                                        <small><strong>{{ from.full_name }}</strong> / {{text}}</small>
                                                    </div>
                                                </div>
                                            {{/each}}
                                        </div>
                                    </div>
                                </div>
                            {{/if}}
                        </div>
                    {{/each}}
                {{/if}}
            </div>
        </div>
    </script>
    
    <script type="application/javascript" src="libs/jquery.js?v=2"></script>
    <script type="application/javascript" src="libs/ember.js?v=2"></script>
    <script type="application/javascript" src="js/app.js?v=2"></script>
</body>
</html>