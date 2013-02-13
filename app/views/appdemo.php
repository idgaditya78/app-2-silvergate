<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>APP-JS Demo</title>
        <link rel="stylesheet" href="/web/css/main.css"/>
        <link rel="stylesheet" href="/web/css/app-widget.css"/>
        <script src="/web/js/app.js"></script>
        <script src="/web/js/app-widget.js"></script>
        <script>
        </script>
    </head>
    <body style="background:#EEE;">
        <div id="area" style="padding:16px;box-shadow:none;border:solid thin silver;">
            <widget class="app-tab-widget" id="mytab">
                <control class="app-tab-panel">
                    <control class="app-tab">
                        Tab 1
                    </control>
                    <control class="app-tab">
                        Tab 2
                    </control>
                    <control class="app-tab">
                        Tab 3
                    </control>
                </control>
                <control class="app-tab-pages">
                    <control class="app-tab-page">
                        <p>
                            Lorem ipsum dolor sit amet. Aventador gardio savke
                            largino masakte reoun regeux masch che deviro.
                        </p>
                    </control>
                    <control class="app-tab-page">
                        <p>
                            Lorem ipsum dolor sit amet. Aventador gardio savke
                            largino masakte reoun regeux masch che deviro.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet. Aventador gardio savke
                            largino masakte reoun regeux masch che deviro.
                        </p>
                    </control>
                    <control class="app-tab-page">
                        <p>
                            Lorem ipsum dolor sit amet. Aventador gardio savke
                            largino masakte reoun regeux masch che deviro.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet. Aventador gardio savke
                            largino masakte reoun regeux masch che deviro.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet. Aventador gardio savke
                            largino masakte reoun regeux masch che deviro.
                        </p>
                    </control>
                </control>
            </widget>
            <script>
                appw().tab(a("#tab").node);
            </script>
        </div>
    </body>
</html>
