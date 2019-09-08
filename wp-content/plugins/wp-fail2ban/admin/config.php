<?php

/**
 * Config
 *
 * @package wp-fail2ban
 * @since 4.0.0
 */
namespace org\lecklider\charles\wordpress\wp_fail2ban;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
require_once 'lib/tab.php';
foreach ( glob( __DIR__ . '/config/*.php' ) as $filename ) {
    require_once $filename;
}
/**
 * Render Settings
 *
 * @since 4.0.0
 */
function settings()
{
    $tabs = [
        'logging',
        'syslog',
        'block',
        'remote-ips',
        'plugins'
    ];
    $title = 'WP fail2ban';
    ?>
<div class="wrap">
  <h1><?php 
    echo  $title ;
    ?></h1>
  <hr class="wp-header-end">

  <h2 class="nav-tab-wrapper wp-clearfix">
<?php 
    $active_tab = Tab::getActiveTab( 'logging' );
    foreach ( $tabs as $slug ) {
        $class = 'nav-tab';
        if ( $active_tab->getSlug() == $slug ) {
            $class .= ' nav-tab-active';
        }
        printf(
            '<a class="%s" href="?page=wp-fail2ban-settings&tab=%s">%s</a>',
            $class,
            $slug,
            Tab::getTabName( $slug )
        );
    }
    ?>
  </h2>

  <form action="options.php?tab=<?php 
    echo  $active_tab->getSlug() ;
    ?>" method="post">
<?php 
    settings_fields( 'wp-fail2ban' );
    $active_tab->render();
    echo  '<hr><p>' . __( '<strong>Note:</strong> The Free version of <em>WP fail2ban</em> is configured by defining constants in <tt>wp-config.php</tt>; these tabs display those values.<br>Upgrade to the Premium version to enable this interface.' ) . '</p>' ;
    ?>
  </form>
</div>
    <?php 
}
