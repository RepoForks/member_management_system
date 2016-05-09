<?php 

//デバッグの表示オフ（false）
define ("_DEBUG_MODE", true);

//HTML_QuickFormでStricエラーがでるため以下の設定をしよう
ini_set("error_reporting", E_ALL & ~E_STRICT & ~E_DEPRECATED);

/*
 * データベース関連
 */

define("_DB_USER", "sample");

define("_DB_PASS", "password");

define("_DB_HOST", "localhost");

define("_DB_NAME", "sampledb");

define("_DB_TYPE", "mysql");

define("_DSN", _DB_TYPE . ":host=" . _DB_HOST . ";dbname=" . _DB_NAME . ";charset=utf8");

/*
 * セッション名
 */

//会員用セッション名
define("_MEMBER_SESSNAME", "PHPSESSION_MEMBER");

//管理者用センション名
define("_SYSTEM_SESSNAME", "PHPSESSION_SYSTEM");

//会員認証情報　保管変数名
define("_MEMBER_AUTHINFO", "serinfo");

//管理用認証情報　保管変数名
define("_SYSTEM_AUTHINFO", "systeminfo");

/*
 * 会員・管理者　処理分岐用
 */

//会員用フラグ
define("_MEMBER_FLG", false);
//管理者用フラグ
define("_SYSTEM_FLG", true);

/*
 * ファイル・ディレクトリ関連
 */

//関連ファイルを設置するディレクトリ
define("_PHP_LIBS_DIR", _ROOT_DIR . "../php_libs/");

//クラスファイル
define("_CLASS_DIR", _PHP_LIBS_DIR . "class/");

//環境変数
define("_SCRIPT_NAME", $_SERVER['SCRIPT_NAME']);

/*
 * Smarty関連設定
 */

// Smartyのlibsディレクトリ
define("_SMARTY_LIBS_DIR", _PHP_LIBS_DIR . "smarty/libs/");

// Smartynoテンプレートファイルを保存したディレクトリ
define("_SMARTY_TEMPLATES_DIR", _PHP_LIBS_DIR . "smarty/templates/");

// Smartyのlibsディレクトリ　Webサーバから書き込めるようにする
define("_SMARTY_TEMPLATES_C_DIR", _PHP_LIBS_DIR . "smarty/templates_c/");

//Smarty のlibsディレクトリ
define("_SMARTY_CONFIG_DIR", _PHP_LIBS_DIR . "smarty/configs/");

//Smarty のlibsディレクトリ Webサーバから書き込めるようにする
define("_SMARTY_CACHE_DIR", _PHP_LIBS_DIR . "smarty/cache/");

/*
 * ファイル読み込み
 */

require_once("HTML/QuickForm.php");
require_once("HTML/QuickForm/Renderer/ArraySmarty.php");
require_once(_SMARTY_LIBS_DIR . "Smarty.class.php");

/*
 * クラスファイル読み込み
 */

require_once(_CLASS_DIR . "BaseController.php");
require_once(_CLASS_DIR . "BaseModel.php");
require_once(_CLASS_DIR . "Auth.php");
require_once(_CLASS_DIR . "PrefectureController.php");
require_once(_CLASS_DIR . "PrefectureModel.php");
require_once(_CLASS_DIR . "MemberController.php");
require_once(_CLASS_DIR . "MemberModel.php");
require_once(_CLASS_DIR . "PrememberController.php");
require_once(_CLASS_DIR . "PrememberModel.php");
require_once(_CLASS_DIR . "SystemController.php");
require_once(_CLASS_DIR . "SystemModel.php");

?>