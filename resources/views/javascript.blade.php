@if (!$view->shared('javascript', false))

    @if ($view->share('javascript', true)) @endif

    @if ($options['async'])

        <script type="text/javascript">

            var initialize_ready = false;

            var initialize_items = {
                queue: [],
                push: function (item) {
                    if (initialize_ready) {
                        item.method();
                    } else {
                        this.queue.push(item);
                    }
                }
            };

            function initialize_method() {
                initialize_ready = true;
                while (initialize_items.queue.length) {
                    initialize_items.queue.shift().method();
                }
            }

        </script>
        
        <script async defer type="text/javascript" src="//maps.googleapis.com/maps/api/js?v={!! $options['version'] !!}&region={!! $options['region'] !!}&language={!! $options['language'] !!}&key={!! $options['key'] !!}&libraries=places&callback=initialize_method"></script>

    @else

        <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v={!! $options['version'] !!}&region={!! $options['region'] !!}&language={!! $options['language'] !!}&key={!! $options['key'] !!}&libraries=places"></script>

    @endif

    @if ($options['cluster'])

        <script type="text/javascript" src="//googlearchive.github.io/js-marker-clusterer/src/markerclusterer.js"></script>

    @endif

@endif
