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
        <div>
            {{view Is.resultsView}}
        </div>
    </script>
    
    <script type="text/x-handlebars" data-template-name="search-view">
        <a class="btn disabled">
            <i class="icon-camera"></i> <strong>{{Is.currentSearch.items}} / {{ Is.currentSearch.count }}</strong> 
            <i class="icon-heart" style="margin-left:10px"></i> <strong>{{Is.currentSearch.likes}}</strong> 
            <i class="icon-comment" style="margin-left:10px"></i> <strong>{{Is.currentSearch.comments}}</strong>
        </a>
        <input type="text" {{ bindAttr placeholder="Is.currentSearch.placeholder" }} {{action edit on="keyPress"}} />
        <a class="btn btn-info" {{action reload}}>More</a>
        <a class="btn btn-info" {{action clear}}>Clear</a>
        <a id ="loadAll" class="btn btn-info" {{action all}}>All</a>
        {{#if Is.currentSearch.loading }}<a class="btn btn-warning">Loading...</a>{{/if}}
    </script>
    
    <script type="text/x-handlebars" data-template-name="results-view">
        <div class="row-fluid">
            {{collection contentBinding="Is.currentSearch.results" itemViewClass="Is.columnView" class="column-row"}}
        </div>
    </script>
    
    <script type="text/x-handlebars" data-template-name="column-view">
        <div style="margin:0 {{unbound Is.currentSearch.colPad}}%; width:{{unbound Is.currentSearch.colWidth}}%; float:left;">
            {{collection contentBinding="content" itemViewClass="Is.itemView" class="item-row"}}
        </div>
    </script>
    
    <script type="text/x-handlebars" data-template-name="item-view">
        <div class="list-item">
            <div class="image-cap">
                <div><img {{bindAttr src="content.images.low_resolution.url"}} /></div>
            </div>
            <div class="item-content">
                <p>{{content.caption.text}}</p>
                <div class="row-fluid">
                    <div class="span8">
                        <strong>{{content.user.full_name}}</strong>
                    </div>
                    <div class="span4 pull-right">
                        <span><strong>{{content.likes.count}}</strong> <i class="icon-heart"></i></span>
                        <span style="margin-left:10px">
                            <strong>{{content.comments.count}}</strong> <i class="icon-comment"></i>
                        </span>
                    </div>
                </div>
            </div>
            {{#if content.comments.data}}
                <div class="item-comments">
                    <div class="row-fluid">
                        <div class="span12">
                            {{#each content.comments.data}}
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
    </script>
    <script type="application/javascript" src="libs/jquery.js?v=2"></script>
    <script type="application/javascript" src="libs/ember.js?v=2"></script>
    <script type="application/javascript" src="js/app.js?v=2"></script>
</body>
</html>