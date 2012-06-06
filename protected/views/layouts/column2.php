<?php $this->beginContent('//layouts/main'); ?>

<div class="row-fluid">
    <div id="side_nav" class="span2 sidebar-nav side_nav">
        <span id="logo" class="logo">&nbsp;</span>
        <ul class="clearfix">
            <li><a class="round_top" href="index.html">
                <img src="images/icons/grey/Laptop.png">
                <span>Dashboard</span></a>
            </li>
            <li><a href="layout.html">
                <img src="images/icons/grey/Frames.png">
                <span>Layout</span>
                <span class="icon">&nbsp;</span></a>
                <div class="accordion">
                    <a href="layout.html">Grid</a>
                    <a href="portlets.html">Portlets</a>
                    <a href="layout.html">Box Grid</a>
                </div>
            </li>
            <li><a href="typhography.html">
                <img src="images/icons/grey/list_w__images.png">
                <span>Typhography</span>
                <span class="icon">&nbsp;</span>
            </a>
                <ul>
                    <li><a href="typhography.html">General</a></li>
                    <li><a href="typhography.html">Lists</a></li>
                    <li><a href="buttons.html">Icons</a></li>
                    <li><a href="buttons.html">Buttons</a></li>
                    <li><a href="typhography.html">Codeview</a></li>
                    <li><a href="tables.html">Pagination</a></li>
                    <li><a href="#">Others
                        <span class="icon">&nbsp;</span></a>

                        <ul>
                            <li><a href="typhography_other.html">
                                <img src="images/icons/grey/sign_post.png">Tooltips</a></li>
                            <li><a href="typhography_other.html">
                                <img src="images/icons/grey/strategy_2.png">Popovers</a></li>
                            <li><a href="typhography_other.html">
                                <img src="images/icons/grey/iChat.png">Alerts</a></li>
                            <li><a href="typhography_other.html">
                                <img src="images/icons/grey/loading_bar.png">Progress Bars</a></li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li><a href="#">
                <img src="images/icons/grey/Table.png">
                <span>Tables</span>
                <span class="icon">&nbsp;</span></a>
                <div class="accordion">
                    <a href="tables.html">Standard Tables</a>
                    <a href="tables.html">Data Tables</a>
                </div>
            </li>
            <li><a href="#">
                <img src="images/icons/grey/Archive.png">
                <span>Forms</span>
                <span class="icon">&nbsp;</span></a>
                <div class="accordion">
                    <a href="forms.html">MultiUpload</a>
                    <a href="forms.html">Multiselect</a>
                    <a href="forms.html">DatePickers</a>
                    <a href="forms.html">Sliders</a>
                </div>
            </li>
            <li><a href="calendar.html">
                <img src="images/icons/grey/day_calendar.png">
                <span>Calendar</span></a>
            </li>
            <li><a href="gallery.html">
                <img src="images/icons/grey/Images.png">
                <span>Image Gallery</span></a>
            </li>
            <li><a href="login.html">
                <img src="images/icons/grey/bulls_eye.png">
                <span>Logout</span></a>
            </li>
        </ul>
        <a href="#" class="minimize round_bottom"><span>minimize</span></a>
    </div><!--/span-->

    <!-- main container -->
    <div id="main_container" class="span10">

        <!-- Shortcut buttons -->
        <div class="row-fluid">
            <div class="span12 shortcut">
                <a href="#" class="btn btn-shortcut"><img src="images/icons/grey/Home.png" alt="Dashboard" />Dashboard<span class="label label-success">9</span></a>
                <a href="#" class="popover_shortcut_on btn btn-shortcut"
                   rel="popover"
                   data-content=
                       '<a href="#" >Comment By Member</a><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum,...e</p><hr>
                    <a href="#" >Comment By Member</a><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum,...e</p><hr>
                    <a href="#" >Comment By Member</a><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum,...e</p><hr>
                    <a href="#" >Comment By Member</a><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum,...e</p><hr>
                    <a href="#" >Comment By Member</a><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum,...e</p>'
                   data-original-title="New Comments"

                    ><img src="images/icons/grey/speech_bubbles.png" alt="Comments" />Comments<span class="label label-warning">9</span></a>
                <a href="#" class="btn btn-shortcut"><img src="images/icons/grey/Graph.png" alt="Statistics" />Statistics<span class="label label-info">9</span></a>
            </div><!--/span-->
        </div>

        <!-- Breadcrumb -->
        <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('bootstrap.widgets.BootBreadcrumbs', array(
            'links'=>$this->breadcrumbs
        )); ?>
        <?php endif?>

        <!-- Content start -->
        <div class="row-fluid">
            <div class="span12 flat_box">
                <?= $content?>
            </div><!--/span-->
        </div><!--/row-->

        <!-- Content end -->

    </div><!--/span-->
</div><!--/row-->
<?php $this->endContent(); ?>