<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Ipv6\Module;
use Vexura\Whmcs\Ipv6\Registrar;
use Vexura\Whmcs\Ipv6\Automation;

add_hook('InvoiceCreated', 1, static function (array $vars): void { Automation::snapshot('ipv6', (int) $vars['invoiceid']); });
add_hook('InvoicePaid', 1, static function (array $vars): void { Automation::paid('ipv6', (int) $vars['invoiceid']); });
add_hook('AfterCronJob', 1, static function (array $vars): void { Automation::cron('ipv6'); });
