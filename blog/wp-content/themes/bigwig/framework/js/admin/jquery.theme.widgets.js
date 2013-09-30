/*jslint undef: false, browser: true, devel: false, eqeqeq: false, bitwise: false, white: false, plusplus: false, regexp: false, nomen: false */ 
/*global jQuery,setTimeout,location,setInterval,YT,clearInterval,clearTimeout,pixelentity,ajaxurl */



jQuery(document).ready(function($) {
	
	function tooltip(target) {
		var side = true;
		target.tooltip({
			tooltipClass: 'pe-theme-admin-tooltip%0'.format(side ? " pe-side" : ""),
			items: 'span.help[title]',
			show: { effect: "fadeIn", delay: 200, duration: 200 },
			hide: { effect: "fadeOut", duration: 0 },
			position: {
				my: "left-%0 bottom-20".format(side ? 150 : 166),
				at: "left top",
				collision: "none",
				using: function( position, feedback ) {
					$(this).css(position);
					$( "<div>" )
						.addClass( "arrow" )
						.addClass( feedback.vertical )
						.addClass( feedback.horizontal )
						.appendTo( this );
				}
			}
		});
	}
	
	function tooltips() {
		var widget,widgets = $("#widgets-right div[id*='pethemewidget']");
		widgets.each(function (idx) {
			widget = widgets.eq(idx);
			if (!widget.data("has-tooltip"))  {
				tooltip(widget);
				widget.data("has-tooltip",true);
			}
		});
	}

	
	
	function toObj(s) {
		var r = {};
		var match;
		var pl = /\+/g;  // Regex for replacing addition symbol with a space
		var search = /([^&=]+)=?([^&]*)/g;
		
		function decode(s) { 
			return decodeURIComponent(s.replace(pl, " ")); 
		}

		while ((match = search.exec(s))) {
			r[decode(match[1])] = decode(match[2]);			
		}
		
		return r;
	}

	
	function reloadWidget(e, xhr, settings) {
		
		var req = settings.data;
		
		if (req.search('action=save-widget') != -1 && req.search('delete_widget=1') === -1 && req.search('id_base=pethemewidget') != -1 && req.search('add_new=multi') != -1 ) {
			var wdata = toObj(settings.data);
			var widget = $("#widget-"+wdata["widget-id"]+"-savewidget").click();
		}
	}
	
	jQuery(document).ajaxSuccess(reloadWidget);
	
	jQuery(function () {
		tooltips();
		setInterval(tooltips,500);
	});

});

