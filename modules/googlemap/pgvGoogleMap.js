/**
 * Javascript module for Googlemap
 *
 * This module contains the Javasript functions needed by the Googlemap
 * module of phpGedView
 *
 * phpGedView: Genealogy Viewer
 * Copyright (C) 2002 to 2016  PGV Development Team. All rights reserved.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @package PhpGedView
 * @subpackage Display
 * @version $Id: pgvGoogleMap.js$
 * $Id: pgvGoogleMap.js 7143 2016-10-22 16:53:37Z canajun2eh $
 */

    var markers   = [];
    var infoBubbles = [];
    var Boundaries;
    var map;
    var mapready = 0;

    function highlight(index, tab, zoom) {
        infoBubbles.each(function(ib){
            ib.close();
        });
        map.panTo(markers[index].getPosition());
        map.setZoom(zoom);
        infoBubbles[index].open(map, markers[index]);
        infoBubbles[index].setTabActive(tab + 1);
    }

    function SetBoundaries(MapBounds) {
//        Boundaries = MapBounds;
    }

    function ResizeMap() {
        var clat = 0.0;
        var clng = 0.0;
        var zoomlevel = 1;

        map.fitBounds(Boundaries);

        return;

        if (mapready == 1)
        {
            clat = (Boundaries.getNorthEast().lat() + Boundaries.getSouthWest().lat())/2;
            clng = (Boundaries.getNorthEast().lng() + Boundaries.getSouthWest().lng())/2;
            zoomlevel = map.getBoundsZoomLevel(Boundaries);
            for(i = 0; ((i < 10) && (zoomlevel == 1)); i++) {
                zoomlevel = map.getBoundsZoomLevel(Boundaries);
            }
            zoomlevel = zoomlevel-1;
            map.setCenter(new GLatLng(clat, clng));
            if (zoomlevel < minZoomLevel) {
                zoomlevel = minZoomLevel;
            }
            if (zoomlevel > startZoomLevel) {
                zoomlevel = startZoomLevel;
            }
            map.checkResize();
            map.setCenter(new GLatLng(clat, clng), zoomlevel);
            map.savePosition();
        }
    }

    function AddMarker(Marker) {
        map.addOverlay(Marker);
        markers.push(Marker);
    }

    function loadMap() {
        var ne = Boundaries.getNorthEast();
        var sw = Boundaries.getSouthWest();
        var lat = (ne.lat() + sw.lat())/2;
        var lng = (ne.lng() + sw.lng())/2;
        var zoom = Math.round(Math.log(360 / (ne.lng() - sw.lng()) ) / Math.LN2);
        map = new google.maps.Map(document.getElementById('map_pane'), {
            center: {lat: lat, lng: lng},
            zoom: zoom
        });
        map.fitBounds(Boundaries);
    }
