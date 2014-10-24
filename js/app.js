/**
 * owncloud - talk
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Vincent Petry <pvince81@owncloud.com>
 * @copyright Vincent Petry 2014
 */

(function ($, OC, OCA) {

	if (!OCA.Talk) {
		OCA.Talk = {};
	}

	/**
	 * @namespace
	 */
	var App = {
		$el: null,
		$frame: null,

		initialize: function($el) {
			this.$el = $el;
			this.$frame = $el.find('#talkFrame');

			this._onResize = _.bind(this._onResize, this);
			this._onResite = _.debounce(this._onResize, 200);
			$(window).resize(this._onResize);
			// set initial size
			this._onResize();
		},

		_onResize: function() {
			var contentHeight = this.$el.height();
			this.$frame.height(contentHeight);
		}
	};

	OCA.Talk.App = App;

	$(document).ready(function() {
		OCA.Talk.App.initialize($('#content.app-talk #app-content'));
	});

})(jQuery, OC, OCA);

