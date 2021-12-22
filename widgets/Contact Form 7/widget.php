<?php
namespace Finest_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Css_Filter;
use \Elementor\Icons_Manager;
use \Elementor\Utils;
use \Elementor\Widget_Base;

class Finest_Contact_Form extends Widget_Base {

	public function get_name() {
		return 'finest-contact-form';
	}

	public function get_title() {
		return esc_html__( 'Contact Form 7', 'finest-addons' );
	}

	public function get_icon() {
		return 'eicon-mail';
	}

	public function get_categories() {
		return [ 'finest-addons' ];
	}

	public function get_keywords() {
		return [ 'Contact_Form_7', 'Form', 'Contact'];
	}

	protected function register_controls() {
	}
	protected function render() { 
		echo "Jasim";
	} 

}
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Finest_Contact_Form() );