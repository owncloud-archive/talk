/**
 * owncloud - talk
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Vincent Petry <pvince81@owncloud.com>
 * @copyright Vincent Petry 2014
 */

(function ($, OC) {

	function saveUrl(url) {
		// TODO: validate URL
		OC.AppConfig.setValue('talk', 'url', url);
		// TODO: display "Saved" message, but setValue() cannot
		// tell us when it's done...
	}

	$(document).ready(function () {
		$('#talkSettings input[name=talkUrl]').change(function() {
			saveUrl($(this).val());
		});
	});

})(jQuery, OC);
