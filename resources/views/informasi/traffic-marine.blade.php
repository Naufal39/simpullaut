@extends('layouts/main')

@section('isihalaman')
    <main class="main">

        <!-- Services Section -->
        <section id="traffic-marine" class="services section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Traffic Marine</h2>
                <p>
                    Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
                    consectetur velit
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    <script type="text/javascript">
                        width = '100%'; // the width of the embedded map in pixels or percentage
                        height = '750'; // the height of the embedded map in pixels or percentage
                        border = '1'; // the width of the border around the map (zero means no border)
                        shownames = 'false'; // to display ship names on the map (true or false)
                        latitude = '-08.1462'; // the latitude of the center of the map, in decimal degrees
                        longitude = '124.1016'; // the longitude of the center of the map, in decimal degrees
                        zoom = '5'; // the zoom level of the map (values between 2 and 17)
                        maptype = '1'; // use 0 for Normal Map, 1 for Satellite
                        trackvessel =
                            '0'; // MMSI of a vessel (note: vessel will be displayed only if within range of the system) - overrides "zoom" option
                        fleet = ''; // the registered email address of a user-defined fleet (user's default fleet is used)
                    </script>
                    <script type="text/javascript" src="https://www.marinetraffic.com/js/embed.js"></script>;
                </div>
            </div>
        </section>
        <!-- /Services Section -->

    </main>
@endsection
