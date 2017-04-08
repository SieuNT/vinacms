<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- Aside Start-->
<aside class="left-panel">
    <!-- brand -->
    <div class="logo">
        <?=Html::a('<i class="ion-android-globe"></i> <span class="nav-label">VinaCMS</span>', ['site/index'], ['class' => 'logo-expanded']) ?>
    </div>
    <!-- / brand -->
    <!-- Navbar Start -->
    <nav class="navigation">
        <ul class="list-unstyled">
            <li class="active"><a href="index.html"><i class="ion-home"></i> <span class="nav-label">Dashboard</span></a></li>
            <li class="has-submenu"><a href="#"><i class="ion-android-apps"></i> <span class="nav-label">UI Elements</span></a>
                <ul class="list-unstyled">
                    <li><a href="typography.html">Typography</a></li>
                    <li><a href="buttons.html">Buttons</a></li>
                    <li><a href="icons.html">Icons</a></li>
                    <li><a href="panels.html">Panels</a></li>
                    <li><a href="tabs-accordions.html">Tabs &amp; Accordions</a></li>
                    <li><a href="modals.html">Modals</a></li>
                    <li><a href="bootstrap-ui.html">BS Elements</a></li>
                    <li><a href="progressbars.html">Progress Bars</a></li>
                    <li><a href="notification.html">Notification</a></li>
                    <li><a href="sweet-alert.html">Sweet-Alert</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-settings"></i> <span class="nav-label">Components</span><span class="badge bg-success">New</span></a>
                <ul class="list-unstyled">
                    <li><a href="grid.html">Grid</a></li>
                    <li><a href="portlets.html">Portlets</a></li>
                    <li><a href="widgets.html">Widgets</a></li>
                    <li><a href="nestable-list.html">Nesteble</a></li>
                    <li><a href="calendar.html">Calendar</a></li>
                    <li><a href="ui-sliders.html">Range Slider</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-compose"></i> <span class="nav-label">Forms</span></a>
                <ul class="list-unstyled">
                    <li><a href="form-elements.html">General Elements</a></li>
                    <li><a href="form-validation.html">Form Validation</a></li>
                    <li><a href="form-advanced.html">Advanced Form</a></li>
                    <li><a href="form-wizard.html">Form Wizard</a></li>
                    <li><a href="form-editor.html">WYSIWYG Editor</a></li>
                    <li><a href="code-editor.html">Code Editors</a></li>
                    <li><a href="form-uploads.html">Multiple File Upload</a></li>
                    <li><a href="image-crop.html">Image Crop</a></li>
                    <li><a href="form-xeditable.html">X-Editable</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-grid"></i> <span class="nav-label">Data Tables</span></a>
                <ul class="list-unstyled">
                    <li><a href="tables.html">Basic Tables</a></li>
                    <li><a href="table-datatable.html">Data Table</a></li>
                    <li><a href="tables-editable.html">Editable Table</a></li>
                    <li><a href="responsive-table.html">Responsive Table</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-stats-bars"></i> <span class="nav-label">Charts</span><span class="badge bg-purple">1</span></a>
                <ul class="list-unstyled">
                    <li><a href="morris-chart.html">Morris Chart</a></li>
                    <li><a href="chartjs.html">Chartjs</a></li>
                    <li><a href="flot-chart.html">Flot Chart</a></li>
                    <li><a href="rickshaw-chart.html">Rickshaw Chart</a></li>
                    <li><a href="peity-chart.html">Peity Chart</a></li>
                    <li><a href="c3-chart.html">C3 Chart</a></li>
                    <li><a href="other-chart.html">Other Chart</a></li>
                </ul>
            </li>

            <li class="has-submenu"><a href="#"><i class="ion-email"></i> <span class="nav-label">Mail</span></a>
                <ul class="list-unstyled">
                    <li><a href="inbox.html">Inbox</a></li>
                    <li><a href="email-compose.html">Compose Mail</a></li>
                    <li><a href="email-read.html">View Mail</a></li>
                    <li><a href="email-templates.html">Email Templates</a></li>
                </ul>
            </li>

            <li class="has-submenu"><a href="#"><i class="ion-location"></i> <span class="nav-label">Maps</span></a>
                <ul class="list-unstyled">
                    <li><a href="gmap.html"> Google Map</a></li>
                    <li><a href="vector-map.html"> Vector Map</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-document"></i> <span class="nav-label">Pages</span><span class="badge bg-pink">5</span></a>
                <ul class="list-unstyled">
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="timeline.html">Timeline</a></li>
                    <li><a href="invoice.html">Invoice</a></li>
                    <li><a href="contact.html">Contact-list</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="recoverpw.html">Recover Password</a></li>
                    <li><a href="lock-screen.html">Lock Screen</a></li>
                    <li><a href="blank.html">Blank Page</a></li>
                    <li><a href="404.html">404 Error</a></li>
                    <li><a href="404_alt.html">404 alt</a></li>
                    <li><a href="500.html">500 Error</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
<section class="content">
    <header class="top-head container-fluid">
        <button type="button" class="navbar-toggle pull-left">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- Left navbar -->
        <nav class=" navbar-default" role="navigation">
<!--            <ul class="nav navbar-nav hidden-xs">-->
<!--                <li class="dropdown">-->
<!--                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">English <span class="caret"></span></a>-->
<!--                    <ul role="menu" class="dropdown-menu">-->
<!--                        <li><a href="#">German</a></li>-->
<!--                        <li><a href="#">French</a></li>-->
<!--                        <li><a href="#">Italian</a></li>-->
<!--                        <li><a href="#">Spanish</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--            </ul>-->

            <!-- Right navbar -->
            <ul class="nav navbar-nav navbar-right top-menu top-right-menu">
                <!-- mesages -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-envelope-o "></i>
                        <span class="badge badge-sm up bg-purple count">4</span>
                    </a>
                    <ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5001">
                        <li>
                            <p>Messages</p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="pull-left"><img src="img/avatar-2.jpg" class="img-circle thumb-sm m-r-15" alt="img"></span>
                                <span class="block"><strong>John smith</strong></span>
                                <span class="media-body block">New tasks needs to be done<br><small class="text-muted">10 seconds ago</small></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="pull-left"><img src="img/avatar-3.jpg" class="img-circle thumb-sm m-r-15" alt="img"></span>
                                <span class="block"><strong>John smith</strong></span>
                                <span class="media-body block">New tasks needs to be done<br><small class="text-muted">3 minutes ago</small></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="pull-left"><img src="img/avatar-4.jpg" class="img-circle thumb-sm m-r-15" alt="img"></span>
                                <span class="block"><strong>John smith</strong></span>
                                <span class="media-body block">New tasks needs to be done<br><small class="text-muted">10 minutes ago</small></span>
                            </a>
                        </li>
                        <li>
                            <p><a href="inbox.html" class="text-right">See all Messages</a></p>
                        </li>
                    </ul>
                </li>
                <!-- /messages -->
                <!-- user login dropdown start-->
                <li class="dropdown text-center">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <?=Html::img('/admin/img/logo.gif', ['class' => 'img-circle profile-img thumb-sm']) ?>
                        <span class="username"><?= Yii::$app->user->identity->username; ?></span> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                        <li><a href="profile.html"><i class="fa fa-briefcase"></i>Hồ sơ</a></li>
                        <li>
                        <?= Html::beginForm(['/site/logout'], 'post') . Html::submitButton(
                        '<i class="fa fa-sign-out"></i> Thoát',
                        ['class' => 'btn btn-link btn-logout']
                        ) . Html::endForm(); ?>
                        </li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!-- End right navbar -->
        </nav>

    </header>
    <!-- Header Ends -->
    <!-- Page Content Start -->
    <!-- ================== -->

    <div class="wraper container-fluid">
        <div class="page-title">
            <h3 class="title">Blank Page</h3>
        </div>
        <div class="row">
            <div class="panel panel-purple">
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Company</th>
                            <th>Last Trade</th>
                            <th>Trade Time</th>
                            <th>Change</th>
                            <th>Prev Close</th>
                            <th>Open</th>
                            <th>Bid</th>
                            <th>Ask</th>
                            <th>1y Target Est</th>
                            <th>Lorem</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>GOOG <span class="co-name">Google Inc.</span></th>
                            <td>597.74</td>
                            <td>12:12PM</td>
                            <td>14.81 (2.54%)</td>
                            <td>582.93</td>
                            <td>597.95</td>
                            <td>597.73 x 100</td>
                            <td>597.91 x 300</td>
                            <td>731.10</td>
                            <td>Spanning cell</td>
                        </tr>
                        <tr>
                            <th>GOOG <span class="co-name">Google Inc.</span></th>
                            <td>597.74</td>
                            <td>12:12PM</td>
                            <td>14.81 (2.54%)</td>
                            <td>582.93</td>
                            <td>597.95</td>
                            <td>597.73 x 100</td>
                            <td>597.91 x 300</td>
                            <td>731.10</td>
                            <td>Spanning cell</td>
                        </tr>
                        <tr>
                            <th>GOOG <span class="co-name">Google Inc.</span></th>
                            <td>597.74</td>
                            <td>12:12PM</td>
                            <td>14.81 (2.54%)</td>
                            <td>582.93</td>
                            <td>597.95</td>
                            <td>597.73 x 100</td>
                            <td>597.91 x 300</td>
                            <td>731.10</td>
                            <td>Spanning cell</td>
                        </tr>
                        <tr>
                            <th>GOOG <span class="co-name">Google Inc.</span></th>
                            <td>597.74</td>
                            <td>12:12PM</td>
                            <td>14.81 (2.54%)</td>
                            <td>582.93</td>
                            <td>597.95</td>
                            <td>597.73 x 100</td>
                            <td>597.91 x 300</td>
                            <td>731.10</td>
                            <td>Spanning cell</td>
                        </tr>
                        <tr>
                            <th>GOOG <span class="co-name">Google Inc.</span></th>
                            <td>597.74</td>
                            <td>12:12PM</td>
                            <td>14.81 (2.54%)</td>
                            <td>582.93</td>
                            <td>597.95</td>
                            <td>597.73 x 100</td>
                            <td>597.91 x 300</td>
                            <td>731.10</td>
                            <td>Spanning cell</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <footer class="footer">
        2017@VinaCMS
    </footer>
</section>
<div class="wrap">


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
