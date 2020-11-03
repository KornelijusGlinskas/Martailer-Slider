<?php
namespace ElementorHelloWorld\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Hello_World extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'martailer-slider';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Martailer Slider', 'martailer-slider' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image-rollover';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'basic' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'slick-js', 'martailer-slider' ];
	}

    public function get_style_depends() {
        return [ 'slick-js', 'martailer-slider' ];
    }

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Images', 'martailer-slider' ),
			]
		);

        $this->add_control(
            'mt_slider_content',
            [
                'type'        => Controls_Manager::REPEATER,
                'seperator'   => 'before',
                'default'     => [
                    ['mt_slider_image' => null],
                    ['mt_slider_image' => null],
                ],
                'fields'      => [
                    [
                        'name'        => 'mt_slider_image',
                        'label'       => esc_html__( 'Image', 'martailer-slider-widget' ),
                        'type'        => Controls_Manager::MEDIA,
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'mt_slider_title',
                        'label'       => esc_html__( 'Title', 'martailer-slider-widget' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'Image title', 'martailer-slider-widget' ),
                        'dynamic'     => ['active' => true],
                    ],
                ],
            ]
        );


        $this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render()
    {
        $settings = $this->get_settings_for_display();


            echo '<div class="js-martailer-slider martailer-slider">';

            if (!empty($settings['mt_slider_content'])) {
                foreach ( $settings['mt_slider_content'] as $img ) {
                    echo '<img src="' . esc_url( $img['mt_slider_image']['url'] ) .  '" alt="' . $img['mt_slider_title'] . '" />';
                }
            }
            echo '</div>';

            echo '<div class="js-martailer-slider-actions martailer-slider__actions"></div>';

    }

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		?>
        <div class="js-martailer-slider martailer-slider"></div>
        <div class="js-martailer-slider-actions martailer-slider__actions"></div>
		<?php
	}
}
