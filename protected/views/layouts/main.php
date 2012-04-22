<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>


    <?php $this->widget('bootstrap.widgets.BootNavbar', array(
        'brand'=>'Adminka',
        'brandUrl'=>'#',
        'collapse'=>true, // requires bootstrap-responsive.css
        'fluid'=>true,
        'items'=>array(
            array(
                'class'=>'bootstrap.widgets.BootMenu',
                'items'=>array(
                    array('label'=>'Logs', 'url'=>array('/systemEvents/admin')),
                    array('label'=>'Zabbix', 'url'=>'http://briganti.ru/zabbix'),
                    array('label'=>'Redmine', 'url'=>'http://redmine.sudosu.ru/'),
                    array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                    array('label'=>'Dropdown', 'url'=>'#', 'items'=>array(
                        array('label'=>'Action', 'url'=>'#'),
                        array('label'=>'Another action', 'url'=>'#'),
                        array('label'=>'Something else here', 'url'=>'#'),
                        '---',
                        array('label'=>'NAV HEADER'),
                        array('label'=>'Separated link', 'url'=>'#'),
                        array('label'=>'One more separated link', 'url'=>'#'),
                    )),
                ),
            ),
            '<form class="navbar-search pull-right" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
            array(
                'class'=>'bootstrap.widgets.BootMenu',
                'htmlOptions'=>array('class'=>'pull-right'),
                'items'=>array(
                    '---',
                    array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                    array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                ),
            ),
        ),
    )); ?>


    <div class="container-fluid">

        <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('bootstrap.widgets.BootBreadcrumbs', array(
            'links'=>$this->breadcrumbs
        )); ?>
        <?php endif?>

                <?php echo $content; ?>

        <hr>

        <footer>
            <p>&copy; Company 2012</p>
        </footer>

    </div><!--/.fluid-container-->



</body>
</html>
