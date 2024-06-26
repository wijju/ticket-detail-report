<!doctype html>
<html lang="en" class="side-menu-open">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/vendors/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="./assets/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/vendors/jquery-confirm/dist/jquery-confirm.min.css">
    <link rel="stylesheet" href="./assets/vendors/DataTables/datatables.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <title>Ticket Detail Report</title>
</head>

<body>
    <div class="app" id="app">
        <div class="overlay" id="app-overlay"></div>
        <header class="app-header">
            <div class="app-header-left">
                <button class="btn btn-light app-menu-toggle-button" id="btn-toggle-side-menu">
                    <i class="bx bx-menu"></i>
                </button>
            </div>
            <div class="app-header-right"></div>
        </header>
        <nav class="app-menu-container user-select-none">
            <div class="app-menu-header">
                <a href="#" class="app-menu-header-logo">
                    <img src="logo.png" alt="logo">
                    <div>Ticket Detail Report</div>
                </a>
                <button class="btn btn-light app-menu-close-button" id="btn-close-side-menu">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <ul class="app-menu-list show-scroll" id="menuList">
                <li data-section="fu" class="active">File Upload</li>
                <li data-section="ast">Average Of Service</li>
                <li data-section="cos">Workload</li>
                <li data-section="awt">Average Of Wait</li>
                <li data-section="help">Help</li>
            </ul>
        </nav>
        <div class="app-content">
            <section id="fu">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">File Upload</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-muted mb-3">
                            <div>To ensure successful upload, please note the following guidelines:</div>
                            <ol>
                                <li><strong>File Format:</strong> Only files with the extension <code>.xls</code> and
                                    <code>.xlsx</code> are
                                    accepted.
                                </li>
                                <li><strong>Required Columns:</strong> Your Excel file must contain the following
                                    columns:
                                    <code>'Category Name'</code>, <code>'Counter ID'</code>,
                                    <code>'Operator Name'</code>, <code>'Wait Time'</code>, and
                                    <code>'Service Time'</code>.
                                </li>
                            </ol>
                            <p>Following these guidelines will help streamline the upload process and ensure accurate
                                data integration. If you have any questions or encounter any issues, feel free to reach
                                out for assistance.</p>
                        </div>
                        <div class="file-upload-container" id="fileUploadContainer">
                            <div class="file-upload-container-inner">
                                <img src="./assets/img/csv-icon.png" alt="csv-icon">
                                <div class="file-upload-info">
                                    <div class="title">Drag and drop file here</div>
                                    <div class="title">OR</div>
                                    <div class="browse-file-button">Browse File</div>
                                    <div class="filename" id="filename"></div>
                                    <div id="fileErrorText" class="text-danger file-error"></div>
                                </div>
                                <label for="fileInput"></label>
                                <input id="fileInput" type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                            </div>
                            <button class="btn btn-primary w-100 mt-2" id="btnSubmit" style="display: none;">Submit</button>
                        </div>
                    </div>
                </div>
            </section>
            <section id="ast" style="display: none;">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Average Of Service</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-7">
                                <div class="table-responsive">
                                    <table class="table ast-table" id="avgOfServiceTable">
                                        <thead>
                                            <tr>
                                                <th>Operator</th>
                                                <th>Average Of Service</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tfoot>
                                            <th>Total</th>
                                            <th>0</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-5">
                                <div style="display: none;">
                                    <div class="table-responsive">
                                        <table class="table" id="avgOfService_Table">
                                            <thead>
                                                <tr>
                                                    <th>Operator</th>
                                                    <th>Counter</th>
                                                    <th>Category</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div id="avgOfService_Table_FiltersContainer"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h4 class="card-title">Average Of Service</h4>
                            <small class="text-muted">By Categories & Operators</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <div style="display: none;">
                                    <div class="table-responsive">
                                        <table class="table" id="avgOfServiceByOptAndCat_Table">
                                            <thead>
                                                <tr>
                                                    <th>Operator</th>
                                                    <th>Counter</th>
                                                    <th>Category</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div id="avgOfServiceByOptAndCat_Table_FiltersContainer"></div>
                            </div>
                        </div>
                    </div>
                    <div id="avgOfServiceByOptAndCat_Result" class="table-responsive"></div>
                </div>
            </section>
            <section id="cos" style="display: none;">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Workload</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <div style="display: none;">
                                    <div class="table-responsive">
                                        <table class="table" id="countOfService_Table">
                                            <thead>
                                                <tr>
                                                    <th>Operator</th>
                                                    <th>Counter</th>
                                                    <th>Category</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div id="countOfService_Table_FiltersContainer"></div>
                            </div>
                        </div>
                    </div>
                    <div id="countOfService_Result" class="table-responsive"></div>
                </div>
            </section>
            <section id="awt" style="display: none;">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Average Of Wait</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-7">
                                <div class="table-responsive">
                                    <table class="table" id="avgOfWaitTable">
                                        <thead>
                                            <tr>
                                                <th>Operator</th>
                                                <th>Count Of Service</th>
                                                <th>AverageOf Wait</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tfoot>
                                            <th>Grand Total</th>
                                            <th>0</th>
                                            <th>0</th>
                                        </tfoot>
                                    </table>
                                </div>
                                <div id="avgOfWaitChart" style="width: 100%; height: 200px;"></div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-5">
                                <div style="display: none;">
                                    <div class="table-responsive">
                                        <table class="table" id="avgOfWait_Table">
                                            <thead>
                                                <tr>
                                                    <th>Operator</th>
                                                    <th>Counter</th>
                                                    <th>Category</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div id="avgOfWait_Table_FiltersContainer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="help" style="display: none;">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Help</h4>
                    </div>
                    <div class="card-body"></div>
                </div>
            </section>
        </div>
        <div class="app-footer">
            <div class="footer-content">
                <div>© Copyright 2024, </div>
                <div>Design & Developer By <b class="text-primary">Wajahat Rana</b> </div>
            </div>
        </div>
    </div>
    <script src="./assets/vendors/jquery/jquery-3.7.1.min.js"></script>
    <script src="./assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="./assets/vendors/PapaParse-5.0.2/papaparse.min.js"></script>
    <script src="./assets/vendors/gasparesganga-jquery-loading-overlay/loadingoverlay.min.js"></script>
    <script src="./assets/vendors/jquery-confirm/dist/jquery-confirm.min.js"></script>
    <script src="./assets/vendors/echart/echart.min.js"></script>
    <script src="./assets/vendors/DataTables/datatables.min.js"></script>
    <script>
        $.LoadingOverlaySetup({
            image: false,
            custom: '<div class="spinner-border text-primary" role="status"></div>'
        });
    </script>

    <?php
    $scripts = ['theme.js', 'global.js', 'filter.js', 'app.js'];
    foreach ($scripts as $path) {
        $full_path = "./assets/js/$path";
        if (file_exists($full_path)) {
            $last_modified = filemtime($full_path);
            echo "<script src=\"$full_path?v=$last_modified\"></script>\n";
        }
    }
    ?>
</body>

</html>