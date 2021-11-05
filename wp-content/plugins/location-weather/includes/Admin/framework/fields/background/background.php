<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.
/**
 *
 * Field: background
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! class_exists( 'SPLWT_Field_background' ) ) {
	class SPLWT_Field_background extends SPLWT_Fields {

		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
			parent::__construct( $field, $value, $unique, $where, $parent );
		}

		public function render() {

			$args = wp_parse_args(
				$this->field,
				array(
					'background_color'              => true,
					'background_image'              => true,
					'background_position'           => true,
					'background_repeat'             => true,
					'background_attachment'         => true,
					'background_size'               => true,
					'background_origin'             => false,
					'background_clip'               => false,
					'background_blend_mode'         => false,
					'background_gradient'           => false,
					'background_gradient_color'     => true,
					'background_gradient_direction' => true,
					'background_image_preview'      => true,
					'background_auto_attributes'    => false,
					'background_image_library'      => 'image',
					'background_image_placeholder'  => esc_html__( 'Not selected', 'location-weather' ),
				)
			);

			$default_value = array(
				'background-color'              => '',
				'background-image'              => '',
				'background-position'           => '',
				'background-repeat'             => '',
				'background-attachment'         => '',
				'background-size'               => '',
				'background-origin'             => '',
				'background-clip'               => '',
				'background-blend-mode'         => '',
				'background-gradient-color'     => '',
				'background-gradient-direction' => '',
			);

			$default_value = ( ! empty( $this->field['default'] ) ) ? wp_parse_args( $this->field['default'], $default_value ) : $default_value;

			$this->value = wp_parse_args( $this->value, $default_value );

			echo $this->field_before();

			echo '<div class="splwt-lite--background-colors">';

			//
			// Background Color
			if ( ! empty( $args['background_color'] ) ) {

				echo '<div class="splwt-lite--color">';

				echo ( ! empty( $args['background_gradient'] ) ) ? '<div class="splwt-lite--title">' . esc_html__( 'From', 'location-weather' ) . '</div>' : '';

				SPLW::field(
					array(
						'id'      => 'background-color',
						'type'    => 'color',
						'default' => $default_value['background-color'],
					),
					$this->value['background-color'],
					$this->field_name(),
					'field/background'
				);

				echo '</div>';

			}

			//
			// Background Gradient Color
			if ( ! empty( $args['background_gradient_color'] ) && ! empty( $args['background_gradient'] ) ) {

				echo '<div class="splwt-lite--color">';

				echo ( ! empty( $args['background_gradient'] ) ) ? '<div class="splwt-lite--title">' . esc_html__( 'To', 'location-weather' ) . '</div>' : '';

				SPLW::field(
					array(
						'id'      => 'background-gradient-color',
						'type'    => 'color',
						'default' => $default_value['background-gradient-color'],
					),
					$this->value['background-gradient-color'],
					$this->field_name(),
					'field/background'
				);

				echo '</div>';

			}

			//
			// Background Gradient Direction
			if ( ! empty( $args['background_gradient_direction'] ) && ! empty( $args['background_gradient'] ) ) {

				echo '<div class="splwt-lite--color">';

				echo ( ! empty( $args['background_gradient'] ) ) ? '<div class="splwt-lite---title">' . esc_html__( 'Direction', 'location-weather' ) . '</div>' : '';

				SPLW::field(
					array(
						'id'      => 'background-gradient-direction',
						'type'    => 'select',
						'options' => array(
							''          => esc_html__( 'Gradient Direction', 'location-weather' ),
							'to bottom' => esc_html__( '&#8659; top to bottom', 'location-weather' ),
							'to right'  => esc_html__( '&#8658; left to right', 'location-weather' ),
							'135deg'    => esc_html__( '&#8664; corner top to right', 'location-weather' ),
							'-135deg'   => esc_html__( '&#8665; corner top to left', 'location-weather' ),
						),
					),
					$this->value['background-gradient-direction'],
					$this->field_name(),
					'field/background'
				);

				echo '</div>';

			}

			echo '</div>';

			//
			// Background Image
			if ( ! empty( $args['background_image'] ) ) {

				echo '<div class="splwt-lite--background-image">';

				SPLW::field(
					array(
						'id'          => 'background-image',
						'type'        => 'media',
						'class'       => 'splwt-lite-assign-field-background',
						'library'     => $args['background_image_library'],
						'preview'     => $args['background_image_preview'],
						'placeholder' => $args['background_image_placeholder'],
						'attributes'  => array( 'data-depend-id' => $this->field['id'] ),
					),
					$this->value['background-image'],
					$this->field_name(),
					'field/background'
				);

				echo '</div>';

			}

			$auto_class   = ( ! empty( $args['background_auto_attributes'] ) ) ? ' splwt-lite--auto-attributes' : '';
			$hidden_class = ( ! empty( $args['background_auto_attributes'] ) && empty( $this->value['background-image']['url'] ) ) ? ' splwt-lite--attributes-hidden' : '';

			echo '<div class="splwt-lite--background-attributes' . esc_attr( $auto_class . $hidden_class ) . '">';

			//
			// Background Position
			if ( ! empty( $args['background_position'] ) ) {

				SPLW::field(
					array(
						'id'      => 'background-position',
						'type'    => 'select',
						'options' => array(
							''              => esc_html__( 'Background Position', 'location-weather' ),
							'left top'      => esc_html__( 'Left Top', 'location-weather' ),
							'left center'   => esc_html__( 'Left Center', 'location-weather' ),
							'left bottom'   => esc_html__( 'Left Bottom', 'location-weather' ),
							'center top'    => esc_html__( 'Center Top', 'location-weather' ),
							'center center' => esc_html__( 'Center Center', 'location-weather' ),
							'center bottom' => esc_html__( 'Center Bottom', 'location-weather' ),
							'right top'     => esc_html__( 'Right Top', 'location-weather' ),
							'right center'  => esc_html__( 'Right Center', 'location-weather' ),
							'right bottom'  => esc_html__( 'Right Bottom', 'location-weather' ),
						),
					),
					$this->value['background-position'],
					$this->field_name(),
					'field/background'
				);

			}

			//
			// Background Repeat
			if ( ! empty( $args['background_repeat'] ) ) {

				SPLW::field(
					array(
						'id'      => 'background-repeat',
						'type'    => 'select',
						'options' => array(
							''          => esc_html__( 'Background Repeat', 'location-weather' ),
							'repeat'    => esc_html__( 'Repeat', 'location-weather' ),
							'no-repeat' => esc_html__( 'No Repeat', 'location-weather' ),
							'repeat-x'  => esc_html__( 'Repeat Horizontally', 'location-weather' ),
							'repeat-y'  => esc_html__( 'Repeat Vertically', 'location-weather' ),
						),
					),
					$this->value['background-repeat'],
					$this->field_name(),
					'field/background'
				);

			}

			//
			// Background Attachment
			if ( ! empty( $args['background_attachment'] ) ) {

				SPLW::field(
					array(
						'id'      => 'background-attachment',
						'type'    => 'select',
						'options' => array(
							''       => esc_html__( 'Background Attachment', 'location-weather' ),
							'scroll' => esc_html__( 'Scroll', 'location-weather' ),
							'fixed'  => esc_html__( 'Fixed', 'location-weather' ),
						),
					),
					$this->value['background-attachment'],
					$this->field_name(),
					'field/background'
				);

			}

			//
			// Background Size
			if ( ! empty( $args['background_size'] ) ) {

				SPLW::field(
					array(
						'id'      => 'background-size',
						'type'    => 'select',
						'options' => array(
							''        => esc_html__( 'Background Size', 'location-weather' ),
							'cover'   => esc_html__( 'Cover', 'location-weather' ),
							'contain' => esc_html__( 'Contain', 'location-weather' ),
							'auto'    => esc_html__( 'Auto', 'location-weather' ),
						),
					),
					$this->value['background-size'],
					$this->field_name(),
					'field/background'
				);

			}

			//
			// Background Origin
			if ( ! empty( $args['background_origin'] ) ) {

				SPLW::field(
					array(
						'id'      => 'background-origin',
						'type'    => 'select',
						'options' => array(
							''            => esc_html__( 'Background Origin', 'location-weather' ),
							'padding-box' => esc_html__( 'Padding Box', 'location-weather' ),
							'border-box'  => esc_html__( 'Border Box', 'location-weather' ),
							'content-box' => esc_html__( 'Content Box', 'location-weather' ),
						),
					),
					$this->value['background-origin'],
					$this->field_name(),
					'field/background'
				);

			}

			//
			// Background Clip
			if ( ! empty( $args['background_clip'] ) ) {

				SPLW::field(
					array(
						'id'      => 'background-clip',
						'type'    => 'select',
						'options' => array(
							''            => esc_html__( 'Background Clip', 'location-weather' ),
							'border-box'  => esc_html__( 'Border Box', 'location-weather' ),
							'padding-box' => esc_html__( 'Padding Box', 'location-weather' ),
							'content-box' => esc_html__( 'Content Box', 'location-weather' ),
						),
					),
					$this->value['background-clip'],
					$this->field_name(),
					'field/background'
				);

			}

			//
			// Background Blend Mode
			if ( ! empty( $args['background_blend_mode'] ) ) {

				SPLW::field(
					array(
						'id'      => 'background-blend-mode',
						'type'    => 'select',
						'options' => array(
							''            => esc_html__( 'Background Blend Mode', 'location-weather' ),
							'normal'      => esc_html__( 'Normal', 'location-weather' ),
							'multiply'    => esc_html__( 'Multiply', 'location-weather' ),
							'screen'      => esc_html__( 'Screen', 'location-weather' ),
							'overlay'     => esc_html__( 'Overlay', 'location-weather' ),
							'darken'      => esc_html__( 'Darken', 'location-weather' ),
							'lighten'     => esc_html__( 'Lighten', 'location-weather' ),
							'color-dodge' => esc_html__( 'Color Dodge', 'location-weather' ),
							'saturation'  => esc_html__( 'Saturation', 'location-weather' ),
							'color'       => esc_html__( 'Color', 'location-weather' ),
							'luminosity'  => esc_html__( 'Luminosity', 'location-weather' ),
						),
					),
					$this->value['background-blend-mode'],
					$this->field_name(),
					'field/background'
				);

			}

			echo '</div>';

			echo $this->field_after();

		}

		public function output() {

			$output    = '';
			$bg_image  = array();
			$important = ( ! empty( $this->field['output_important'] ) ) ? '!important' : '';
			$element   = ( is_array( $this->field['output'] ) ) ? join( ',', $this->field['output'] ) : $this->field['output'];

			// Background image and gradient
			$background_color        = ( ! empty( $this->value['background-color'] ) ) ? $this->value['background-color'] : '';
			$background_gd_color     = ( ! empty( $this->value['background-gradient-color'] ) ) ? $this->value['background-gradient-color'] : '';
			$background_gd_direction = ( ! empty( $this->value['background-gradient-direction'] ) ) ? $this->value['background-gradient-direction'] : '';
			$background_image        = ( ! empty( $this->value['background-image']['url'] ) ) ? $this->value['background-image']['url'] : '';

			if ( $background_color && $background_gd_color ) {
				$gd_direction = ( $background_gd_direction ) ? $background_gd_direction . ',' : '';
				$bg_image[]   = 'linear-gradient(' . $gd_direction . $background_color . ',' . $background_gd_color . ')';
				unset( $this->value['background-color'] );
			}

			if ( $background_image ) {
				$bg_image[] = 'url(' . $background_image . ')';
			}

			if ( ! empty( $bg_image ) ) {
				$output .= 'background-image:' . implode( ',', $bg_image ) . $important . ';';
			}

			// Common background properties
			$properties = array( 'color', 'position', 'repeat', 'attachment', 'size', 'origin', 'clip', 'blend-mode' );

			foreach ( $properties as $property ) {
				$property = 'background-' . $property;
				if ( ! empty( $this->value[ $property ] ) ) {
					$output .= $property . ':' . $this->value[ $property ] . $important . ';';
				}
			}

			if ( $output ) {
				$output = $element . '{' . $output . '}';
			}

			$this->parent->output_css .= $output;

			return $output;

		}

	}
}
