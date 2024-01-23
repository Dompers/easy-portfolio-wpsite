<?php
    class understrap_auth_Widget extends WP_Widget {
        /**
         * To create the example widget all four methods will be
         * nested inside this single instance of the WP_Widget class.
         **/

        public function __construct() {
            $widget_options = array(
                'classname' => 'auth_widget',
                'description' => 'This is an Author Widget',
            );
            parent::__construct( 'auth_widget', 'Author Widget', $widget_options );
        }

        public function widget( $args, $instance ) {
            global $post;

            $title = apply_filters( 'widget_title', $instance[ 'title' ] );
            $description = apply_filters( 'widget_description', $instance[ 'description' ] );

            $auth_id = $post->post_author;


            echo $args['before_widget'] . $args['before_title'] . $title. $args['after_title'];
            echo $description;

            if ( $auth_id && $auth_id !== '') :

                $auth_id_acf = "user_" . $auth_id;
                $auth_nickname = get_the_author_meta( 'display_name', $auth_id );
                $auth_photo = get_field("acf_auth_photo", $auth_id_acf);
                $auth_range = get_field("acf_auth_range", $auth_id_acf);
                $auth_description = get_field("acf_auth_desc", $auth_id_acf);
                $auth_link = get_author_posts_url($auth_id); ?>

                <div class="widget-content">
                    <div class="auth-photo">
                        <?php if ( $auth_photo ) ?>
                            <img src="<?= $auth_photo; ?>" class="auth-photo" >
                    </div>
                    <div class="auth_info">
                        <?php echo "<div class='auth_nickname'>" . $auth_nickname . "</div>"; ?>

                        <?php if ( $auth_description ) ?>
                            <div class="auth_range"><?= $auth_range ?></div>

                        <?php if ( $auth_description ) ?>
                            <div class="auth_description"><?= $auth_description; ?></div>
                    </div>
                    <div class="auth-link">
                    <a href="<?= $auth_link; ?>">Continue Reading</a>
                </div>
                </div>
            <?php else:
                echo 'This widget show author if post';
            endif; ?>
            <?php echo $args['after_widget'];
        }

        public function form( $instance ) {

            $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
            $description = ! empty( $instance['description'] ) ? $instance['description'] : ''; ?>
            <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
            <label for="<?php echo $this->get_field_name( 'description' ); ?>">Description:</label>
            <textarea name="<?php echo $this->get_field_name( 'description' ); ?>" id="" cols="30" rows="3" style="width: 100%;"><?php echo esc_attr( $description ); ?></textarea>
            </p><?php

        }

        public function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
            $instance[ 'description' ] = strip_tags( $new_instance[ 'description' ] );
            return $instance;
        }
    }

    function understrap_register_auth_widget() {
        register_widget( 'understrap_auth_Widget' );
    }
    add_action( 'widgets_init', 'understrap_register_auth_widget' );
?>
