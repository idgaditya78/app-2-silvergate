/**
 * APP.JS
 * APP.JS is a javascript framework intended for speed, easy-to-use, and
 * extendable framework.
 *
 * Copyrights 2013 (C) - ION Developer Group
 */

(function (window) {
    "use strict";
    /**
     * This is the constructor of the AppJS object
     */
    var AppJS = function (selector) {
        /**
         * This to make sure that there is always new instance of AppJS used
         */
        if (!(this instanceof AppJS)) {
            return new AppJS(selector);
        }
        this.construct(selector);
    };
    AppJS.prototype = {
        /**
         * Constructor of the AppJS object, it does some initialization and
         * set-up core values
         */
        construct: function (selector) {
            return this.select(selector);
        },
        /**
         * Add a node to the current first node
         */
        addChild: function (node) {
            this.first();
            this.node.appendChild(node);
            this.node = node;
            return this;
        },
        /**
         * Add class to current node
         */
        addClass: function (className) {
            var regexp = new window.RegExp(className, "i");
            this.each(this.node, function (node) {
                if (!(regexp.exec(node.className))) {
                    node.className += className;
                }
            });
            return this;
        },
        /**
         * Add current node to other node
         */
        addTo: function (parentNode) {
            this.each(this.node, function (node) {
                parentNode.appendChild(node);
            });
            return this;
        },
        /**
         * Do an ajax request
         * rules = {
         *  url, method, username, password, data, mime, success, error
         * }
         */
        ajax: function (rules) {
            var xmlhttp = null;
            if (window.XDomainRequest) {
                xmlhttp = new window.XDomainRequest();
            } else {
                xmlhttp = new window.XMLHttpRequest();
            }

            xmlhttp.open(rules.method, rules.url, true, rules.username, rules.password);
            xmlhttp.setRequestHeader("Content-type", rules.mime);

            xmlhttp.onload = function () {
                rules.success.call(xmlhttp);
            };

            xmlhttp.onerror = function () {
                rules.error.call(xmlhttp);
            };

            xmlhttp.send(rules.data);

            return this;
        },
        /**
         * Select one of the currently selected node by its index
         */
        at: function (index) {
            this.node = this.node[index];
            return this;
        },
        /**
         * Set the attribute of current node
         */
        attribute: function (attributes) {
            this.each(this.node, function (node) {
                for(var a in attributes){
                    node.setAttribute(a, attributes[a]);
                }
            });
            return this;
        },
        /**
         * Bind an event handler to current node
         */
        bind: function (eventName, callback) {
            this.each(this.node, function (node) {
                node.addEventListener(eventName, function (event) {
                    callback.call(node, event);
                }, false);
            });
            return this;
        },
        /**
         * Select child node from current node, to search based on its name
         * use select instead
         */
        child: function (index) {
            this.first();
            this.node = this.node.children[index];
            return this;
        },
        /**
         * Set the class of current node
         */
        className: function (className){
            this.each(this.node, function (node) {
                node.className = className;
            });
            return this;
        },
        /**
         * Create an element
         */
        create: function (tag) {
            this.node = window.document.createElement(tag);
            return this;
        },
        /**
         * Apply a css rule on current node
         */
        css: function (rules) {
            this.each(this.node, function (node) {
                for (var r in rules) {
                    node.style[r] = rules[r];
                }
            });
            return this;
        },
        /**
         * Walk on an array and call the operation passed witht he current array
         * element walked on
         */
        each: function (array, operation) {
            var i = 0;
            if (array.length) {
                for (i = 0; i < array.length; i += 1) {
                    operation.call(this, array[i]);
                }
            } else {
                operation.call(this, array);
            }
            return this;
        },
        /**
         * Select the first node from current nodes
         */
        first: function () {
            if (this.node.length) {
                this.node = this.node[0];
            }
            return this;
        },
        /**
         * Get the first node property
         */
        get: function (property) {
            this.first();
            return this.node[property];
        },
        /**
         * Get the first node attribute
         */
        geta: function (attribute) {
            this.first();
            return this.node.getAttribute(attribute);
        },
        /**
         * Set the inner HTML of current node
         */
        html: function (html) {
            this.each(this.node, function (node) {
                node.innerHTML = html;
            });
            return this;
        },
        /**
         * Insert node into the current first node before another node
         */
        insertBefore: function (newNode, beforeNode){
            this.first();
            this.node.insertBefore(newNode, beforeNode);
            this.node = newNode;
            return this;
        },
        /**
         * Insert current node to other node
         */
        insertBeforeTo: function (parentNode, beforeNode) {
            this.each(this.node, function (node) {
                parentNode.insertBefore(node, beforeNode);
            });            
            return this;
        },
        /**
         * Bind an event handler to window DOMContentLoaded event
         */
        load: function (callback) {
            window.addEventListener("DOMContentLoaded", function () {
                callback.call(window);
            }, false);
            return this;
        },
        /**
         * Remove current node
         */
        remove: function () {
            /**
             * Handle array differently
             * We have to iterate using while since node length is sequentially
             * decremented each node is removed. Thats why we use this.node[0],
             * since those node array will finally reach zero.
             */
            if (this.node.length) {
                while (this.node.length !== 0) {
                    if (this.node[0].parentElement) {
                        this.node[0].parentElement.removeChild(this.node[0]);
                    } else {
                        throw new Error("Unable to remove root element");
                    }
                }
            } else {
                if (this.node.parentElement) {
                    this.node.parentElement.removeChild(this.node);
                } else {
                    throw new Error("Unable to remove root element");
                }
            }
            return this;
        },
        /**
         * Remove class from current node
         */
        removeClass: function (className) {
            this.each(this.node, function (node) {
                node.className = node.className.replace(className, "");
            });
            return this;
        },
        /**
         * Require external javascript file
         */
        require: function (filename) {
            var head = document.getElementsByTagName("head")[0];
            var script = document.createElement("script");
            script.setAttribute("src", filename);
            head.appendChild(script);
            return this;
        },
        /**
         * Select a node
         */
        select: function (selector) {

            if(typeof(selector) !== "string"){
                this.node = selector;
                return this;
            }

            var prefix = selector[0], select = selector.substr(1), context = this.node || window.document;
            switch (prefix) {
            case "#":
                this.node = context.getElementById(select);
                break;
            case "@":
                this.node = context.getElementsByName(select);
                break;
            case "*":
                this.node = context.getElementsByTagName("*");
                break;
            case ".":
                this.node = context.getElementsByClassName(select);
                break;
            default:
                this.node = context.getElementsByTagName(selector);
                break;
            }
            return this;
        }
    };
    window.appjs = window.a = AppJS;

}(this));