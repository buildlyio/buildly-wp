<?php
/**
 * uncoverpro Theme Customizer
 *
 * @package uncoverpro
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function uncoverpro_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$uncoverpro_categories = get_categories(array('hide_empty' => 0));
	foreach ($uncoverpro_categories as $uncoverpro_category) {
		$uncoverpro_cat[$uncoverpro_category->term_id] = $uncoverpro_category->cat_name;
	}
    
	$uncoverpro_pages = get_pages(array('hide_empty' => 0));
	foreach ($uncoverpro_pages as $uncoverpro_pages_single) {
		$uncoverpro_page_choice[$uncoverpro_pages_single->ID] = $uncoverpro_pages_single->post_title; 
	}

	/*============GENERAL SETTINGS PANEL============*/
	$wp_customize->add_panel(
		'uncoverpro_general_settings_panel',
		array(
			'title' => esc_html__( 'General Settings', 'uncoverpro' ),
			'priority' => 10
		)
	);

	//STATIC FRONT PAGE
	$wp_customize->add_section( 'static_front_page', array(
	    'title' => esc_html__( 'Static Front Page', 'uncoverpro' ),
	    'panel' => 'uncoverpro_general_settings_panel',
	    'description' => esc_html__( 'Your theme supports a static front page.', 'uncoverpro'),
	) );

	//TITLE AND TAGLINE SETTINGS
	$wp_customize->add_section( 'title_tagline', array(
	     'title' => esc_html__( 'Site Logo/Title/Tagline', 'uncoverpro' ),
	     'panel' => 'uncoverpro_general_settings_panel',
	) );

	//BACKGROUND IMAGE
	$wp_customize->add_section( 'background_image', array(
	     'title' => esc_html__( 'Background Image', 'uncoverpro' ),
	     'panel' => 'uncoverpro_general_settings_panel',
	) );

	//COLOR SETTINGS
	$wp_customize->add_section( 'colors', array(
	     'title' => esc_html__( 'Colors' , 'uncoverpro'),
	     'panel' => 'uncoverpro_general_settings_panel',
	) );

	//Footer SETTINGS
	$wp_customize->add_section( 'footer', array(
	     'title' => esc_html__( 'Footer Settings' , 'uncoverpro'),
	     'panel' => 'uncoverpro_general_settings_panel',
	) );
	
		$wp_customize->add_setting(
		'uncoverpro_footer_title',
		array(
			'sanitize_callback' => 'uncoverpro_sanitize_text',
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'uncoverpro_footer_title',
		array(
			'settings'		=> 'uncoverpro_footer_title',
			'section'		=> 'footer',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Footer copyright text', 'uncoverpro' )
		)
	);

	//Blog SETTINGS
	$wp_customize->add_section( 'blog', array(
	     'title' => esc_html__( 'Blog Settings' , 'uncoverpro'),
	     'panel' => 'uncoverpro_general_settings_panel',
	) );
	
		$wp_customize->add_setting(
		'uncoverpro_blog_title',
		array(
			'sanitize_callback' => 'uncoverpro_sanitize_text',
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'uncoverpro_blog_title',
		array(
			'settings'		=> 'uncoverpro_blog_title',
			'section'		=> 'blog',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Blog title', 'uncoverpro' )
		)
	);

}
add_action( 'customize_register', 'uncoverpro_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function uncoverpro_customize_preview_js() {
	wp_enqueue_script( 'uncoverpro-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'uncoverpro_customize_preview_js' );

function uncoverpro_customizer_script() {
	wp_enqueue_script( 'uncoverpro-customizer-script', get_template_directory_uri() .'/admin/js/customizer-scripts.js', array("jquery"),'', true  );
	wp_enqueue_style( 'uncoverpro-customizer-style', get_template_directory_uri() .'/inc/css/customizer-style.css');	
}
add_action( 'customize_controls_enqueue_scripts', 'uncoverpro_customizer_script' );

if( class_exists( 'WP_Customize_Control' ) ):	

class uncoverpro_Dropdown_Chooser extends WP_Customize_Control{
	public $type = 'dropdown_chooser';

	public function render_content(){
		if ( empty( $this->choices ) )
                return;
		?>
            <label>
                <span class="customize-control-title">
                	<?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
	            <span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	            </span>
	            <?php } ?>

                <select class="hs-chosen-select" <?php $this->link(); ?>>
                    <?php
                    foreach ( $this->choices as $value => $label )
                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
                    ?>
                </select>
            </label>
		<?php
	}
}

class uncoverpro_Customize_Checkbox_Multiple extends WP_Customize_Control {
    public $type = 'checkbox-multiple';

    public function render_content() {

        if ( empty( $this->choices ) )
            return; ?>

        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

        <?php if ( !empty( $this->description ) ) : ?>
            <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
        <?php endif; ?>

        <?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>

        <ul>
            <?php foreach ( $this->choices as $value => $label ) : ?>

                <li>
                    <label>
                        <input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> /> 
                        <?php echo esc_html( $label ); ?>
                    </label>
                </li>

            <?php endforeach; ?>
        </ul>

        <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
    <?php }
}

class uncoverpro_Customize_Heading extends WP_Customize_Control {
	public $type = 'heading';

    public function render_content() {
    	if ( !empty( $this->label ) ) : ?>
            <h3 class="uncoverpro-accordion-section-title"><?php echo esc_html( $this->label ); ?></h3>
        <?php endif;

        if($this->description){ ?>
			<span class="description customize-control-description">
			<?php echo wp_kses_post($this->description); ?>
			</span>
		<?php }
    }
}

class uncoverpro_Dropdown_Multiple_Chooser extends WP_Customize_Control{
	public $type = 'dropdown_multiple_chooser';
	public $placeholder = '';

	public function __construct($manager, $id, $args = array()){
        $this->placeholder = $args['placeholder'];

        parent::__construct( $manager, $id, $args );
    }

	public function render_content(){
		if ( empty( $this->choices ) )
                return;

            $saved_value = $this->value();
            if(!is_array($saved_value)){
            	$saved_value = array();
            }
		?>
            <label>
                <span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>

				<?php if($this->description){ ?>
					<span class="description customize-control-description">
					<?php echo wp_kses_post($this->description); ?>
					</span>
				<?php } ?>

                <select data-placeholder="<?php echo esc_html( $this->placeholder ); ?>" multiple="multiple" class="hs-chosen-select" <?php $this->link(); ?>>
                    <?php
                    foreach ( $this->choices as $value => $label ){
                    	$selected = '';
                    	if(in_array($value, $saved_value)){
                    		$selected = 'selected="selected"';
                    	}
                        echo '<option value="' . esc_attr( $value ) . '"' . esc_attr($selected) . '>' . esc_html($label) . '</option>';
                    }
                    ?>
                </select>
            </label>
		<?php
	}
}

class uncoverpro_Category_Dropdown extends WP_Customize_Control{
    private $cats = false;

    public function __construct($manager, $id, $args = array(), $options = array()){
        $this->cats = get_categories($options);

        parent::__construct( $manager, $id, $args );
    }

    public function render_content(){
        if(!empty($this->cats)){
            ?>
            <label>
                <span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>

				<?php if($this->description){ ?>
					<span class="description customize-control-description">
					<?php echo wp_kses_post($this->description); ?>
					</span>
				<?php } ?>

                <select <?php $this->link(); ?>>
                   <?php
                    foreach ( $this->cats as $cat )
                    {
                        printf('<option value="%s" %s>%s</option>', esc_attr($cat->term_id), selected($this->value(), $cat->term_id, false), esc_html($cat->name));
                    }
                   ?>
                </select>
            </label>
        <?php
        }
    }
}

class uncoverpro_Fontawesome_Icon_Chooser extends WP_Customize_Control{
	public $type = 'icon';

	public function render_content(){
		?>
            <label>
                <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
	            <span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	            </span>
	            <?php } ?>

                <div class="uncoverpro-selected-icon">
                	<i class="fa <?php echo esc_attr($this->value()); ?>"></i>
                	<span><i class="fa fa-angle-down"></i></span>
                </div>

                <ul class="uncoverpro-icon-list clearfix">
                	<?php
                	$uncoverpro_font_awesome_icon_array = uncoverpro_font_awesome_icon_array();
                	foreach ($uncoverpro_font_awesome_icon_array as $uncoverpro_font_awesome_icon) {
							$icon_class = $this->value() == $uncoverpro_font_awesome_icon ? 'icon-active' : '';
							echo '<li class='.esc_attr($icon_class).'><i class="'.esc_attr($uncoverpro_font_awesome_icon).'"></i></li>';
						}
                	?>
                </ul>
                <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
            </label>
		<?php
	}
}

class uncoverpro_Switch_Control extends WP_Customize_Control{
	public $type = 'switch';
	public $on_off_label = array();

	public function __construct($manager, $id, $args = array() ){
        $this->on_off_label = $args['on_off_label'];
        parent::__construct( $manager, $id, $args );
    }

	public function render_content(){
    ?>
	    <span class="customize-control-title">
			<?php echo esc_html( $this->label ); ?>
		</span>

		<?php if($this->description){ ?>
			<span class="description customize-control-description">
			<?php echo wp_kses_post($this->description); ?>
			</span>
		<?php } ?>

		<?php
			$switch_class = ($this->value() == 'on') ? 'switch-on' : '';
			$on_off_label = $this->on_off_label;
		?>
		<div class="onoffswitch <?php echo esc_attr($switch_class); ?>">
			<div class="onoffswitch-inner">
				<div class="onoffswitch-active">
					<div class="onoffswitch-switch"><?php echo esc_html($on_off_label['on']) ?></div>
				</div>

				<div class="onoffswitch-inactive">
					<div class="onoffswitch-switch"><?php echo esc_html($on_off_label['off']) ?></div>
				</div>
			</div>	
		</div>
		<input <?php $this->link(); ?> type="hidden" value="<?php echo esc_attr($this->value()); ?>"/>
		<?php
    }
}

class uncoverpro_Info_Text extends WP_Customize_Control{

    public function render_content(){
    ?>
	    <span class="customize-control-title">
			<?php echo esc_html( $this->label ); ?>
		</span>

		<?php if($this->description){ ?>
			<span class="description customize-control-description">
			<?php echo wp_kses_post($this->description); ?>
			</span>
		<?php }
    }
}
endif;

//SANITIZATION FUNCTIONS
function uncoverpro_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function uncoverpro_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function uncoverpro_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function uncoverpro_sanitize_choices( $input, $setting ) {
    global $wp_customize;
 
    $control = $wp_customize->get_control( $setting->id );
 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function uncoverpro_sanitize_choices_array( $input, $setting ) {
    global $wp_customize;
 	
 	if(!empty($input)){
    	$input = array_map('absint', $input);
    }

    return $input;
} 