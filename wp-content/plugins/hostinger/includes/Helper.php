<?php

namespace Hostinger;

defined( 'ABSPATH' ) || exit;

class Helper {
    const HOSTINGER_LOCALES = [
        'lt_LT' => 'hostinger.lt',
        'uk_UA' => 'hostinger.com.ua',
        'id_ID' => 'hostinger.co.id',
        'en_US' => 'hostinger.com',
        'es_ES' => 'hostinger.es',
        'es_AR' => 'hostinger.com.ar',
        'es_MX' => 'hostinger.mx',
        'es_CO' => 'hostinger.co',
        'pt_BR' => 'hostinger.com.br',
        'ro_RO' => 'hostinger.ro',
        'fr_FR' => 'hostinger.fr',
        'it_IT' => 'hostinger.it',
        'pl_PL' => 'hostinger.pl',
        'en_PH' => 'hostinger.ph',
        'ar_AE' => 'hostinger.ae',
        'ms_MY' => 'hostinger.my',
        'ko_KR' => 'hostinger.kr',
        'vi_VN' => 'hostinger.vn',
        'th_TH' => 'hostinger.in.th',
        'tr_TR' => 'hostinger.web.tr',
        'pt_PT' => 'hostinger.pt',
        'de_DE' => 'hostinger.de',
        'en_IN' => 'hostinger.in',
        'ja_JP' => 'hostinger.jp',
        'nl_NL' => 'hostinger.nl',
        'en_GB' => 'hostinger.co.uk',
        'el_GR' => 'hostinger.gr',
        'cs_CZ' => 'hostinger.cz',
        'hu_HU' => 'hostinger.hu',
        'sv_SE' => 'hostinger.se',
        'da_DK' => 'hostinger.dk',
        'fi_FI' => 'hostinger.fi',
        'sk_SK' => 'hostinger.sk',
        'no_NO' => 'hostinger.no',
        'hr_HR' => 'hostinger.hr',
        'zh_HK' => 'hostinger.com.hk',
        'he_IL' => 'hostinger.co.il',
        'lv_LV' => 'hostinger.lv',
        'et_EE' => 'hostinger.ee',
        'ur_PK' => 'hostinger.pk',
    ];

	/**
	 *
	 * Check if plugin is active
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public static function is_plugin_active( $plugin_slug ): bool {
		$active_plugins = (array) get_option( 'active_plugins', array() );
		foreach ( $active_plugins as $active_plugin ) {
			if ( strpos( $active_plugin, $plugin_slug . '.php' ) !== false ) {
				return true;
			}
		}

		return false;
	}

	public function is_preview_domain( $headers = null ): bool {
		// @codeCoverageIgnoreStart
		if ( $headers === null && function_exists( 'getallheaders' ) ) {
			$headers = getallheaders();
		}
		// @codeCoverageIgnoreEnd
		if ( isset( $headers['X-Preview-Indicator'] ) && $headers['X-Preview-Indicator'] ) {
			return true;
		}

		return false;
	}

	public static function woocommerce_onboarding_choice(): bool {
		return (bool) get_option( 'hostinger_woo_onboarding_choice', false );
	}

	public static function generate_bypass_code( $length ) {
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$code       = '';
		$max_index  = strlen( $characters ) - 1;

		for ( $i = 0; $i < $length; $i++ ) {
			$random_index = wp_rand( 0, $max_index );
			$code        .= $characters[ $random_index ];
		}

		return $code;
	}

    public function should_plugin_split_notice_shown() {
        $plugin_split_notice_hidden = get_option( 'hts_plugin_split_notice_hidden', false );

        if ( $plugin_split_notice_hidden !== false ) {
            return false;
        }

        if ( ! version_compare( HOSTINGER_VERSION, '3.0.0', '>=' ) ) {
            return false;
        }

        if ( is_plugin_active( 'hostinger-easy-onboarding/hostinger-easy-onboarding.php' ) ) {
            return false;
        }

        return true;
    }

    public function get_hostinger_plugin_url() : string {
        $websiteLocale  = get_locale() ?? 'en_US';
        $resellerLocale = get_option( 'hostinger_reseller', '' );
        $baseDomain     = $resellerLocale ? : ( self::HOSTINGER_LOCALES[$websiteLocale] ?? 'hostinger.com' );

        $pluginUrl = rtrim( $baseDomain, '/' ) . '/';
        $pluginUrl .= str_replace( ABSPATH, '', HOSTINGER_ABSPATH );

        return $pluginUrl;
    }

    public function get_recommended_php_version(): string {
        $wp_version = get_bloginfo('version');

        if (empty($wp_version)) {
            return '8.2';
        }

        // Remove any additional version info (like -RC1, -beta1, etc.)
        $wp_version = preg_replace('/[-+].*$/', '', $wp_version);

        // Version specific recommendations
        if (version_compare($wp_version, '6.6', '>=')) {
            return '8.2';  // Latest recommended version for WP 6.6+
        }

        if (version_compare($wp_version, '6.3', '>=')) {
            return '8.1';  // Recommended for WP 6.3-6.5
        }

        if (version_compare($wp_version, '5.3', '>=')) {
            return '7.4';  // Recommended for WP 5.3-6.2
        }

        if (version_compare($wp_version, '5.0', '>=')) {
            return '7.3';  // Recommended for WP 5.0-5.2
        }

        if (version_compare($wp_version, '4.9', '=')) {
            return '7.2';  // Recommended for WP 4.9
        }

        if (version_compare($wp_version, '4.7', '>=')) {
            return '7.1';  // Recommended for WP 4.7-4.8
        }

        if (version_compare($wp_version, '4.4', '>=')) {
            return '7.0';  // Recommended for WP 4.4-4.6
        }

        // For versions below 4.9
        return '5.6';
    }
}

$hostinger_helper = new Helper();
