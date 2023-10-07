
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Dashboards'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('/assets/libs/admin-resources/admin-resources.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Dashboard <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Selamat datang <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Unduh Data Report</span>
                            <h4 class="mb-3">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png" alt="Excel Logo" class="excel-logo" height="50px">
                                
                                <div class="container mt-3">
                                    <form action="<?php echo e(route('admin.dashboard.export.excel')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="start_date">Rentang Awal:</label>
                                            <div class="input-group date">
                                                <input type="date" class="form-control datepicker" id="start_date" name="start_date">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="end_date">Rentang Akhir:</label>
                                            <div class="input-group date">
                                                <input type="date" class="form-control datepicker" id="end_date" name="end_date">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>                                  
                                        <button type="submit" class="btn btn-primary">Download Excel</button>
                                    </form>
                                </div>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Biota Tercatat</span>
                            <h4 class="mb-3">
                                <span><?php echo e($count_biotas); ?></span>
                            </h4>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart1" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Hasil Tracker</span>
                            <h4 class="mb-3">
                                <span><?php echo e($count_tracks); ?></span>
                            </h4>
                        </div>
                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart2" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Laporan Nelayan Masuk</span>
                            <h4 class="mb-3">
                                <span><?php echo e($count_laporan_nelayans); ?></span>
                            </h4>
                        </div>
                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart3" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <h5 class="card-title me-2">Mapping Tracks (SIG)</h5>
                    </div>

                    <div class="row align-items-center">
                        <div id="map" style="height: 400px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/admin-resources/admin-resources.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('/assets/js/pages/dashboard.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
    <script>
        var defaultLatitude = -8.4512582;
        var defaultLongitude = 115.0783864;
        var map = L.map('map').setView([defaultLatitude, defaultLongitude], 9);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        var detailTracksData = <?php echo json_encode($trackDetails, 15, 512) ?>;
        var markers = {};

        detailTracksData.forEach(function(detailTrack) {
            var lat = detailTrack.latitude;
            var lng = detailTrack.longitude;
            var imageSrc = "<?php echo e(url('storage/')); ?>/" + detailTrack.image;
            <?php if(Route::is('dashboard.*')): ?>
                var routeUrl = "<?php echo e(route('dashboard.track.detail.show', ['id_track', 'id'])); ?>";
            <?php elseif(Route::is('admin.*')): ?>
                var routeUrl = "<?php echo e(route('admin.dashboard.track.detail.show', ['id_track', 'id'])); ?>";
            <?php endif; ?>
            
            routeUrl = routeUrl.replace('id_track', detailTrack.id_track).replace('id', detailTrack.id);
            var marker = L.marker([lat, lng]).addTo(map);

            var popupContent = `
                <div class="popup-container">
                    <h6 class="popup-title">Track Details</h6>
                    <ul>
                        <li><b>Biota:</b> ${detailTrack.biota.nama_biota}</li>
                        <li><b>Lokasi:</b> ${detailTrack.lokasi.nama_lokasi}</li>
                        <li><b>Keterangan:</b> ${detailTrack.keterangan}</li>
                        <li><a href="${routeUrl}" target="_blank" class="popup-link">Klik untuk informasi detail</a></li>
                    </ul>
                    <div class="image-container">
                        <img src="${imageSrc}" alt="Gambar biota" width="150px">
                    </div>
                </div>
            `;

            if (!markers[lat]) {
                markers[lat] = {};
            }

            if (!markers[lat][lng]) {
                markers[lat][lng] = [];
            }

            markers[lat][lng].push(popupContent);
        });

        for (var lat in markers) {
            for (var lng in markers[lat]) {
                var marker = L.marker([lat, lng]).addTo(map);
                var combinedPopupContent = markers[lat][lng].join('<hr>');

                marker.on('mouseover', function(e) {
                    this.bindPopup(combinedPopupContent).openPopup();
                });
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\dashboardusea3\resources\views/index.blade.php ENDPATH**/ ?>