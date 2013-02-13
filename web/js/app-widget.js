/**
 * Widget extension for AppJS
 * Copyrights 2013 (C) - ION Developer Group
 */

(function (window) {
    "use strict";

    var AppWidget = function () {
        if (!(this instanceof AppWidget)) {
            return new AppWidget();
        }
    };

    AppWidget.prototype = {
        /**
         * Enable the functionality of a tab widget
         */
        tab: function (tab){
            //Tab index is used to track which tab pages to display
            var tabPagesIndex = 0;
            //We need to do tracking, place tab index on the tab title
            a().each(a(tab).select(".app-tab").node, function (node) {
                a(node).attribute({"tab-page":tabPagesIndex++});
            });
            a(tab).select(".app-tab").bind("click", function (event) {
                //Disable any other active tab title
                a(tab).select(".app-tab-active").className("app-tab");
                //Enable clicked on
                a(this).className("app-tab-active");
                
                //Disable any other active tab page
                a(tab).select(".app-tab-page-active").className("app-tab-page");
                //Enable clicked on tab-pages, we use the tab-page (tab index)
                //To determines which one to activate
                a(tab).select(".app-tab-page").at(a(this).geta("tab-page")).className("app-tab-page-active");

            });
            //Enable first tab
            a(tab).select(".app-tab-page").first().className("app-tab-page-active");
            a(tab).select(".app-tab").first().className("app-tab-active");
        }
    };

    window.appwidget = window.appw = AppWidget;

}(this));