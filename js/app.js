// Create Application

Is = Ember.Application.create({
    loading: false,
    title: "Instatags",
    subtitle: "An app for getting analytics on Instagram Tags",
    app_id: "035d1b35a32c4faaadfa6304bb866152",
    by: "Lindsay Silver, Clever Girls Collective"
});

// Models

Is.Search = Ember.Object.extend({
    loadAll: false,
    placeholder: function () {
        if (this.get("query")) { return this.get("query"); }
        else { return "Search by #Tag"; }
    }.property(),
    columns: 5,
    colWidth: function() { return ((100/this.get("columns"))-(this.colPad)*2); }.property(),
    colPad: .75,
    url: false,
    rate: 3000,
    items: 0,
    likes: false,
    comments: false,
    createUrl: function () { 
        var url = "https://api.instagram.com/v1/tags/"+this.query+"/media/recent?callback=?&client_id="+Is.get("app_id");
        if (this.url == false) { return url; } else { return this.url; }
    },
    query: null,
    count: 0,
    loading:false,
    results: Ember.ArrayController.create({ content: [] }),
    
    init: function () { 
        if (this.query) { this.refresh(); }
    },
    getResults: function getRes(callback) { 
        var me = this;
        this.set("url", this.createUrl());
        this.set("loading", true);
        $.getJSON(me.url, function (d) {
            
            // Set Url Etc.
            me.set("url", d.pagination.next_url+"&callback=?");
            var n = 0; $.each(d.data, function (k, v) {
            
                // General Stats
                me.set("items", me.get("items")+1);
                me.set("likes", me.get("likes")+v.likes.count);
                me.set("comments", me.get("comments")+v.comments.count);
                
                // Add to Columns
                while (me.results.content[n] === undefined) { 
                    me.results.insertAt(0, Ember.ArrayController.create({ content: [] }));
                }
                me.results.content[n].insertAt(0, v); n++;
                if (n >= me.get("columns")) { n = 0; }
            });
            
            if (me.get("url") && me.get("loadAll") == true) { me.getResults(); }
            me.set("loading", false);
        });
    },
    getCount: function (callback) { 
        var me = this; 
        this.set("loading", true);
        $.getJSON("https://api.instagram.com/v1/tags/"+this.query+"?callback=?&client_id="+Is.get("app_id"), function (d) { 
            me.set("count", d.data.media_count);
            me.set("loading", false);
        });
    },
    refresh: function () {
        this.getCount();
        this.getResults();
    }.observes("query"),
    clear: function () { 
        this.results.set("content", []);
    }
});

// ControllerViews

Is.searchView = Ember.View.extend({
    templateName: "search-view",
    edit: function (e) {
        if (e.keyCode == 13) { 
            Is.currentSearch.clear();
            Is.currentSearch.set("url", false);
            Is.currentSearch.set("query", Ember.$(e.currentTarget).val().replace("#", ""));
            return false;
        }
    },
    reload: function () { Is.currentSearch.getResults(); },
    clear: function () { Is.currentSearch.clear(); },
    all: function () { 
        if (Is.currentSearch.get("loadAll") == false) { 
            Is.currentSearch.set("loadAll", true); 
            Is.currentSearch.getResults();
            Ember.$("#loadAll").addClass("btn-warning"); 
        } else { 
            Is.currentSearch.set("loadAll", false);
            Ember.$("#loadAll").removeClass("btn-warning");         
        }
    }
});

Is.resultsView = Ember.View.extend({
    templateName: "results-view"
});

Is.columnView = Ember.View.extend({
    templateName: "column-view"
});

Is.itemView = Ember.View.extend({
    templateName: "item-view"
});

// Init

if (window.location.hash) { 
    Is.currentSearch = Is.Search.create({"query" : window.location.hash.replace(["/#/", "#/", "#"], "")});
} else { 
    Is.currentSearch = Is.Search.create();    
}