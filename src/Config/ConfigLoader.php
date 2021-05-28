<?php

declare(strict_types=1);

/**
 * PHP Typo Config Loader
 *
 * Created a config object from either/or passed command
 * line options or from the defined config file in project
 * route.
 */

namespace Gin0115\PHPTypo\Config;

class ConfigLoader {


	/**
	 * All the potential config filenames.
	 */
	protected const CONFIG_FILE_NAMES = array(
		'phptypo.config.php',
		'phptypo.php',
		'phptypo.config',
		'phptypo',
	);

	/**
	 * The populated config
	 *
	 * @var Config
	 */
	protected $config;

	public function __construct(
		string $basePath,
		string $src,
		string $dict,
		int $minWord
	) {
		$this->config = $this->loadConfig( $basePath );
		$this->config->setDictionary( $dict );
		$this->config->setMinWord( $minWord );
		$this->config->setSource( $src );
	}

	/**
	 * Attempts to load a config file.
	 *
	 * @param string $basePath
	 * @return Config
	 */
	public function loadConfig( string $basePath ): Config {
		foreach ( self::CONFIG_FILE_NAMES as $filename ) {
			if ( file_exists( $basePath . DIRECTORY_SEPARATOR . $filename ) ) {
				return include $basePath . DIRECTORY_SEPARATOR . $filename;
			}
		}
		return Config::create( 'fromCLI' );
	}

	/**
	 * Get the populated config
	 *
	 * @return  Config
	 */
	public function getConfig() {
		return $this->config;
	}
}
