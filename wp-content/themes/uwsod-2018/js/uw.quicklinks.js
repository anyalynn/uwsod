// This section builds and populates the quicklinks section (off-canvas right)

UW.QuickLinks = Backbone.View.extend({

    DELAY : 5000,

    settings : {},

    // todo: the default list and these elements could be put into the php templates
    container: '#uw-container',

    template : '<nav id="quicklinks" aria-label="quick links" aria-hidden="true">' +
                        '<ul id="big-links">' +
                            '<% _.each( links, function( link ) { %> ' +
                                '<% if (link.classes) { %>' +
                                    '<li>' +
                                        '<span class="<%= link.classes %>"></span>' +
                                        '<a href="<%= link.url %>" tabindex="-1"><%= link.title %></a>' +
                                    '</li>' +
                                '<% } %>' +
                            '<% }) %>' +
                        '</ul>' +
                        '<h3>Helpful Links</h3>' +
                        '<ul id="little-links">' +
                            '<% _.each( links, function( link ) { %> '+
                                '<% if ( ! link.classes) { %>' +
                                    '<li>' +
                                        '<span class="<%= link.classes %>"></span>' +
                                        '<a href="<%= link.url %>" tabindex="-1"><%= link.title %></a>' +
                                    '</li>' +
                                '<% } %>' +
                            '<% }) %>' +
                        '</ul>' +
                    '</nav>',

    events: {
       'click'           : 'animate',
       'touchstart'   : 'animate',
       'keyup'         : 'animate',
       'blur' : 'loop'
    },

    initialize: function ( options ) {
        _.bindAll( this, 'inner_keydown', 'render', 'renderDefault', 'animate', 'accessible', 'loop', 'transitionEnd' );

        this.options = _.extend( {}, this.settings , options )

        this.links = new UW.QuickLinks.Collection( this.options )

        this.links.on( 'sync', this.render )

        this.links.on( 'error', this.renderDefault )

        this.links.fetch()
    },

    renderDefault : function ()
    {
        this.defaultLinks =  this.links.defaults
        this.render()
    },

    render : function(  )
    {
        this.quicklinks = $( _.template( this.template )({ links : this.defaultLinks ? this.defaultLinks : this.links.toJSON() }) );
        this.$container = $(this.container);
        this.$container.prepend( this.quicklinks )
        this.$el.attr( 'aria-controls', 'quicklinks' ).attr( 'aria-owns', 'quicklinks' )
        UW.$body.on( 'keydown', '#quicklinks a:first', this.inner_keydown )
        UW.$body.on( 'keyup', '#quicklinks a', this.animate )
        this.quicklinks.on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', this.transitionEnd);
    },

    transitionEnd: function (event) {
        if (this.open && event.target == this.quicklinks[0]) {
            this.accessible();
        }
    },

    inner_keydown: function (e) {
        //may need event.prevent_default() here if screenreaders aren't acting right
        if ( e.keyCode == 9 && e.shiftKey) {
            this.$el.focus();
            return false;
        }
    },

    animate: function ( e ) {
        e.preventDefault();

        if ( e.keyCode && e.keyCode != 27 )
        {
            if ( e.keyCode && e.keyCode != 13 ||
                e.keyCode && e.keyCode != 32 )
            return false;
        }

        this.$container.toggleClass('open')
        this.quicklinks.toggleClass('open')

        this.open = this.quicklinks.hasClass( 'open' )

        if (!this.open) {
            this.accessible();
        }
    },

    // todo : cache the uw-container-inner and screen-reader
    accessible : function (argument)
    {
        this.$el.attr( 'aria-expanded', this.open )
        this.quicklinks.attr('aria-hidden',  ( ! this.open ).toString() )
        if ( this.open ) {
            this.$el.attr('aria-label', 'Close quick links');
            this.quicklinks.find('a').attr( 'tabindex', 0 ).first().focus()
           $('#uw-container-inner').attr('aria-hidden', true);
           $('.screen-reader-shortcut').attr('aria-hidden', true)
        } else {
            this.$el.attr('aria-label', 'Open quick links');
            this.quicklinks.find('a').attr( 'tabindex', -1 )
            this.$el.focus()
           $('#uw-container-inner').attr('aria-hidden', false);
           $('.screen-reader-shortcut').attr('aria-hidden', false);
        }
    },

    loop : function (event) {
        if( this.open ) {
            this.quicklinks.find('li a').first().focus();
        }
    }

});

UW.QuickLinks.Model = Backbone.Model.extend({});

UW.QuickLinks.Collection = Backbone.Collection.extend({

    model: UW.QuickLinks.Model,

    initialize: function ( options )
    {
        this.url = options.url;
    },

    defaults : [{
       "title": "SOD Intranet",
       "url": "https:\/\/uwnetid.sharepoint.com\/sites\/sod",
       "classes": ["icon-myuw"]
   }, {
       "title": "Calendar",
       "url": "https:\/\/dental.washington.edu\/calendar",
       "classes": ["icon-calendar"]
   }, {
       "title": "UW Directories",
       "url": "http:\/\/www.washington.edu\/home\/peopledir\/",
       "classes": ["icon-directories"]
   }, {
       "title": "UW Campus Maps",
       "url": "http:\/\/www.washington.edu\/maps\/",
       "classes": ["icon-maps"]
   }, {
       "title": "News & Events",
       "url": "http:\/\/dental.washington.edu\/about-us\/news-events",
       "classes": ["icon-uwtoday"]
   }, {
       "title": "Course Catalog",
       "url": "http:\/\/dental.washington.edu\/course-catalog",
       "classes": false
   }, {
       "title": "Compliance",
       "url": "http:\/\/dental.washington.edu\/compliance",
       "classes": false
   }, {
       "title": "Policies",
       "url": "http:\/\/dental.washington.edu\/policies",
       "classes": false
   }, {
       "title": "Health & Safety",
       "url": "http:\/\/dental.washington.edu\/health-and-safety",
       "classes": false
   },{
       "title": "Northwest Center for Oral and Facial Surgery",
       "url": "http:\/\/dental.washington.edu\/patient\/clinics\/nw-oral-facial-surgery",
       "classes": false
   }, {
       "title": "The Center for Pediatric Dentistry",
       "url": "http:\/\/www.thecenterforpediatricdentistry.com\/",
       "classes": false
   }, {
       "title": "UW Dental Facebook",
       "url": "https:\/\/www.facebook.com\/pages\/The-University-of-Washington-School-of-Dentistry\/160752227303910",
       "classes": false
   }]

});
