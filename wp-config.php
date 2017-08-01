<?php
/** 
 * As configurações básicas do WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

$__hasconfigured = false;
$__configuration_files = array(
	'localhost' => "wp-config-localhost.php",
	'qa' => "wp-config-qa.php",
	'live' => "wp-config-live.php",
);
foreach ($__configuration_files as $enviroment => $file) {
	if( file_exists( ABSPATH . $file ) && !$__hasconfigured) {
		require_once( ABSPATH . $file );

		$__hasconfigured = true;

		define('WP_ENV', $enviroment);
	}
}

if( !$__hasconfigured ) {
	/**
	 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
	 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
	 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
	 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
	 *
	 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
	 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
	 * como "wp-config.php" e preencher os valores.
	 *
	 * @package WordPress
	 */

	// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
	/** O nome do banco de dados do WordPress */
	define('DB_NAME', 'jfelicio');

	/** Usuário do banco de dados MySQL */
	define('DB_USER', 'root');

	/** Senha do banco de dados MySQL */
	define('DB_PASSWORD', '');

	/** nome do host do MySQL */
	define('DB_HOST', 'localhost');

	/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
	define('DB_CHARSET', 'utf8');

	/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
	define('DB_COLLATE', '');
}

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '=cJO76.J)/YnFlN-7+r;ATTB6-N1+vL3+^Z,%{)Lc#jJj=,C+?01[zdnIkwBUq}Y');
define('SECURE_AUTH_KEY',  'eX+PurQ_JvM+Tfn|cR_epYQ;/M}D;z=D]<t/OiWJF8I3tTRF9KVg|%/H>sle%$T.');
define('LOGGED_IN_KEY',    '0KsWa|Pa=GTJufNRyaYmB})*&jd-@RAbE~@|n+>>bOG#c-<@=aSrF4+s&~IND^gr');
define('NONCE_KEY',        '^pSxl~)c{|ad6:kY1^X,qpMlm~4{JmN3C0y.y*D<O/vK16O]67!I 78aD:^#|0$$');
define('AUTH_SALT',        '-!=3,-/x5__^q}puk~g:}H29>3R?{+~-L9$#ij`(6[sQY0 :9|d.;R4Kw7%Y5B2@');
define('SECURE_AUTH_SALT', 'LV9:rcuXkBqF<Gg-(q{y_cF?L}l/ $77k_tWP`NO])Zu^@9:$^S6XEp#+XqQNxK(');
define('LOGGED_IN_SALT',   't*}o8c0[uKFa$*WQb&n]-^G6W{|-!:w}dR0++$]h^qs-<!1/{-uj[gSfRTd4s_wP');
define('NONCE_SALT',       'eQLS{rhd<UYpQc-sl,E2-;| 3?{-NQ!f.S,a*p`:8@_~FIX+n|-g(@}v#<[-3TSv');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', true);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');

