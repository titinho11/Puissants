/*!
Waypoints Debug - 3.1.1
Copyright © 2011-2015 Caleb Troughton
Licensed under the MIT license.
https://github.com/imakewebthings/waypoints/blog/master/licenses.txt
*/
(function(){'use strict';var i=['You have a Waypoint element with display none. For more information on ','why this is a bad idea read ','http://imakewebthings.com/waypoints/guides/debugging/#display-none'].join(''),e=['You have a Waypoint element with fixed positioning. For more ','information on why this is a bad idea read ','http://imakewebthings.com/waypoints/guides/debugging/#fixed-position'].join('');function o(){var o=window.Waypoint.Context.prototype.refresh;window.Waypoint.Context.prototype.refresh=function(){for(var a in this.waypoints){for(var s in this.waypoints[a]){var n=this.waypoints[a][s],t=window.getComputedStyle(n.element);if(!n.enabled){continue};if(t&&t.display==='none'){console.error(i)};if(t&&t.position==='fixed'){console.error(e)}}};return o.call(this)}};o()}());