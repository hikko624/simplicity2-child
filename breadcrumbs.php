<?php //カテゴリ用のパンくずリスト
$cat = is_single() ? get_the_category() : array(get_category($cat));
if($cat && !is_wp_error($cat)){
	$echo = null;
	$par = get_category($cat[0]->parent);
	echo '<div id="breadcrumb" class="breadcrumb-category">';
	echo '<div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="breadcrumb-home"><span class="fa fa-home fa-fw"></span><a href="'.home_url().'" itemprop="url"><span itemprop="title">'.get_theme_text_breadcrumbs_home().'</span></a><span class="sp"><span class="fa fa-angle-right"></span></span></div>';
	while($par && !is_wp_error($par) && $par->term_id != 0){
		$echo = '<div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><span class="fa fa-folder fa-fw"></span><a href="'.get_category_link($par->term_id).'" itemprop="url"><span itemprop="title">'.$par->name.'</span></a><span class="sp"><span class="fa fa-angle-right"></span></span></div>'.$echo;
		$par = get_category($par->parent);
	}
	echo $echo.'<div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><span class="fa fa-folder fa-fw"></span><a href="'.get_category_link($cat[0]->term_id).'" itemprop="url"><span itemprop="title">'.$cat[0]->name.'</span></a></div>';
	if ( is_single() ) {
		echo '<span class="sp"><span class="fa fa-angle-right"></span></span><div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><span class="fa fa-file-o fa-fw"></span><a href="'.get_the_permalink().'" itemprop="url">'.get_the_title().'</a></span></div>';
	}
	echo '</div><!-- /#breadcrumb -->';
}
?>

