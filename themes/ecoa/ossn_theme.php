<?php
/**
 * Open Source Social Network
 *
 * @package   (openteknik.com).ossn
 * @author    OSSN Core Team <info@openteknik.com>
 * @copyright (C) OpenTeknik LLC
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */
define('__THEMEDIR__', ossn_route()->themes . 'ecoa/');

ossn_register_callback('ossn', 'init', 'ossn_ecoa_theme_init');

function ossn_ecoa_theme_init() {
		//add bootstrap
		ossn_new_css('bootstrap.min', 'css/bootstrap/bootstrap.min.css');

		ossn_new_css('ossn.default', 'css/core/default');
		ossn_new_css('ossn.admin.default', 'css/core/administrator');

		//load bootstrap
		ossn_load_css('bootstrap.min', 'admin');
		ossn_load_css('bootstrap.min');

		ossn_load_css('ossn.default');
		ossn_load_css('ossn.admin.default', 'admin');

		ossn_extend_view('ossn/admin/head', 'ossn_ecoa_admin_head');
		ossn_extend_view('ossn/site/head', 'ossn_ecoa_head');
		ossn_extend_view('js/opensource.socialnetwork', 'js/goblue');

		if(ossn_isAdminLoggedin()) {
				ossn_register_menu_item('admin/sidemenu', array(
						'name'   => 'admin:theme:ecoa',
						'text'   => ossn_print('Eco@'),
						'href'   => ossn_site_url('administrator/settings/ecoa'),
						'parent' => 'admin:sidemenu:themes',
				));
				ossn_register_site_settings_page('ecoa', 'settings/admin/goblue');
				ossn_register_action('goblue/settings', __THEMEDIR__ . 'actions/settings.php');
		}
}
function ossn_ecoa_head() {
		$head = array();

		$head[] = ossn_html_css(array(
				'href' => '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css',
		));
		$head[] = ossn_html_css(array(
				'href' => 'https://fonts.googleapis.com/css?family=PT+Sans:400italic,700,400',
		));
		$head[] = ossn_html_js(array(
				'src' => ossn_theme_url() . 'vendors/bootstrap/js/bootstrap.min.js?v5.2',
		));
		$head[] = ossn_html_css(array(
				'href' => '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/css/jquery-ui.css',
		));
		return implode('', $head);
}
function ossn_ecoa_admin_head() {
		$head   = array();
		$head[] = ossn_html_css(array(
				'href' => '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css',
		));
		$head[] = ossn_html_css(array(
				'href' => '//fonts.googleapis.com/css?family=Roboto+Slab:300,700,400',
		));
		$head[] = ossn_html_js(array(
				'src' => ossn_theme_url() . 'vendors/bootstrap/js/bootstrap.min.js?v5.2',
		));
		$head[] = ossn_html_css(array(
				'href' => '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/css/jquery-ui.css',
		));
		return implode('', $head);
}
